<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="trystyle.css">
</head>
<body class="login-bg">
<div class="container">
    <h2>Login</h2>
    <form action="loginprocess.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" name="login" value="Login">
    </form>

    <p>Don't have an account? <a href="registerprocess.php">Register</a></p>

    <p>Forgot password? <a href="reset_password.php">Change Password</a></p>
    <div>
</body>
</html>
