<?php
session_start();
$msg = '';

if(isset($_POST['submit'])) {
    if(isset($_POST['captcha']) && $_POST['captcha'] == $_SESSION['captcha']) {
        header("Location: teacherhomepage.php");
        exit; 
    } else {
        $msg = '<span style="color:red">CAPTCHA FAILED!</span>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif; 
            background-color: #2ecc71;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 60px; 
            border-radius: 20px; 
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 500px; 
            height: 500px; 
            text-align: center;
        }

        input[type="text"], input[type="password"], input[type="submit"] {
            width: calc(100% - 24px);
            padding: 10px; 
            margin: 10px 0;
            box-sizing: border-box;
            border: none;
            border-radius: 20px; 
            font-size: 16px; 
            font-weight: bold; 
        }

        input[type="submit"] {
            background-color: #006400; /* Original color */
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #004d00; /* Lighter green color on hover */
        }

        .error {
            color: red;
        }

        .captcha-container {
            margin: 20px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .refresh-link a:hover {
            text-decoration: underline;
        }

        /* Styling for links */
        a {
            color: #6a0dad; /* Dark purple */
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 style="color: #333;">Login to Your Account</h2>
        <?php echo $msg; ?> <!-- Display error message -->
        <form id="loginForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()">
            <input type="text" id="username" name="username" placeholder="Username" required><br>
            <input type="password" id="password" name="password" placeholder="Password" required><br>
            <div class="captcha-container">
                <img src="captcha.php" alt="CAPTCHA"><br>
                <input type="text" id="captcha" name="captcha" placeholder="Enter CAPTCHA" required><br>
                <div class="refresh-link">
                    <a href='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>'>Click here</a> to refresh
                </div>
            </div>
            <input type="submit" name="submit" value="LOGIN"> 
        </form>
    </div>
    <script>
        function validateForm() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            var captcha = document.getElementById("captcha").value;
            var captchaImg = document.querySelector('.captcha-container img'); // Reference to the CAPTCHA image

            // Username validation
            if (username.trim() === "") {
                alert("Username is required");
                return false;
            } else if (username.length < 6) {
                alert("Username must be at least 6 characters long");
                return false;
            }

            // Password validation
            if (password.trim() === "") {
                alert("Password is required");
                return false;
            } else if (password.length < 8) {
                alert("Password must be at least 8 characters long");
                return false;
            }

            // Captcha validation
            if (captcha.trim() === "") {
                alert("Captcha is required");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
