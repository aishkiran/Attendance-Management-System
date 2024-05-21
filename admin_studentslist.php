<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
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
        <h1>STUDENT LIST</h1>
        <div class="menu">
            <!-- Add menu items here if needed -->
        </div>
    </div>

    <div class="content-wrapper">
        <div class="container">
            <h2>Manage Student Records</h2>
            <input type="text" id="search-input" placeholder="Search by Name or Register Number" oninput="searchStudents()">
            <table id="student-list">
                <thead>
                    <tr>
                        <th>Student Reg No</th>
                        <th>Name</th>
                        <th>Class</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="student-table-body">
                    <!-- Student items will be dynamically added here -->
                </tbody>
            </table>
            <div>
                <input type="text" id="student-register" placeholder="Enter student register number">
                <input type="text" id="student-name" placeholder="Enter student name">
                <input type="text" id="student-class" placeholder="Enter student class">
                <button onclick="addOrUpdateStudent()" id="add-update-btn" class="btn">Add Student</button>
                <button onclick="clearForm()" id="clear-btn" class="btn">Clear</button>
            </div>
        </div>
    </div>

    <div class="footer">
        <p></p>
    </div>

    <script>
        // JavaScript code for managing student list
        // Function to render students
        function renderStudents() {
            const studentList = document.querySelector('#student-table-body');
            studentList.innerHTML = '';
            let studentsData = JSON.parse(localStorage.getItem('studentsData')) || [];
            studentsData.forEach(student => {
                const tr = document.createElement('tr');
                tr.className = 'student-item';
                tr.innerHTML = `
                    <td>${student.register}</td>
                    <td>${student.name}</td>
                    <td>${student.class}</td>
                    <td>
                        <button onclick="deleteStudent(${student.id})" class="btn">Delete</button>
                        <button onclick="editStudent(${student.id})" class="btn">Edit</button>
                    </td>
                `;
                studentList.appendChild(tr);
            });
        }

        // Function to add or update student
        function addOrUpdateStudent() {
            const studentRegisterInput = document.getElementById('student-register');
            const studentNameInput = document.getElementById('student-name');
            const studentClassInput = document.getElementById('student-class');
            const studentRegister = studentRegisterInput.value.trim();
            const studentName = studentNameInput.value.trim();
            const studentClass = studentClassInput.value.trim();

            if (studentRegister !== '' && studentName !== '' && studentClass !== '') {
                let studentsData = JSON.parse(localStorage.getItem('studentsData')) || [];
                const existingStudent = studentsData.find(student => student.register === studentRegister);

                if (existingStudent) {
                    // Update existing student
                    existingStudent.name = studentName;
                    existingStudent.class = studentClass;
                } else {
                    // Add new student
                    const newStudent = {
                        id: studentsData.length > 0 ? studentsData[studentsData.length - 1].id + 1 : 1,
                        register: studentRegister,
                        name: studentName,
                        class: studentClass
                    };
                    studentsData.push(newStudent);
                }
                localStorage.setItem('studentsData', JSON.stringify(studentsData));
                renderStudents();
                clearForm();
            } else {
                alert('Please fill in all fields.');
            }
        }

        // Function to delete student
        function deleteStudent(id) {
            let studentsData = JSON.parse(localStorage.getItem('studentsData')) || [];
            studentsData = studentsData.filter(student => student.id !== id);
            localStorage.setItem('studentsData', JSON.stringify(studentsData));
            renderStudents();
        }

        // Function to edit student
        function editStudent(id) {
            let studentsData = JSON.parse(localStorage.getItem('studentsData')) || [];
            const student = studentsData.find(student => student.id === id);
            if (student) {
                document.getElementById('student-register').value = student.register;
                document.getElementById('student-name').value = student.name;
                document.getElementById('student-class').value = student.class;
                document.getElementById('add-update-btn').innerText = 'Update Student';
                document.getElementById('add-update-btn').setAttribute('onclick', `addOrUpdateStudent(${student.id})`);
            }
        }

        // Function to clear form
        function clearForm() {
            document.getElementById('student-register').value = '';
            document.getElementById('student-name').value = '';
            document.getElementById('student-class').value = '';
            document.getElementById('add-update-btn').innerText = 'Add Student';
            document.getElementById('add-update-btn').setAttribute('onclick', 'addOrUpdateStudent()');
        }

        // Function to search students
        function searchStudents() {
            const searchText = document.getElementById('search-input').value.toLowerCase();
            const studentList = JSON.parse(localStorage.getItem('studentsData')) || [];
            const filteredStudents = studentList.filter(student => {
                return student.register.toLowerCase().includes(searchText) || student.name.toLowerCase().includes(searchText);
            });
            renderSearchResults(filteredStudents);
        }

        // Function to render search results
        function renderSearchResults(results) {
            const studentList = document.querySelector('#student-table-body');
            studentList.innerHTML = '';
            results.forEach(student => {
                const tr = document.createElement('tr');
                tr.className = 'student-item';
                tr.innerHTML = `
                    <td>${student.register}</td>
                    <td>${student.name}</td>
                    <td>${student.class}</td>
                    <td>
                        <button onclick="deleteStudent(${student.id})" class="btn">Delete</button>
                        <button onclick="editStudent(${student.id})" class="btn">Edit</button>
                    </td>
                `;
                studentList.appendChild(tr);
            });
        }

        // Initial render
        renderStudents();
    </script>
</body>
</html>
