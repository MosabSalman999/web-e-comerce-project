<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1 class="site-title">Gamers.jo</h1>
    <div class="form-container">
        <h1>Login</h2>
        <form action="login.php" method="POST">
            Email: <input type="email" name="email" required/><br>
            Password: <input type="password" name="password" required/><br>
            <button type="submit" name="login">Login</button><br><br>
            <p>Don't have an account? <a href="signup.php">Sign up</a></p>
        </form>
</div>

    <?php
        require 'config.php';
        session_start();

        if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['username'];
            header("Location: dashboard.php");
        } else {
            echo "Invalid login credentials.";
        }
        }
    ?>

</body>
</html>