<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Management System</title>
    <style>
        /* Global styles */
        :root {
            --primary-color: #9b59b6;
            --secondary-color: #0056b3;
            --text-color: #333;
            --bg-color: #f3f5f9;
            --accent-color: #ff7f50;
            --menu-item-font-size: 18px;
            --footer-color: #8e44ad;
            --logout-button-color: #006400;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: var(--bg-color);
        }

        .header {
            background-color: var(--primary-color);
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }

        .menu {
            display: flex;
            align-items: center;
        }

        .menu-item {
            margin-right: 20px;
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: var(--menu-item-font-size);
            transition: color 0.3s;
        }

        .menu-item:hover {
            color: var(--secondary-color);
        }

        .content-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            margin-bottom: auto;
        }

        .footer {
            background-color: var(--footer-color);
            color: white;
            padding: 20px;
            text-align: center;
        }

        /* Existing styles remain the same */
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>TEACHER LIST</h1>
        <div class="menu">
            <!-- Add menu items here if needed -->
        </div>
    </div>

    <div class="content-wrapper">
        <div class="container">
            <h2>Manage Teacher Records</h2>
            <input type="text" id="search-input" placeholder="Search by Name or ID" oninput="searchTeachers()">
            <table id="teacher-list">
                <thead>
                    <tr>
                        <th>Teacher ID</th>
                        <th>Name</th>
                        <th>Subject</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="teacher-table-body">
                    <!-- Teacher items will be dynamically added here -->
                </tbody>
            </table>
            <div>
                <input type="text" id="teacher-id" placeholder="Enter teacher ID">
                <input type="text" id="teacher-name" placeholder="Enter teacher name">
                <input type="text" id="teacher-subject" placeholder="Enter teacher subject">
                <button onclick="addOrUpdateTeacher()" id="add-update-btn" class="btn">Add Teacher</button>
                <button onclick="clearForm()" id="clear-btn" class="btn">Clear</button>
            </div>
        </div>
    </div>

    <div class="footer">
    </div>

    <script>
        // JavaScript code for managing teacher list
        // Function to render teachers
        function renderTeachers() {
            const teacherList = document.querySelector('#teacher-table-body');
            teacherList.innerHTML = '';
            let teachersData = JSON.parse(localStorage.getItem('teachersData')) || [];
            teachersData.forEach(teacher => {
                const tr = document.createElement('tr');
                tr.className = 'teacher-item';
                tr.innerHTML = `
                    <td>${teacher.id}</td>
                    <td>${teacher.name}</td>
                    <td>${teacher.subject}</td>
                    <td>
                        <button onclick="deleteTeacher(${teacher.id})" class="btn">Delete</button>
                        <button onclick="editTeacher(${teacher.id})" class="btn">Edit</button>
                    </td>
                `;
                teacherList.appendChild(tr);
            });
        }

        // Function to add or update teacher
        function addOrUpdateTeacher() {
            const teacherIdInput = document.getElementById('teacher-id');
            const teacherNameInput = document.getElementById('teacher-name');
            const teacherSubjectInput = document.getElementById('teacher-subject');
            const teacherId = teacherIdInput.value.trim();
            const teacherName = teacherNameInput.value.trim();
            const teacherSubject = teacherSubjectInput.value.trim();

            if (teacherId !== '' && teacherName !== '' && teacherSubject !== '') {
                let teachersData = JSON.parse(localStorage.getItem('teachersData')) || [];
                const existingTeacher = teachersData.find(teacher => teacher.id === teacherId);

                if (existingTeacher) {
                    // Update existing teacher
                    existingTeacher.name = teacherName;
                    existingTeacher.subject = teacherSubject;
                } else {
                    // Add new teacher
                    const newTeacher = {
                        id: teacherId,
                        name: teacherName,
                        subject: teacherSubject
                    };
                    teachersData.push(newTeacher);
                }
                localStorage.setItem('teachersData', JSON.stringify(teachersData));
                renderTeachers();
                clearForm();
            } else {
                alert('Please fill in all fields.');
            }
        }

        // Function to delete teacher
        function deleteTeacher(id) {
            let teachersData = JSON.parse(localStorage.getItem('teachersData')) || [];
            teachersData = teachersData.filter(teacher => teacher.id !== id);
            localStorage.setItem('teachersData', JSON.stringify(teachersData));
            renderTeachers();
        }

        // Function to edit teacher
        function editTeacher(id) {
            let teachersData = JSON.parse(localStorage.getItem('teachersData')) || [];
            const teacher = teachersData.find(teacher => teacher.id === id);
            if (teacher) {
                document.getElementById('teacher-id').value = teacher.id;
                document.getElementById('teacher-name').value = teacher.name;
                document.getElementById('teacher-subject').value = teacher.subject;
                document.getElementById('add-update-btn').innerText = 'Update Teacher';
                document.getElementById('add-update-btn').setAttribute('onclick', `addOrUpdateTeacher(${teacher.id})`);
            }
        }

        // Function to clear form
        function clearForm() {
            document.getElementById('teacher-id').value = '';
            document.getElementById('teacher-name').value = '';
            document.getElementById('teacher-subject').value = '';
            document.getElementById('add-update-btn').innerText = 'Add Teacher';
            document.getElementById('add-update-btn').setAttribute('onclick', 'addOrUpdateTeacher()');
        }

        // Function to search teachers
        function searchTeachers() {
            const searchText = document.getElementById('search-input').value.toLowerCase();
            const teacherList = JSON.parse(localStorage.getItem('teachersData')) || [];
            const filteredTeachers = teacherList.filter(teacher => {
                return teacher.id.toLowerCase().includes(searchText) || teacher.name.toLowerCase().includes(searchText);
            });
            renderSearchResults(filteredTeachers);
        }

        // Function to render search results
        function renderSearchResults(results) {
            const teacherList = document.querySelector('#teacher-table-body');
            teacherList.innerHTML = '';
            results.forEach(teacher => {
                const tr = document.createElement('tr');
                tr.className = 'teacher-item';
                tr.innerHTML = `
                    <td>${teacher.id}</td>
                    <td>${teacher.name}</td>
                    <td>${teacher.subject}</td>
                    <td>
                        <button onclick="deleteTeacher(${teacher.id})" class="btn">Delete</button>
                        <button onclick="editTeacher(${teacher.id})" class="btn">Edit</button>
                    </td>
                `;
                teacherList.appendChild(tr);
            });
        }

        // Initial render
        renderTeachers();
    </script>
</body>
</html>
