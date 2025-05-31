<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    body {
      background-color: #0d1f1e;
      color: #fff;
      font-family: 'Open Sans', sans-serif;
    }

    .logo-wrapper {
      text-align: center;
      margin-top: 20px;
      margin-bottom: 10px
    }

    .logo-wrapper img {
      width: 120px;
      height: auto;
    }

    .error {
      color: red;
      margin-bottom: 15px;
      font-weight: bold;
      text-align: center;
    }

    .form-container {
      max-width: 400px;
      margin: 20px auto;
      padding: 20px;
      background-color: #112623;
      border-radius: 10px;
    }

    input, button {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border-radius: 5px;
      border: none;
    }

    button {
      background-color: #00ffa3;
      color: #112623;
      font-weight: bold;
      cursor: pointer;
    }

    a {
      color: #00ffa3;
    }
  </style>
</head>
<!-- Logo above container -->
  <div class="logo-wrapper">
    <img src="/assets/logo/png/logo-no-background.png" alt="Gamers Logo">
  </div>

  <div class="form-container">
    <div id="error-message" class="error" style="display: none;"></div>
    <form id="login-form" action="login.php" method="POST" onsubmit="return validateForm()">
      Email: <input type="email" id="email" name="email" /><br>
      Password: <input type="password" id="password" name="password" /><br>
      <button type="submit" name="login">Login</button><br><br>
      <p>Don't have an account? <a href="signup.php">Sign up</a></p>
    </form>
  </div>

  <script>
    function validateForm() {
      const email = document.getElementById("email").value.trim();
      const password = document.getElementById("password").value.trim();
      const errorMessage = document.getElementById("error-message");

      const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[!@#$%^&*()_+\\-=[\\]{};':\"\\\\|,.<>/?]).{8,}$/;

      if (!email || !password) {
        errorMessage.textContent = "All fields are required.";
        errorMessage.style.display = "block";
        return false;
      }

      if (!passwordPattern.test(password)) {
        errorMessage.textContent = "Password must be at least 8 characters and include uppercase, lowercase, number, and special character.";
        errorMessage.style.display = "block";
        return false;
      }

      errorMessage.style.display = "none";
      return true;
    }
  </script>

  <?php
    require 'db.php';
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
        echo "<p class='error'>Invalid login credentials.</p>";
      }
    }
  ?>

</body>
</html>