<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Attendance Management System</title>
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
            font-family: Arial, sans-serif;
            background-color: var(--bg-color); /* Applied background color */
            color: var(--text-color); /* Applied text color */
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* This will make sure the footer sticks to the bottom */
        }

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

        /* Footer styles */
        .footer {
            background-color: var(--footer-color);
            color: white;
            padding: 20px;
            text-align: center;
            margin-top: auto; /* Push footer to the bottom */
            width: 100%; /* Make sure the footer spans the entire width */
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            flex-grow: 1; /* This will make sure the container grows to fill the available space */
            display: flex;
            flex-direction: column;
            align-items: center; /* Center items horizontally */
        }

        .center {
            text-align: center;
        }

        /* Add your CSS styles here */
        table {
            border: 2px solid #dddddd; /* Add border */
            border-collapse: collapse;
            width: 100%; /* Make the table span the entire width of its container */
            max-width: 100%; /* Ensure the table doesn't exceed its container's width */
            font-size: 20px; /* Increase font size */
            padding: 20px; /* Increase padding */
        }

        th, td {
            border: 2px solid #dddddd; /* Add border */
            text-align: left;
            padding: 20px; /* Increase padding */
        }

        th {
            background-color: #f2f2f2;
        }

        /* Submit attendance button styles */
        input[type="submit"] {
            background-color: var(--menu-color); /* Green color for the button */
            color: white;
            padding: 14px 28px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: var(--dark-menu-color); /* Darker green color on hover */
        }

        input[type="submit"]:focus {
            outline: none; /* Remove outline on focus */
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>STUDENT ATTENDANCE</h1>
        <!-- Add any header content or navigation links here -->
    </div>

    <div class="container">
        <h2 class="center">Today's Date: <?php echo date('d-m-Y'); ?></h2>
        <?php 
        if (isset($att_msg)) {
            echo "<p class='center'>$att_msg</p>";
        }
        if (isset($error_msg)) {
            echo "<p class='center'>$error_msg</p>";
        }
        ?>
        <form action="" method="post">
            <div class="center">
                <label for="whichcourse"><b>Select Subject:<b></label>
                <select name="whichcourse" id="whichcourse">
                    <option value="english">ENGLISH</option>
                    <option value="kannada">KANNADA</option>
                    <option value="hindi">HINDI</option>
                    <option value="science">SCIENCE</option>
                    <option value="maths">MATHEMATICS</option>
                    <option value="social">SOCIAL SCIENCE</option>
                </select>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Reg. No.</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Semester</th>
                        <th>Attendance Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['batch'])) {
                        $i = 1; // Start from 1
                        $batch = 2020;
                        $all_query = mysqli_query($conn, "SELECT * FROM students WHERE st_batch='$batch' ORDER BY st_id ASC");
                        while ($data = mysqli_fetch_array($all_query)) {
                            ?>
                            <tr>
                                <td><?php echo $data['st_id']; ?><input type="hidden" name="stat_id[]" value="<?php echo $data['st_id']; ?>"></td>
                                <td><?php echo $data['st_name']; ?></td>
                                <td><?php echo $data['st_dept']; ?></td>
                                <td><?php echo $data['st_sem']; ?></td>
                                <td>
                                    <input type="checkbox" name="st_status[<?php echo $i; ?>]" value="Present" checked> Present
                                </td>
                            </tr>
                            <?php
                            $i++;
                        }
                    }
                    ?>
                </tbody>
            </table>
            <br>
            <input type="submit" value="Submit Attendance" name="att" />
        </form>
    </div>

    <div class="footer">
    </div>
</body>
</html>
