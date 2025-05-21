<?php
require 'db.php';
session_start();

// Generate CSRF token if not exists
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['signup'])) {
    // Verify CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $error = "Invalid CSRF token";
    } else {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        // Validate password strength
        $passwordErrors = [];

        if (strlen($password) < 12) {
            $passwordErrors[] = "Password must be at least 12 characters long";
        }

        if (!preg_match('/[A-Z]/', $password)) {
            $passwordErrors[] = "Password must contain at least one uppercase letter";
        }

        if (!preg_match('/[a-z]/', $password)) {
            $passwordErrors[] = "Password must contain at least one lowercase letter";
        }

        if (!preg_match('/\d/', $password)) {
            $passwordErrors[] = "Password must contain at least one number";
        }

        if (!preg_match('/[\W_]/', $password)) {
            $passwordErrors[] = "Password must contain at least one special character";
        }

        // Validate passwords match
        if ($password !== $confirm_password) {
            $passwordErrors[] = "Passwords do not match";
        }

        // If password errors exist
        if (!empty($passwordErrors)) {
            $error = implode("<br>", $passwordErrors);
        } else {
            // Check if email already exists
            $stmt = $conn->prepare("SELECT id FROM userinfo WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $error = "Email already registered";
            } else {
                // Hash password
                $password_hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);

                // Insert new user
                $stmt = $conn->prepare("INSERT INTO userinfo (username, email, password) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $username, $email, $password_hash);

                if ($stmt->execute()) {
                    $_SESSION['registration_success'] = true;
                    header("Location: login.php");
                    exit();
                } else {
                    $error = "Registration failed. Please try again.";
                }
            }
        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="auth-container">
        <div class="logo-wrapper">
            <img src="../hero-section/assets/logo/png/logo-no-background.png" alt="Gamers Logo">
        </div>

        <div class="form-container">
            <?php if (isset($error)): ?>
                <div class="error-message"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <h2>Create an Account</h2>
            <form action="signup.php" method="POST" id="signup-form">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">

                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" placeholder="e.g. mosab123" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="e.g. example@email.com#" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="e.g. Mosab123#" required>
                    <div id="password-strength" class="strength-meter">
                        <div class="strength-bar"></div>
                        <span class="strength-text"></span>
                    </div>
                    <ul class="password-requirements">
                        <li id="req-length">Minimum 12 characters</li>
                        <li id="req-upper">At least one uppercase letter</li>
                        <li id="req-lower">At least one lowercase letter</li>
                        <li id="req-number">At least one number</li>
                        <li id="req-special">At least one special character</li>
                    </ul>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm" required>
                    <div id="password-match"></div>
                </div>

                <button type="submit" name="signup" id="submit-btn" disabled>Sign Up</button>

                <p class="auth-link">Already have an account? <a href="login.php">Login</a></p>
            </form>
        </div>
    </div>

    <script>
        const passwordInput = document.getElementById('password');
        const confirmInput = document.getElementById('confirm_password');
        const strengthBar = document.querySelector('.strength-bar');
        const strengthText = document.querySelector('.strength-text');
        const submitBtn = document.getElementById('submit-btn');
        const requirements = {
            length: document.getElementById('req-length'),
            upper: document.getElementById('req-upper'),
            lower: document.getElementById('req-lower'),
            number: document.getElementById('req-number'),
            special: document.getElementById('req-special')
        };

        let passwordValid = false;
        let passwordMatch = false;

        passwordInput.addEventListener('input', function() {
            const val = passwordInput.value;

            // Check requirements
            const hasLength = val.length >= 12;
            const hasUpper = /[A-Z]/.test(val);
            const hasLower = /[a-z]/.test(val);
            const hasNumber = /\d/.test(val);
            const hasSpecial = /[\W_]/.test(val);

            // Update requirement indicators
            requirements.length.style.color = hasLength ? '#38a169' : '#e53e3e';
            requirements.upper.style.color = hasUpper ? '#38a169' : '#e53e3e';
            requirements.lower.style.color = hasLower ? '#38a169' : '#e53e3e';
            requirements.number.style.color = hasNumber ? '#38a169' : '#e53e3e';
            requirements.special.style.color = hasSpecial ? '#38a169' : '#e53e3e';

            // Calculate strength score (0-100)
            let strength = 0;
            if (hasLength) strength += 20;
            if (hasUpper) strength += 20;
            if (hasLower) strength += 20;
            if (hasNumber) strength += 20;
            if (hasSpecial) strength += 20;

            // Update strength meter
            strengthBar.style.width = `${strength}%`;

            if (strength === 0) {
                passwordInput.style.border = '2px solid #e53e3e'; // red

                strengthBar.style.backgroundColor = 'transparent';
                strengthText.textContent = '';
            } else if (strength <= 40) {
                passwordInput.style.border = '2px solid #e53e3e'; // red

                strengthBar.style.backgroundColor = '#e53e3e';
                strengthText.textContent = 'Weak';
                strengthText.style.color = '#e53e3e';
                passwordValid = false;
            } else if (strength <= 80) {
                passwordInput.style.border = '2px solid #ecc94b'; // yellow

                strengthBar.style.backgroundColor = '#ecc94b';
                strengthText.textContent = 'Medium';
                strengthText.style.color = '#ecc94b';
                passwordValid = false;
            } else {
                passwordInput.style.border = '2px solid #38a169'; // green

                strengthBar.style.backgroundColor = '#38a169';
                strengthText.textContent = 'Strong';
                strengthText.style.color = '#38a169';
                passwordValid = true;
            }

            updateSubmitButton();
        });

        confirmInput.addEventListener('input', function() {
            passwordMatch = passwordInput.value === confirmInput.value;

            const matchIndicator = document.getElementById('password-match');
            if (passwordInput.value === '') {
                matchIndicator.textContent = '';
                matchIndicator.className = '';
            } else if (passwordMatch) {
                matchIndicator.textContent = 'Passwords match';
                matchIndicator.className = 'match';
            } else {
                matchIndicator.textContent = 'Passwords do not match';
                matchIndicator.className = 'no-match';
            }

            updateSubmitButton();
        });

        function updateSubmitButton() {
            submitBtn.disabled = !(passwordValid && passwordMatch);
        }

        document.getElementById('signup-form').addEventListener('submit', function(e) {
            if (!passwordValid) {
                e.preventDefault();
                alert('Password does not meet strength requirements!');
                return false;
            }

            if (!passwordMatch) {
                e.preventDefault();
                alert('Passwords do not match!');
                return false;
            }
        });
    </script>
</body>

</html>