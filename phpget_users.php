<?php
session_start();

// Check if admin is logged in (add proper security!)
if (!isset($_SESSION['admin'])) {
    die("Unauthorized");
}

$users = file("users.txt", FILE_IGNORE_NEW_LINES);
$userData = [];

foreach ($users as $user) {
    list($fullName, $email, $password) = explode(",", $user);
    $userData[] = ["fullName" => $fullName, "email" => $email];
}

header('Content-Type: application/json');
echo json_encode($userData);
?>
