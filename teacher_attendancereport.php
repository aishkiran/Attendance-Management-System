<!DOCTYPE html>
<html lang="en">
<head>
    <title>Online Attendance Management System</title>
    <meta charset="UTF-8">
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="content">
            <h3>Individual Report</h3>

            <form method="post" action="">
                <label>Select Subject</label>
                <select name="whichcourse">
                    <option value="english">ENGLISH</option>
                    <option value="kannada">KANNADA</option>
                    <option value="hindi">HINDI</option>
                    <option value="science">SCIENCE</option>
                    <option value="maths">MATHEMATICS</option>
                    <option value="social">SOCIAL SCIENCE</option>
                </select>
                <p> </p>
                <label>Student Reg. No.</label>
                <input type="text" name="sr_id">
                <input type="submit" name="sr_btn" value="Go!">
            </form>

            <h3>Mass Report</h3>

            <form method="post" action="">
                <label>Select Subject</label>
                <select name="whichcourse">
                    <option value="english">ENGLISH</option>
                    <option value="kannada">KANNADA</option>
                    <option value="hindi">HINDI</option>
                    <option value="science">SCIENCE</option>
                    <option value="maths">MATHEMATICS</option>
                    <option value="social">SOCIAL SCIENCE</option>
                </select>
                <p>  </p>
                <label>Date</label>
                <input type="date" name="date">
                <input type="submit" name="sr_date" value="Go!">
            </form>

            <br>
            <br>

            <?php
            // PHP logic starts here
            if (isset($_POST['sr_btn'])) {
                // Your logic for individual report
            }

            if (isset($_POST['sr_date'])) {
                // Your logic for mass report
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>
