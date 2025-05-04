<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1 class="site-title">Gamers.jo</h1>
    <div class="form-container">
        <h2>Create an Account</h2>
        <form action="signup.php" method="POST">
            Username: <input type="text" name="username" placeholder="e.x ahmed123" required /><br>
            Email: <input type="email" name="email" required /><br>
            Password: <input type="password" name="password" required /><br>
            Confirm Password: <input type="password" name="password" required/><br>
            <button type="submit" name="signup">Sign Up</button><br><br>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </form>
    </div>

    <?php
        require 'config.php';
        if (isset($_POST['signup'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);
        $stmt->execute();
        echo "User registered successfully!";
        }
    ?>

</body>
</html>