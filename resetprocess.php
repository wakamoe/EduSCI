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
$check_token_column_query = "SHOW COLUMNS FROM users LIKE 'reset_token'";
$result = $conn->query($check_token_column_query);

if ($result->num_rows == 0) {
    // If the reset_token column doesn't exist, add it
    $alter_table_query = "ALTER TABLE users ADD COLUMN reset_token VARCHAR(255)";
    $conn->query($alter_table_query);
}

if (isset($_POST['reset'])) {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $school = $_POST['school'];

    // Check if the username, name, and school match in the database
    $check_user_query = "SELECT * FROM users WHERE username='$username' AND user_name='$name' AND school='$school'";
    $check_result = $conn->query($check_user_query);

    if ($check_result->num_rows > 0) {
        // Generate a unique token
        $token = bin2hex(random_bytes(32));

        // Store the token in the database
        $update_token_query = "UPDATE users SET reset_token='$token' WHERE username='$username'";
        $conn->query($update_token_query);

        // Redirect to the password reset confirmation page
        header("Location: pass_confirm.php?username=$username&token=$token");
        exit();
    } else {
        echo "Invalid user information.";
    }
}
$conn->close();
?>
