<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Class Management</title>
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
            background-color: #f3f5f9;
        }

        /* Header styles */
        .header {
            background-color: var(--primary-color); /* Applied primary color */
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

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

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"] {
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        .class-item {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .class-item p {
            margin: 5px 0;
        }

        .class-item button {
            margin-left: 5px;
        }
        
        .footer {
            background-color: var(--footer-color);
            color: white;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Class Management</h1>
    </div>

    <div class="container">
        <h2>Manage Classes</h2>
        <form id="class-form">
            <label for="class-name">Class Name:</label>
            <input type="text" id="class-name" placeholder="Enter class name" required>

            <label for="class-teacher">Class Teacher:</label>
            <input type="text" id="class-teacher" placeholder="Enter class teacher" required>

            <label for="class-room">Class Room:</label>
            <input type="text" id="class-room" placeholder="Enter class room" required>

            <button type="submit" id="add-class-btn">Add Class</button>
        </form>

        <div id="class-list">
            <!-- Class items will be dynamically added here -->
        </div>
    </div>

    <div class="footer">
    </div>

    <script>
        // JavaScript code for managing classes

        // Retrieve class form and class list elements
        const classForm = document.getElementById('class-form');
        const classList = document.getElementById('class-list');

        // Event listener for form submission
        classForm.addEventListener('submit', function(event) {
            event.preventDefault();

            // Retrieve input values
            const className = document.getElementById('class-name').value.trim();
            const classTeacher = document.getElementById('class-teacher').value.trim();
            const classRoom = document.getElementById('class-room').value.trim();

            // Ensure all fields are filled
            if (className !== '' && classTeacher !== '' && classRoom !== '') {
                // Create a class object
                const newClass = {
                    name: className,
                    teacher: classTeacher,
                    room: classRoom
                };

                // Save the class to local storage
                saveClass(newClass);

                // Clear form inputs
                classForm.reset();

                // Render classes again to reflect changes
                renderClasses();
            } else {
                alert('Please fill in all fields.');
            }
        });

        // Function to save class to local storage
        function saveClass(newClass) {
            // Retrieve existing classes from local storage
            const classes = JSON.parse(localStorage.getItem('classes')) || [];

            // Add the new class to the array
            classes.push(newClass);

            // Save the updated classes array back to local storage
            localStorage.setItem('classes', JSON.stringify(classes));
        }

        // Function to render classes
        function renderClasses() {
            // Clear existing class list
            classList.innerHTML = '';

            // Retrieve classes from local storage
            const classes = JSON.parse(localStorage.getItem('classes')) || [];

            // Render each class as a list item
            classes.forEach(function(classData, index) {
                const classItem = document.createElement('div');
                classItem.classList.add('class-item');
                classItem.innerHTML = `
                    <p><strong>Class Name:</strong> ${classData.name}</p>
                    <p><strong>Class Teacher:</strong> ${classData.teacher}</p>
                    <p><strong>Class Room:</strong> ${classData.room}</p>
                    <button onclick="deleteClass(${index})" class="delete-btn">Delete</button>
                    <button onclick="editClass(${index})" class="edit-btn">Edit</button>
                `;
                classList.appendChild(classItem);
            });
        }

        // Function to delete class
        function deleteClass(index) {
            // Retrieve classes from local storage
            const classes = JSON.parse(localStorage.getItem('classes')) || [];

            // Remove the class at the specified index
            classes.splice(index, 1);

            // Save the updated classes array back to local storage
            localStorage.setItem('classes', JSON.stringify(classes));

            // Render classes again to reflect changes
            renderClasses();
        }

        // Function to edit class
        function editClass(index) {
            // Retrieve classes from local storage
            const classes = JSON.parse(localStorage.getItem('classes')) || [];

            // Get the class data at the specified index
            const classData = classes[index];

            // Populate form fields with class data for editing
            document.getElementById('class-name').value = classData.name;
            document.getElementById('class-teacher').value = classData.teacher;
            document.getElementById('class-room').value = classData.room;

            // Delete the class from the list
            deleteClass(index);
        }

        // Initial rendering of classes on page load
        document.addEventListener('DOMContentLoaded', function() {
            renderClasses();
        });
    </script>
</body>
</html>
