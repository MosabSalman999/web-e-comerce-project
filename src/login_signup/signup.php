<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    body {
      background-color: #0d1f1e;
      color: #fff;
      font-family: 'Open Sans', sans-serif;
      margin-bottom: -75px
    }

    .logo-wrapper {
      text-align: center;
      margin-top: 20px;
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
      margin: 0 auto 50px auto;
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

    body, html {
      height: 100%;
      margin: 0;
    }

    .center-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        text-align: center;
    }
  </style>
</head>
<body>
<main class="center-wrapper">
  <!-- Logo above the form -->
  <div class="logo-wrapper">
    <img src="/assets/logo/png/logo-no-background.png" alt="Gamers Logo">
  </div>

  <div class="form-container">
    <h2 style="text-align:center;">Create an Account</h2>
    <div id="error-message" class="error" style="display: none;"></div>
    <form id="signup-form" action="signup.php" method="POST" onsubmit="return validateSignupForm()">
      Username: <input type="text" id="username" name="username" placeholder="e.x ahmed123" /><br>
      Email: <input type="email" id="email" name="email" /><br>
      Password: <input type="password" id="password" name="password" /><br>
      Confirm Password: <input type="password" id="confirm-password" name="confirm_password" /><br>
      <button type="submit" name="signup">Sign Up</button><br><br>
      <p style="text-align:center;">Already have an account? <a href="login.php">Login</a></p>
    </form>
  </div>
  </main>
  <script>
    function validateSignupForm() {
      const username = document.getElementById("username").value.trim();
      const email = document.getElementById("email").value.trim();
      const password = document.getElementById("password").value;
      const confirmPassword = document.getElementById("confirm-password").value;
      const errorMessage = document.getElementById("error-message");

      const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[!@#$%^&*()_+\\-=[\\]{};':\"\\\\|,.<>/?]).{8,}$/;

      if (!username || !email || !password || !confirmPassword) {
        errorMessage.textContent = "All fields are required.";
        errorMessage.style.display = "block";
        return false;
      }

      if (!passwordPattern.test(password)) {
        errorMessage.textContent = "Password must be at least 8 characters and include uppercase, lowercase, number, and special character.";
        errorMessage.style.display = "block";
        return false;
      }

      if (password !== confirmPassword) {
        errorMessage.textContent = "Passwords do not match.";
        errorMessage.style.display = "block";
        return false;
      }

      errorMessage.style.display = "none";
      return true;
    }
  </script>

  <?php
    require 'db.php';
    if (isset($_POST['signup'])) {
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $confirm_password = password_hash($_POST['confirm_password'], PASSWORD_DEFAULT);

      $stmt = $conn->prepare("INSERT INTO users (username, email, password, confirm_password) VALUES (?, ?, ?, ?)");
      $stmt->bind_param("ssss", $username, $email, $password, $confirm_password);
      $stmt->execute();
      echo '<p style="color: #00ffa3;">User registered successfully!</p>';
    }
  ?>
</body>
</html>