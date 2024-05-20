<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Attendance Tracker</title>
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


         .footer {
            background-color: var(--footer-color);
            color: white;
            padding: 30px;
            text-align: center;
            margin-top: auto; /* Push the footer to the bottom */
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
            width: 60%; /* Set a larger width */
            margin: 100px auto; /* Center container horizontally and add spacing */
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

        .button {
            padding: 15px 30px;
            background-color: var(--button-color);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #218838; /* Darker green on hover */
        }

    </style>
</head>
<body>
    <div class="header">
        <h1>Attendance Tracker</h1>
    </div>

    <div class="container">
        <h1>Track Your Attendance</h1>
        <div class="form-container">
            <label for="subject"><b>Select Subject:</b></label>
            <select id="subject"></select>
        </div>
        <div class="form-container">
            <label for="month"><b>Select Month:</b></label>
            <select id="month"></select>
        </div>
        <div class="form-container">
            <button class="button">Submit</button>
        </div>
    </div>

    <div class="footer">
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
    const subjectDropdown = document.getElementById('subject');
    const monthDropdown = document.getElementById('month');
    const attendanceDiv = document.getElementById('attendance');

    // Simulated attendance data (replace with actual data retrieval based on selected subject and month)
    const attendanceData = {
        // Sample data structure: subjectName: [{date: "YYYY-MM-DD", status: "Present/Absent"}, ...]
        "English": [],
        "Kannada": [],
        "Hindi": [],
        "Maths": [],
        "Computer Science": [],
        "Science": []
        // Add more subjects if needed
    };

    // Populate subjects
    const subjects = ["English", "Kannada", "Hindi", "Maths", "Computer Science", "Science"];
    subjects.forEach(subject => {
        const option = document.createElement('option');
        option.value = subject;
        option.textContent = subject;
        subjectDropdown.appendChild(option);
    });

    // Populate months
    const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    months.forEach((month, index) => {
        const option = document.createElement('option');
        const paddedIndex = ('0' + (index + 1)).slice(-2); // Add leading zero if needed
        option.value = paddedIndex;
        option.textContent = month;
        monthDropdown.appendChild(option);
    });

    subjectDropdown.addEventListener('change', updateAttendance);
    monthDropdown.addEventListener('change', updateAttendance);

    function updateAttendance() {
        const selectedSubject = subjectDropdown.value;
        const selectedMonth = monthDropdown.value;
        const selectedAttendance = attendanceData[selectedSubject];

        if (selectedAttendance) {
            const filteredAttendance = selectedAttendance.filter(entry => {
                const entryMonth = entry.date.split("-")[1];
                return entryMonth === selectedMonth;
            });

            if (filteredAttendance.length > 0) {
                displayAttendance(filteredAttendance);
            } else {
                displayNoData();
            }
        } else {
            displayNoData();
        }
    }

    function displayAttendance(attendanceData) {
        let tableHTML = '';
        attendanceData.forEach(entry => {
            tableHTML += `<tr><td>${entry.date}</td><td>${entry.status}</td></tr>`;
        });
        attendanceDiv.innerHTML = tableHTML;
    }

    function displayNoData() {
        attendanceDiv.innerHTML = '<p>No attendance data available</p>';
    }

    // Add event listener to submit button
    const submitButton = document.querySelector('.button');

    submitButton.addEventListener('click', function() {
        // Redirect to the next page
        window.location.href = 'next_page.html'; // Replace 'next_page.html' with the URL of your next page
    });
});
</script>
</body>
</html>
