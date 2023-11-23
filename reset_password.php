<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" type="text/css" href="reset_password.css">
</head>
<body>
    <h2>Reset Password</h2>
    <form action="resetprocess.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="school">School:</label>
        <input type="text" id="school" name="school" required>
        <button type="submit" name="reset">Reset Password</button>
    </form>
</body>
</html>
