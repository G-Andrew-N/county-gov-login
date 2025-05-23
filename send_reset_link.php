<?php

require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);

    // Check if user exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        // Generate a token and expiry
        $token = bin2hex(random_bytes(32));
        $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // Store token in a password_resets table (create this table if not exists)
        $pdo->prepare("INSERT INTO password_resets (user_id, token, expires_at) VALUES (?, ?, ?)")
            ->execute([$user['id'], $token, $expires]);

        // Send email with reset link (for demo, just display the link)
        $resetLink = "http://localhost/county-gov-login/reset_password.php?token=$token";
        echo "A password reset link has been sent to your email.<br>";
        echo "<a href='$resetLink'>$resetLink</a>";
    } else {
        echo "No account found with that email.";
    }
}
?>