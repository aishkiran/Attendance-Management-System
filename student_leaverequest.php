<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Leave Request</title>
    <style>
        /* Global styles */
        :root {
            --primary-color: #007bff;
            --secondary-color: #0056b3;
            --bg-color: #f3f5f9;
            --menu-color: #ff8c00; /* Changed header and footer color to orange */
            --menu-item-font-size: 15px; /* Increased font size for menu items */
            --footer-color: #ff8c00; /* Changed footer color to orange */
            --button-color: #28a745; /* Green button color */
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Ensure the page takes at least the height of the viewport */
            background-color: var(--bg-color); /* Set background color */
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
            font-size: 28px; /* Increased font size for the header */
        }

        .container {
            padding: 20px;
            background-color: #FFFFFF; /* Light-colored background */
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column; /* Align items vertically */
            align-items: center; /* Center horizontally */
            width: 60%; /* Set a smaller width */
            margin: 10px auto; /* Center container horizontally and add smaller spacing */
            flex: 1; /* Allow container to grow to fill available space */
        }

        .container h1 {
            font-size: 36px; /* Increased font size for the container heading */
            color: black; /* Changed heading color to black */
            width: 100%;
            margin-bottom: 20px;
            text-align: center; /* Center the heading */
        }

        label {
            margin-right: 10px;
            margin-bottom: 10px; /* Add margin below each label */
        }

        select {
            padding: 15px; /* Increased padding */
            font-size: 18px; /* Increased font size */
            border-radius: 8px; /* Increased border radius */
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            width: 100%; /* Set width to 100% */
            margin-bottom: 10px; /* Add margin below each select element */
        }

        textarea {
            padding: 15px; /* Increased padding */
            font-size: 18px; /* Increased font size */
            border-radius: 8px; /* Increased border radius */
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            width: 100%; /* Set width to 100% */
            margin-bottom: 10px; /* Add margin */
            resize: vertical; /* Allow vertical resizing */
            max-height: 150px; /* Set maximum height */
        }

        .button {
            padding: 15px 30px;
            background-color: var(--button-color);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 20px; /* Added margin at the top */
        }

        .button:hover {
            background-color: #218838; /* Darker green on hover */
        }

        .button-container {
            text-align: center;
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
        <h1>Student Leave Request</h1>
    </div>

    <div class="container">
        <h1>Request a Leave</h1>
        <form id="leave-form" method="POST" action="teacherleaverequest.php">
            <label for="leave-date"><b>Select Date:</b></label>
            <input type="date" id="leave-date" name="leave-date" required><br>
            
            <label><b>SELECT IF YOU ARE YOU TAKING FULL DAY LEAVE</b></label>
            <div id="leave-types">
                <input type="checkbox" id="fullday" name="fullday">
                <label for="fullday">Full Day Leave</label>
            </div>
            <label><b>IF NOT<br>SELECT THE CLASSES YOU WONT BE ATTENDING</b></label>
            <div>
                <input type="checkbox" id="subject1" name="subject1">
                <label for="subject1">English</label>
            </div>
            <div>
                <input type="checkbox" id="subject2" name="subject2">
                <label for="subject2">Kannada</label>
            </div>
            <div>
                <input type="checkbox" id="subject3" name="subject3">
                <label for="subject3">Sanskrit</label>
            </div>
            <div>
                <input type="checkbox" id="subject4" name="subject4">
                <label for="subject4">Hindi</label>
            </div>
            <div>
                <input type="checkbox" id="subject5" name="subject5">
                <label for="subject5">Science</label>
            </div>
            <div>
                <input type="checkbox" id="subject6" name="subject6">
                <label for="subject6">Mathematics</label>
            </div>
            <div>
                <input type="checkbox" id="subject7" name="subject7">
                <label for="subject7">Social Science</label>
            </div>
            
            
            <label for="reason"><b>REASON FOR LEAVE:</b></label>
            <textarea id="reason" name="reason" rows="3" placeholder="Enter the reason for your leave..." required></textarea>
            
            <div class="button-container">
                <input type="submit" id="submit-btn" class="button" value="Submit">
            </div>
        </form>
        <p id="response"></p>
    </div>

    <div class="footer">
    </div>

</body>
</html>
