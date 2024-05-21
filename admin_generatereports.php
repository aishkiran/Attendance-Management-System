<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Generate Reports</title>
    <style>
        /* Styles for the admin panel */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f5f9;
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
            align-items: center;
        }

        label {
            margin-bottom: 10px;
            font-weight: bold;
        }

        select, button {
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 200px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        .report {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        canvas {
            margin-top: 20px;
            max-width: 100%;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Generate Attendance Reports</h2>
        <form id="report-form">
            <label for="month">Select Month:</label>
            <select id="month">
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>

            <label for="subject">Select Subject:</label>
            <select id="subject">
                <option value="math">Mathematics</option>
                <option value="science">Science</option>
                <option value="english">English</option>
                <option value="kannada">Kannada</option>
                <option value="hindi">Hindi</option>
                <option value="social">Social Science</option>
                <!-- Add more subjects as needed -->
            </select>

            <label for="class">Select Class:</label>
            <select id="class">
                <option value="10">Class 10</option>
                <option value="11">Class 11</option>
                <option value="12">Class 12</option>
            </select>

            <button type="submit">Generate Report</button>
        </form>

        <div id="report-container" class="report" style="display: none;">
            <h3>Attendance Report</h3>
            <p id="report-content"></p>
            <canvas id="attendance-chart"></canvas>
            <button id="export-report-btn">Export Report</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // JavaScript code for generating reports
        const reportForm = document.getElementById('report-form');
        const reportContainer = document.getElementById('report-container');
        const reportContent = document.getElementById('report-content');
        const exportReportBtn = document.getElementById('export-report-btn');

        reportForm.addEventListener('submit', function(event) {
            event.preventDefault();

            // Retrieve selected month, subject, and class
            const month = document.getElementById('month').value;
            const subject = document.getElementById('subject').value;
            const classSelected = document.getElementById('class').value;

            // Assuming you have a function to generate reports
            const reportData = generateReport(month, subject, classSelected);

            // Display the generated report
            displayReport(reportData);
        });

        function generateReport(month, subject, classSelected) {
            // Here you can fetch data from the server and generate the report
            // For demonstration purposes, let's create a dummy report
            const attendanceData = {
                month: getMonthName(month),
                subject: subject,
                class: `Class ${classSelected}`,
                totalStudents: 50,
                presentStudents: Math.floor(Math.random() * 50) + 1 // Random number between 1 and 50
            };

            return attendanceData;
        }

        function displayReport(reportData) {
            reportContent.innerHTML = `
                <strong>Month:</strong> ${reportData.month}<br>
                <strong>Subject:</strong> ${reportData.subject}<br>
                <strong>Class:</strong> ${reportData.class}<br>
                <strong>Total Students:</strong> ${reportData.totalStudents}<br>
                <strong>Present Students:</strong> ${reportData.presentStudents}<br>
                <strong>Absent Students:</strong> ${reportData.totalStudents - reportData.presentStudents}
            `;
            reportContainer.style.display = 'block';

            // Display attendance chart
            displayChart(reportData.presentStudents, reportData.totalStudents - reportData.presentStudents);
        }

        function getMonthName(month) {
            const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            return months[parseInt(month, 10) - 1];
        }

        function displayChart(present, absent) {
            const ctx = document.getElementById('attendance-chart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Present', 'Absent'],
                    datasets: [{
                        label: 'Attendance Record',
                        data: [present, absent],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 99, 132, 0.2)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }

        exportReportBtn.addEventListener('click', function() {
            // Here you can implement export functionality, such as downloading the report as a PDF or CSV file
            alert('Exporting report...');
            // Implement export functionality here
        });
    </script>
</body>
</html>
