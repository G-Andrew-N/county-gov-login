<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nyandarua County Government Portal - Sign Up</title>
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
    <div class="header">
        <h1>Nyandarua County Government Portal</h1>
        <p>Create your account to access county services</p>
    </div>
    
    <div class="signup-container">
        <div class="signup-form">
            <h2>Create Your Account</h2>
            <form action="process_signup.php" method="POST">
                <div class="form-row">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" id="firstName" name="firstName" required placeholder="Enter your first name">
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" id="lastName" name="lastName" required placeholder="Enter your last name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="Role">Acc Type</label>
                    <select type="text" id="AccType" name="AccType" required placeholder="Select your account type">
                        <option value="default" disabled selected>Select your account type</option>
                        <option value="Citizen">Citizen</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required placeholder="Enter your email">
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" required placeholder="Enter your phone number">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required placeholder="Create a password">
                </div>

                <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" required placeholder="Confirm your password">
                </div>

                <button type="submit" class="signup-btn">Create Account</button>

                <div class="terms">
                    By signing up, you agree to our <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                </div>

                <div class="login-link">
                    Already have an account? <a href="login.php">Login here</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html> 