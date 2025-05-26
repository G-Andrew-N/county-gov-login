<?php
session_start();
require_once 'db_connect.php';

//collecting data from input fields
$firstName = trim($_POST['firstName']);
$lastName = trim($_POST['lastName']);
$AccType = trim($_POST['AccType']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$password = $_POST['password'];

// Hash the password
$passwordHash = password_hash($password, PASSWORD_DEFAULT);
// Check if the email already exists
$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch();
if ($user) {
    // Email already exists
    header('Location: signup.php?error=email_exists');
    exit;
}
// Insert the new user into the database
$stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, phone, password_hash, status) VALUES (?, ?, ?, ?, ?, 'Active')");
$stmt->execute([$firstName, $lastName, $email, $phone, $passwordHash]);

?>