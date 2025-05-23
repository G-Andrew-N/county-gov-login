<?php
$title = "login page";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nyandarua County Government Portal - Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

    <?php if (isset($_GET['error'])): ?>
<div id="error-popup" style="
    position: fixed;
    top: 30px;
    left: 50%;
    transform: translateX(-50%);
    background: #e74c3c;
    color: #fff;
    padding: 1rem 2rem;
    border-radius: 7px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.15);
    z-index: 9999;
    font-size: 1.1rem;
">
    Invalid email or password. Please try again.
</div>
<script>
    setTimeout(function() {
        var popup = document.getElementById('error-popup');
        if (popup) popup.style.display = 'none';
    }, 3500);
</script>
<?php endif; ?>

    <div class="left-section">
        <div class="welcome-text">
            <h1>Welcome to Nyandarua County Government Portal</h1>
            
        </div>
        <img src="images/002.jpeg" alt="nyandarua County" class="intro-image">
    </div>
    <div class="right-section">
        <div class="login-form">
            <h2>Login to Your Account</h2>
            <form action="process_login.php" method="POST">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required placeholder="Enter your password">
                </div>
                <button type="submit" class="login-btn">Login</button>
                <div class="forgot-password">
                    <a href="forgot_password.php">Forgot Password?</a>
                </div>
                <div class="signup-link">
                    Don't have an account? <a href="signup.php">Sign up here</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html> 