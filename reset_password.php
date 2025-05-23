<?php

require_once 'db_connect.php';

$token = $_GET['token'] ?? '';
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    if ($password !== $confirm) {
        $error = "Passwords do not match.";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters.";
    } else {
        // Validate token
        $stmt = $pdo->prepare("SELECT user_id, expires_at FROM password_resets WHERE token = ?");
        $stmt->execute([$token]);
        $reset = $stmt->fetch();

        if ($reset && strtotime($reset['expires_at']) > time()) {
            // Update password
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $pdo->prepare("UPDATE users SET password_hash = ? WHERE id = ?")
                ->execute([$hash, $reset['user_id']]);
            // Delete token
            $pdo->prepare("DELETE FROM password_resets WHERE token = ?")->execute([$token]);
            $success = "Password reset successful. <a href='login.php'>Login here</a>.";
        } else {
            $error = "Invalid or expired token.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login-form">
        <h2>Reset Password</h2>
        <?php if ($error): ?>
            <div style="color: #e74c3c; margin-bottom: 1rem;"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div style="color: #27ae60; margin-bottom: 1rem;"><?php echo $success; ?></div>
        <?php elseif ($token): ?>
        <form action="reset_password.php" method="POST">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" name="password" required placeholder="Enter new password">
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm New Password</label>
                <input type="password" name="confirm_password" required placeholder="Confirm new password">
            </div>
            <button type="submit" class="login-btn">Reset Password</button>
        </form>
        <?php else: ?>
            <div style="color: #e74c3c;">Invalid or missing token.</div>
        <?php endif; ?>
    </div>
</body>
</html>