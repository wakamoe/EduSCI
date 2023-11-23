<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Unchanged code for creating the database, checking connection, and function to hash password

if (isset($_GET['username']) && isset($_GET['token'])) {
    $username = $_GET['username'];
    $token = $_GET['token'];

    // Check if the username and token match in the database
    $check_token_query = "SELECT * FROM users WHERE username=? AND reset_token=?";
    $stmt = $conn->prepare($check_token_query);
    $stmt->bind_param("ss", $username, $token);
    $stmt->execute();
    $check_result = $stmt->get_result();
    if ($check_result->num_rows > 0) {
        // Display a form for the user to enter a new password
        echo "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Reset Password</title>
                <link rel='stylesheet' type='text/css' href='reset_password.css'>
            </head>
            <body>
                <h2>Reset Password</h2>
                <form action='password_update.php' method='post'>
                    <input type='hidden' name='username' value='$username'>
                    <input type='hidden' name='token' value='$token'>
                    <label for='new_password'>New Password:</label>
                    <input type='password' id='new_password' name='new_password' required>
                    <button type='submit' name='update'>Update Password</button>
                </form>
            </body>
            </html>
        ";
    } else {
        echo "Invalid reset link.";
    }
} else {
    echo "Invalid reset link.";
}

$conn->close();
?>
