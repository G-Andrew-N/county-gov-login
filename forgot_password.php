<?php
// forgot_password.php
$title = "forgot password";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="css/forgot_password.css">
   
       
</head>
<body>
    <div class="login-form">
        <h2>Forgot Password</h2>
        <form action="send_reset_link.php" method="POST">
            <div class="form-group">
                <label for="email">Enter your email address</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email">
            </div>
            <button type="submit" class="login-btn">Send Reset Link</button>
        </form>
    </div>
</body>
</html>
