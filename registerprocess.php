<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="trystyle.css">
</head>
<body class="register-bg">
    <div class="container">
    <h2>Register</h2>
    <form action="loginprocess.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <label for="school">School:</label>
        <input type="text" name="school" required><br>

        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <label for="role">Role:</label>
        <select name="role">
            <option value="student">Student</option>
            <option value="teacher">Teacher</option>
        </select><br>

        <input type="submit" name="register" value="Register">
    </form>

    <p >Already have an account? <a href="index.php">Login</a></p>
</div>
</body>
</html>
