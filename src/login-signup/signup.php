<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="whole-container">
        <div class="logo-wrapper">
            <img src="../hero-section/assets/logo/png/logo-no-background.png" alt="Gamers Logo">
        </div>
        <div class="form-container">
            <h2>Create an Account</h2>
            <form action="signup.php" method="POST">
                Username: <input type="text" name="username" placeholder="e.x ahmed123" required /><br>
                Email: <input type="email" name="email" required /><br>
                Password: <input type="password" name="password" id="password" required /><br>
                Confirm Password: <input type="password" name="confirm_password" id="confirm_password" required /><br>
                <button type="submit" name="signup">Sign Up</button><br><br>
                <p>Already have an account? <a href="login.php">Login</a></p>
            </form>
        </div>
    </div>

    <?php
    require 'db.php';
    if (isset($_POST['signup'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO userinfo (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);
        $stmt->execute();
        echo "User registered successfully!";
    }
    ?>

    <script>
        const passwordInput = document.getElementById('password');
        passwordInput.addEventListener('input', function() {
            const val = passwordInput.value;
            let strength = 0;
            if (val.length >= 8) strength++;
            if (/[A-Z]/.test(val)) strength++;
            if (/[a-z]/.test(val)) strength++;
            if (/\d/.test(val)) strength++;
            if (/[\W_]/.test(val)) strength++;

            if (val.length === 0) {
                passwordInput.style.border = '';
            } else if (strength <= 2) {
                passwordInput.style.border = '4px solid #e53e3e'; // red
            } else if (strength === 3 || strength === 4) {
                passwordInput.style.border = '4px solid #ecc94b'; // yellow
            } else if (strength === 5) {
                passwordInput.style.border = '4px solid #38a169'; // green
            }
        });
    </script>

</body>

</html>