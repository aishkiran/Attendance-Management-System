<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Attendance Tracker</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            background-image: url('https://www.transparenttextures.com/patterns/45-degree-fabric-light.png');
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 60px;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #007bff, #4e8cff);
            color: #fff;
            position: relative;
            border: 2px solid #ddd;
        }

        h1 {
            margin-top: 20px;
            font-size: 36px;
        }

        .unique-text {
            margin-top: 10px;
            font-size: 20px;
            color: #f0f0f0;
        }

        .role-selection {
            margin-top: 50px;
        }

        .role-selection p {
            font-size: 24px;
            color: #ffffff;
        }

        .role-btn {
            color: #fff;
            padding: 14px 30px;
            border: 2px solid transparent;
            border-radius: 30px;
            cursor: pointer;
            margin: 20px 10px;
            transition: all 0.3s ease;
            font-size: 18px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-student {
            background-color: #f39c12;
        }

        .btn-teacher {
            background-color: #1e7e34;
        }

        .btn-admin {
            background-color: #8e44ad;
        }

        .role-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            border-color: #ddd;
        }

        .logo {
            width: 200px;
            margin-top: 30px;
        }

        @media (max-width: 600px) {
            .container {
                padding: 30px;
            }
            h1 {
                font-size: 28px;
            }
            .unique-text {
                font-size: 16px;
            }
            .role-selection p {
                font-size: 20px;
            }
            .role-btn {
                padding: 10px 20px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container animate__animated animate__fadeInRight">
        <img src="aclogo.jpeg" alt="Company Logo" class="logo">
        <h1>Student Attendance Tracker</h1>
        <p class="unique-text">Stay on top of your attendance and academic progress.</p>
        <div class="role-selection">
            <p>SELECT YOUR ROLE:</p>
            <button class="role-btn btn-student" onclick="redirectToLogin('student')">Student</button>
            <button class="role-btn btn-teacher" onclick="redirectToLogin('teacher')">Teacher</button>
            <button class="role-btn btn-admin" onclick="redirectToLogin('admin')">Admin</button>
        </div>
    </div>

    <script>
        function redirectToLogin(role) {
            if (role === "student") {
                window.location.href = "studentloginpage.php";
            } else if (role === "teacher") {
                window.location.href = "teacherloginpage.php";
            } else if (role === "admin") {
                window.location.href = "adminloginpage.php";
            }
        }
    </script>
</body>
</html>
