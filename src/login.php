<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <!-- Add your additional stylesheets or scripts here -->
</head>

<body>
    <div class="wrapper">
        <form id="login" class="input-group" action="login_process.php" method="POST">
            <h1>Login</h1>

            <div class="input-field">
                <input placeholder="Username" type="text" id="username" name="username" required>
                <i class="fa-solid fa-user"></i>
            </div>

            <div class="input-field">
                <input placeholder="Password" type="password" id="password" name="password" required>
                <i class="fa-solid fa-lock"></i>
            </div>

            <div class="input-field">
                <label for="user_type">User Type:</label>
                <select id="user_type" name="user_type" required>
                    <option value="admin">Administrator</option>
                    <option value="patient">Patient</option>
                    <option value="pharmacist">Pharmacist</option>
                    <option value="doctor">Doctor</option>
                    <!-- Add more user types as needed -->
                </select>
            </div>

            <div class="remember-forgot">
                <label for="remember-forgot">
                    <input type="checkbox" name="remember-forgot" id="remember-forgot">Remember Me
                </label>
                <a href="register.php">Forgot Password?</a>
            </div>

            <input class="submit-btn" type="submit" value="Login">

            <div class="register-link">
               <p>Don't have an account? <a href="./register.php">Register</a></p> 
            </div>
        </form>
    </div>
</body>

</html>
