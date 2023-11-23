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

if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $token = $_POST['token'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);

    // Check if the username and token match in the database
    $check_token_query = "SELECT * FROM users WHERE username='$username' AND reset_token='$token'";
    $check_result = $conn->query($check_token_query);

    if ($check_result->num_rows > 0) {
        $row = $check_result->fetch_assoc();
        
        // Check if the new password is different from the previous one
        if (!password_verify($_POST['new_password'], $row['pass'])) {
            // Update the password and clear the reset token
            $update_password_query = "UPDATE users SET pass='$new_password', reset_token=NULL WHERE username='$username'";
            $conn->query($update_password_query);

            echo "Password updated successfully. You can now <a href='index.php'>login</a> with your new password.";
        } else {
            echo "Error: The new password must be different from the previous one.";
        }
    } else {
        echo "Invalid reset link.";
    }
}

$conn->close();
?>
