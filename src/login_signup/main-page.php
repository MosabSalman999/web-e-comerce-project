<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Gamers | E-commerce Website</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" type="text/css" href="mainPageStyle.css"/> 
</head>

<body>
  <div class="header">
    <div class="container">
      <div class="navbar">
        <div class="logo">
          <img src="assets/logo/png/logo-no-background.png" alt="Logo" width="100" />
        </div>
        <nav>
          <ul id="menuItems">
            <li><a href="#">Home</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Account</a></li>
          </ul>
        </nav>
        <i class="fas fa-bars menu-icon" onclick="toggleMenu()"></i>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="hero">
      <div class="col-2">
        <h1>Give Your Setup A Pro Touch!</h1>
        <p>Explore next-gen consoles, accessories, and gear crafted for champions.</p>
      </div>
      <div class="col-2">
        <img src="assets/hero/hero-img.png" alt="hero" />
      </div>
    </div>

    <h2 class="title">Featured Products</h2>
    <div class="row">
      <div class="col-4">
        <img src="assets/products/sample1.png" alt="Product" />
        <h4>Gaming Mouse</h4>
        <div class="rating">
          <img src="assets/icons/star.png" alt="star" />
          <img src="assets/icons/star.png" alt="star" />
          <img src="assets/icons/star.png" alt="star" />
          <img src="assets/icons/star.png" alt="star" />
          <img src="assets/icons/star-white.png" alt="star" />
        </div>
        <p>$45.00</p>
      </div>
    </div>

    <h2 class="title">Testimonials</h2>
    <div class="testimonial">
      <div class="row">
        <div class="col-3">
          <p>Amazing experience and great customer service!</p>
          <div class="rating">
            <img src="assets/icons/star.png" alt="star" />
            <img src="assets/icons/star.png" alt="star" />
            <img src="assets/icons/star.png" alt="star" />
            <img src="assets/icons/star.png" alt="star" />
            <img src="assets/icons/star-white.png" alt="star" />
          </div>
          <img src="assets/users/user1.jpg" alt="user" />
          <h3>Alex J.</h3>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <p>&copy; 2025 Gamers Inc. All rights reserved.</p>
    </div>
  </footer>

  <script>
    function toggleMenu() {
      document.getElementById("menuItems").classList.toggle("active");
    }
  </script>
</body>

</html>