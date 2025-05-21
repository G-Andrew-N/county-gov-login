<?php
$title = "login page";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>County Gov Login</title>
    <link href="css/login.css" rel="stylesheet">
    
</head>
<body>
    <div class="split-container" id="splitContainer">
        <div class="split-left">
            <div class="logo-slot">
                <!-- Replace src with your logo path -->
                <img src="images/003.jpeg" alt="County Logo" class="logo-img">
            </div>
            <div class="welcome-message" id="welcomeMessage">
                <h2>Welcome to Nyandarua County Gov Portal</h2>
                <p>Access your account securely and manage your county services.</p>
                <button type="button"  id="signInBtn">Sign up</button>
            </div>
            
        </div>
        <div class="split-right" id="splitRight">
            <div class="login-container futuristic-glow">
                <div class="login-title">County Gov Login</div>
                <form class="login-form" action="login.php" method="POST">
                    <input type="text" name="username" placeholder="Username" required autocomplete="username">
                    <input type="password" name="password" placeholder="Password" required autocomplete="current-password">
                    <button type="submit" class="btn">Login</button>
                    <a href="forgot-password.html" class="forgot-link">Forgot Password?</a>
                </form>
            </div>
        </div>
    </div>
    
   
</body>
</html>