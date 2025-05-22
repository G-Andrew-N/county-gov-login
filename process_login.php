<?php

session_start();
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Fetch user by email
    $stmt = $pdo->prepare("SELECT u.id, u.first_name, u.last_name, u.password_hash, u.status, r.role_name
        FROM users u
        JOIN user_roles ur ON u.id = ur.user_id
        JOIN roles r ON ur.role_id = r.id
        WHERE u.email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && $user['status'] === 'Active' && password_verify($password, $user['password_hash'])) {
        // Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['first_name'] . ' ' . $user['last_name'];
        $_SESSION['role'] = $user['role_name'];

        // Redirect based on role
        if ($user['role_name'] === 'Admin') {
            header('Location: adminPanel.html');
        } elseif ($user['role_name'] === 'Staff') {
            header('Location: staffDashboard.html');
        } else {
            header('Location: Citizens.html');
        }
        exit;
    } else {
        // Invalid user login
        header('Location: login.php?error=1');
        exit;
    }
} else {
    header('Location: login.php');
    exit;
}
?>
