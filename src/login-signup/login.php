<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="logo-wrapper">
        <img src="../hero-section/assets/logo/png/logo-no-background.png" alt="Gamers Logo">
    </div>

    <div class="form-container">
        <h1>Login</h1>
        <form action="login.php" method="POST">
            <div class="field-center">
                Email: <input type="email" name="email" required><br>
                Password: <input type="password" name="password" required><br>
            </div>
            <div class="button-center"> <button type="submit" name="login">Login</button></div><br><br>
            <p>Don't have an account? <a href="signup.php">Sign up</a></p>
        </form>
    </div>

    <?php
    require 'db.php';
    session_start();

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Fetch user by email
        $stmt = $conn->prepare("SELECT * FROM userinfo WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        // Verify password
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['id'] = $user['id'];
            header("Location: ../hero-section/index.php");
            exit();
        } else {
            echo "<p style='color: red; text-align: center;'>Invalid login credentials.</p>";
        }
    }
    ?>

</body>

</html>