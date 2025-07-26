<?php
session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST["fullName"];
    $email = $_POST["email"];
    $password = $_POST["password"]; // In real app HASH PASSWORD!
    $confirmPassword = $_POST["confirmPassword"];

     // Validate inputs (add more validation!)
     if (empty($fullName) || empty($email) || empty($password) || ($password !== $confirmPassword) ) {
        die("Please fill all fields properly, make sure the password is correct.");
    }

    $userData = "$fullName,$email,$password\n";
    file_put_contents("users.txt", $userData, FILE_APPEND | LOCK_EX);

    $_SESSION['user_email'] = $email; // Store user email in session

    header("Location:congratulations.html"); // Redirect
    exit();
}
?>
