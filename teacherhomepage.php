<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <style>
        /* Global styles */
        :root {
            --primary-color: #007bff;
            --secondary-color: #0056b3;
            --text-color: #333;
            --bg-color: #f3f5f9;
            --accent-color: #ff7f50;
            --menu-color: #2ecc71; /* Changed header and footer color to green */
            --dark-menu-color: #27ae60; /* Darker green for toggle menu */
            --menu-item-font-size: 18px; /* Increased font size for menu items */
            --footer-color: #2ecc71; /* Changed footer color to green */
            --logout-button-color: #006400; /* Dark green color for logout button */
        }

        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Ensure the page takes at least the height of the viewport */
            background-image: url('timepic.jpeg'); /* Background image URL */
            background-size: 50%; /* Smaller background image */
            background-repeat: no-repeat; /* No repeating the background image */
            background-position: center; /* Center the background image */
            background-attachment: fixed; /* Fixed background image */
        }

        /* Header styles */
        .header {
            background-color: var(--menu-color); /* Applied menu color */
            color: white;
            padding: 30px;
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
            font-size: var(--menu-item-font-size); /* Applied increased font size */
            transition: color 0.3s;
        }

        .menu-item:hover {
            color: var(--secondary-color);
        }

        /* Mobile menu */
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                align-items: flex-start;
            }

            .menu {
                margin-top: 10px;
            }

            .menu-item {
                display: block;
                margin: 5px 0;
            }
        }

        /* Main content wrapper */
        .content-wrapper {
            flex: 1; /* Take up remaining vertical space */
            display: flex;
            flex-direction: column;
        }

        /* Footer styles */
        .footer {
            background-color: var(--footer-color);
            color: white;
            padding: 20px;
            text-align: center;
            margin-top: auto; /* Push footer to the bottom */
        }

        .logout-button {
            background-color: var(--logout-button-color);
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .logout-button:hover {
            background-color: #004d00; /* Darken the green color on hover */
        }

        /* Welcome message styles */
        #teacherName {
            color: black; /* Apply accent color to the teacher's name */
        }
    </style>
</head>
<body>
    <div class="header">
        <h1><b>Teacher Dashboard</b></h1>
        <nav class="menu">
            <a href="teacher_takeattendance.php" class="menu-item">Take Attendance</a> <!-- Changed menu items -->
            <a href="teacher_attendancereport.php" class="menu-item">Attendance Report</a> <!-- Changed menu items -->
        </nav>
    </div>

    <div class="message">
        <p>Welcome, <span id="teacherName"></span>.<br> You can take attendance, view attendance reports, and add assignments from the menu above.</p>
    </div>

    <div class="footer">
        <button class="logout-button" onclick="logout()">Logout</button>
    </div>

    <script>
        // Get the teacher's name from somewhere (e.g., a backend service or query parameters)
        // For example, let's assume it's passed as a query parameter in the URL
        const urlParams = new URLSearchParams(window.location.search);
        const teacherName = urlParams.get('name'); // Retrieve the name from the query parameter
        
        if (teacherName) {
            // If the name exists, set it in the welcome message
            document.getElementById("teacherName").textContent = teacherName;
        } else {
            // If the name is not provided, display a generic message
            document.getElementById("teacherName").textContent = "Teacher";
        }
        
        function logout() {
            // Redirect to the login page
            window.location.href = "mainloginpg.php";
        }
    </script>
</body>
</html>
