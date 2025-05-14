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
                Email: <input type="email" name="email" required /><br>
                Password: <input type="password" name="password" required /><br>
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

        $sql = "SELECT * FROM userinfo WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "Login Successful<br><br><br>";
        } else {
            echo "Failed Login: <a href='index.php'>Try again</a>";
        }

        $conn->close();
        if ($result) {
            header("Location: ../hero-section/index.php");
        } else {
            echo "Invalid login credentials.";
        }
    }
    ?>

</body>

</html>