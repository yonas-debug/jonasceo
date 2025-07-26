<?php
session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Read users from file
    $users = file("users.txt", FILE_IGNORE_NEW_LINES);
    $validUser = false;

    foreach ($users as $user) {
        list($fullName, $userEmail, $userPassword) = explode(",", $user);
        if ($email == $userEmail && $password == $userPassword) { // INSECURE!
            $validUser = true;
            break;
        }
    }

    if ($validUser) {
        $_SESSION['user_email'] = $email; // Store user email in session
        header("Location: ../profile.html");
        exit();
    } else {
        echo "Invalid email or password.";
    }
}
?>
