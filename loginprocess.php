<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_db"; // Updated the database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if not exists
$sql_create_db = "CREATE DATABASE IF NOT EXISTS school_db";
$conn->query($sql_create_db);

// Select the database
$conn->select_db("school_db");

// Create table if not exists
$sql_create_table = "CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(50),
    school VARCHAR(50),
    username VARCHAR(50) UNIQUE,
    pass VARCHAR(255),
    user_role ENUM('student', 'teacher') DEFAULT 'teacher'
)";

$conn->query($sql_create_table);

// Function to hash the password
function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}

if (isset($_POST['register'])) {
    // Registration logic
    $name = $_POST['name'];
    $school = $_POST['school'];
    $username = $_POST['username'];
    $password = hashPassword($_POST['password']);
    $role = $_POST['role'];

    // Check if the username already exists
    $check_username_query = "SELECT * FROM users WHERE username='$username'";
    $check_result = $conn->query($check_username_query);

    if ($check_result->num_rows > 0) {
        echo "Error: Username '$username' already exists. Please choose a different username.";
    } else {
        // Insert new user
        $sql_insert_user = "INSERT INTO users (user_name, school, username, pass, user_role) VALUES ('$name', '$school', '$username', '$password', '$role')";

        if ($conn->query($sql_insert_user) === TRUE) {
            echo "Registration successful! <br>";
            echo "Click here to <a href='index.php'>Login</a>";
        } else {
            echo "Error: " . $sql_insert_user . "<br>" . $conn->error;
        }
    }
} elseif (isset($_POST['login'])) {
    // Login logic
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql_select_user = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql_select_user);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['pass'])) {
            echo "Login successful! Welcome, " . $row['user_name'] . "!";
            header("Location: dashboard.php");
            exit();
            // Add code for session handling or redirection based on the role
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "User not found! <br>";
        echo "Click here to <a href='registerprocess.php'>Register</a>";
    }
}

$conn->close();
?>
