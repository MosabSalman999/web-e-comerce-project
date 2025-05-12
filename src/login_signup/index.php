<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db.php';
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamers | E-commerce Website </title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@300..900&family=Liter&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/fontawesome.min.css"
        integrity="sha384-NvKbDTEnL+A8F/AA5Tc5kmMLSJHUO868P+lDtTpJIeQdGYaUIuLr4lVGOEA1OcMy" crossorigin="anonymous">
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="assets/logo/png/logo-no-background.png" alt="Logo" class="logo-image" width="100px">
                </div>
                <nav>
                    <ul id="menuItems">
                        <li><a href="">Home</a></li>
                        <li><a href="">Product</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Contact</a></li>
                        <li><a href="">Account</a></li>
                    </ul>
                </nav>
                <img src="assets/icons/icons8-cart-pulsar-gradient/icons8-cart-96.png" alt="cart" width="30px">
                <img src="assets/icons/hamburger-menu.png" class="menu-icon" onclick="toggleMenu()">
            </div>
            <div class="row">
                <div class="col-2">
                    <h1>Give Your Workout <br> A New Style!</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus dolore quos, cupiditate
                        aspernatur
                        minus maiores nemo, quibusdam dicta quas quia voluptates veniam atque error? Illo aut veniam
                        similique voluptates amet.</p>
                    <a href="" class="btn">Explore Now &#10132;</a>
                </div>
                <div class="col-2">
                    <img src="assets/hero/pol-SOL-107681-MultiVendorCampaign-BuyingGuide_DER-4c0bc3b6-01e4-4978-ae8e-38e8548d02a3-removebg-preview.png"
                        alt="hero" width="500px">

                </div>

            </div>
        </div>
    </div>

    <br><br><br>
    <!------ featured categories ------>
    <div class="categories">
        <div class="small-container">
            <div class="row">
                <div class="col-3"><img src="assets/products/PS5SlimDiscProGamer.webp" alt=""></div>
                <div class="col-3"><img src="assets/products/PS5SlimDiscProGamer.webp" alt=""></div>
                <div class="col-3"><img src="assets/products/PS5SlimDiscProGamer.webp" alt=""></div>
            </div>
        </div>
    </div>
    <!------ featured product ------>
    <div class="small-container">

        <h2 class="title">Featured Products</h2>
        <div class="row">
            <div class="col-4">
                <img src="assets/products/computer-mouse-optical-mouse-sensor-mousepad-microsoft-surface-logitech-gaming-mouse-cbc30d26fda1d23a72d0ecc400758ad4.png"
                    alt="product-1" width="200px">
                <h4>PS5</h4>
                <div class="rating">
                    <img src="assets/icons/star.png" alt="">
                    <img src="assets/icons/star.png" alt="">
                    <img src="assets/icons/star.png" alt="">
                    <img src="assets/icons/star.png" alt="">
                    <img src="assets/icons/star-white.png" alt="">
                </div>
                <p>$250.00</p>
            </div>
            <div class="col-4">
                <img src="assets/products/computer-mouse-optical-mouse-sensor-mousepad-microsoft-surface-logitech-gaming-mouse-cbc30d26fda1d23a72d0ecc400758ad4.png"
                    alt="product-1" width="200px">
                <h4>PS5</h4>
                <div class="rating">
                    <img src="assets/icons/star.png" alt="">
                    <img src="assets/icons/star.png" alt="">
                    <img src="assets/icons/star.png" alt="">
                    <img src="assets/icons/star.png" alt="">
                    <img src="assets/icons/star-white.png" alt="">
                </div>
                <p>$250.00</p>
            </div>
            <div class="col-4">
                <img src="assets/products/computer-mouse-optical-mouse-sensor-mousepad-microsoft-surface-logitech-gaming-mouse-cbc30d26fda1d23a72d0ecc400758ad4.png"
                    alt="product-1" width="200px">
                <h4>PS5</h4>
                <div class="rating">
                    <img src="assets/icons/star.png" alt="">
                    <img src="assets/icons/star.png" alt="">
                    <img src="assets/icons/star.png" alt="">
                    <img src="assets/icons/star.png" alt="">
                    <img src="assets/icons/star-white.png" alt="">
                </div>
                <p>$250.00</p>
            </div>
            <div class="col-4">
                <img src="assets/products/computer-mouse-optical-mouse-sensor-mousepad-microsoft-surface-logitech-gaming-mouse-cbc30d26fda1d23a72d0ecc400758ad4.png"
                    alt="product-1" width="200px">
                <h4>PS5</h4>
                <div class="rating">
                    <img src="assets/icons/star.png" alt="">
                    <img src="assets/icons/star.png" alt="">
                    <img src="assets/icons/star.png" alt="">
                    <img src="assets/icons/star.png" alt="">
                    <img src="assets/icons/star-white.png" alt="">
                </div>
                <p>$250.00</p>
            </div>
        </div>
        <h2 class="title">Latest Products</h2>
        <div class="product-carousel-container">
        <button class="carousel-arrow prev-arrow">❮</button>
        <button class="carousel-arrow next-arrow">❯</button>
            <div class="row">
                <div class="product-carousel">
                <?php
                    if (isset($conn)) {
                        $result = $conn->query("SELECT * FROM products");
                        if ($result) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<div class='col-4'>
                            <img src='{$row['image_path']}'
                                alt='product-1' width='200px'>
                            <h4>{$row['name']}</h4>
                            <div class='rating'>
                                <img src='assets/icons/star.png' alt=''>
                                <img src='assets/icons/star.png' alt=''>
                                <img src='assets/icons/star.png' alt=''>
                                <img src='assets/icons/star.png' alt=''>
                                <img src='assets/icons/star-white.png' alt=''>
                            </div>
                            <p>\${$row['price']}</p>
                                <form method='POST' action='add_to_cart.php'>
                                    <input type='hidden' name='product_id' value='{$row['id']}'>
                                    <button type='submit'>Add to Cart</button>
                                </form>
                            </div><hr>";
                            }
                        } else {
                            echo "<p style='color:red;'>Error fetching products: " . $conn->error . "</p>";
                        }
                    } else {
                        echo "<p style='color:red;'>Database connection not available.</p>";
                    }
                    ?>

                    <div class="col-4">
                        <img src="assets/products/computer-mouse-optical-mouse-sensor-mousepad-microsoft-surface-logitech-gaming-mouse-cbc30d26fda1d23a72d0ecc400758ad4.png"
                            alt="product-1" width="200px">
                        <h4>PS5</h4>
                        <div class="rating">
                            <img src="assets/icons/star.png" alt="">
                            <img src="assets/icons/star.png" alt="">
                            <img src="assets/icons/star.png" alt="">
                            <img src="assets/icons/star.png" alt="">
                            <img src="assets/icons/star-white.png" alt="">
                        </div>
                        <p>$250.00</p>
                    </div>
                    <div class="col-4">
                        <img src="assets/products/computer-mouse-optical-mouse-sensor-mousepad-microsoft-surface-logitech-gaming-mouse-cbc30d26fda1d23a72d0ecc400758ad4.png"
                            alt="product-1" width="200px">
                        <h4>PS5</h4>
                        <div class="rating">
                            <img src="assets/icons/star.png" alt="">
                            <img src="assets/icons/star.png" alt="">
                            <img src="assets/icons/star.png" alt="">
                            <img src="assets/icons/star.png" alt="">
                            <img src="assets/icons/star-white.png" alt="">
                        </div>
                        <p>$250.00</p>
                    </div>
                    <div class="col-4">
                        <img src="assets/products/computer-mouse-optical-mouse-sensor-mousepad-microsoft-surface-logitech-gaming-mouse-cbc30d26fda1d23a72d0ecc400758ad4.png"
                            alt="product-1" width="200px">
                        <h4>PS5</h4>
                        <div class="rating">
                            <img src="assets/icons/star.png" alt="">
                            <img src="assets/icons/star.png" alt="">
                            <img src="assets/icons/star.png" alt="">
                            <img src="assets/icons/star.png" alt="">
                            <img src="assets/icons/star-white.png" alt="">
                        </div>
                        <p>$250.00</p>
                    </div>
                    <div class="col-4">
                        <img src="assets/products/computer-mouse-optical-mouse-sensor-mousepad-microsoft-surface-logitech-gaming-mouse-cbc30d26fda1d23a72d0ecc400758ad4.png"
                            alt="product-1" width="200px">
                        <h4>PS5</h4>
                        <div class="rating">
                            <img src="assets/icons/star.png" alt="">
                            <img src="assets/icons/star.png" alt="">
                            <img src="assets/icons/star.png" alt="">
                            <img src="assets/icons/star.png" alt="">
                            <img src="assets/icons/star-white.png" alt="">
                        </div>
                        <p>$250.00</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="product-carousel-container">
        <button class="carousel-arrow prev-arrow">❮</button>
        <button class="carousel-arrow next-arrow">❯</button>
            <div class="row">
                <div class="product-carousel">

                    <div class="col-4">
                        <img src="assets/products/computer-mouse-optical-mouse-sensor-mousepad-microsoft-surface-logitech-gaming-mouse-cbc30d26fda1d23a72d0ecc400758ad4.png"
                            alt="product-1" width="200px">
                        <h4>PS5</h4>
                        <div class="rating">
                            <img src="assets/icons/star.png" alt="">
                            <img src="assets/icons/star.png" alt="">
                            <img src="assets/icons/star.png" alt="">
                            <img src="assets/icons/star.png" alt="">
                            <img src="assets/icons/star-white.png" alt="">
                        </div>
                        <p>$250.00</p>
                    </div>
                    <div class="col-4">
                        <img src="assets/products/computer-mouse-optical-mouse-sensor-mousepad-microsoft-surface-logitech-gaming-mouse-cbc30d26fda1d23a72d0ecc400758ad4.png"
                            alt="product-1" width="200px">
                        <h4>PS5</h4>
                        <div class="rating">
                            <img src="assets/icons/star.png" alt="">
                            <img src="assets/icons/star.png" alt="">
                            <img src="assets/icons/star.png" alt="">
                            <img src="assets/icons/star.png" alt="">
                            <img src="assets/icons/star-white.png" alt="">
                        </div>
                        <p>$250.00</p>
                    </div>
                    <div class="col-4">
                        <img src="assets/products/computer-mouse-optical-mouse-sensor-mousepad-microsoft-surface-logitech-gaming-mouse-cbc30d26fda1d23a72d0ecc400758ad4.png"
                            alt="product-1" width="200px">
                        <h4>PS5</h4>
                        <div class="rating">
                            <img src="assets/icons/star.png" alt="">
                            <img src="assets/icons/star.png" alt="">
                            <img src="assets/icons/star.png" alt="">
                            <img src="assets/icons/star.png" alt="">
                            <img src="assets/icons/star-white.png" alt="">
                        </div>
                        <p>$250.00</p>
                    </div>
                    <div class="col-4">
                        <img src="assets/products/computer-mouse-optical-mouse-sensor-mousepad-microsoft-surface-logitech-gaming-mouse-cbc30d26fda1d23a72d0ecc400758ad4.png"
                            alt="product-1" width="200px">
                        <h4>PS5</h4>
                        <div class="rating">
                            <img src="assets/icons/star.png" alt="">
                            <img src="assets/icons/star.png" alt="">
                            <img src="assets/icons/star.png" alt="">
                            <img src="assets/icons/star.png" alt="">
                            <img src="assets/icons/star-white.png" alt="">
                        </div>
                        <p>$250.00</p>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!------- offer ------>
    <div class="offer">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <img src="assets/products/iphone-16-blue-roundup-header.png" class="offer-img">
                </div>
                <div class="col-2">
                    <p>Exclusively Available on RedStore</p>
                    <h1>IPhone 16</h1>
                    <small>
                        <span>📱</span>
                        <p> Design & Display
                            Sizes: 6.1-inch (iPhone 16) and 6.7-inch (iPhone 16 Plus) Super Retina XDR OLED displays.
                            Resolution: 2556×1179 pixels (iPhone 16) and 2796×1290 pixels (iPhone 16 Plus).
                            Brightness: Up to 2000 nits peak outdoor brightness.
                            Refresh Rate: 60Hz.
                            Build: Aluminum frame with color-infused glass back.
                            Colors: Ultramarine, Teal, Pink, White, and Black.
                            Water & Dust Resistance: IP68 rating (up to 6 meters for 30 minutes) .​
                            Wikipedia
                            +1
                            Apple
                            +1</p>
                    </small>
                    <a href="" class="btn">Buy Now &#10132;</a>
                </div>
            </div>
        </div>
    </div>

    <!------testimonial-->
    <div class="testimonial">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <span style="font-size: 120px;">"</span>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut magni ullam vitae minus? Voluptas
                        eum qui dolore veniam asperiores. Enim minus fugiat dolores provident cum facilis quae aliquam
                        alias iste!</p>
                    <div class="rating">
                        <img src="assets/icons/star.png" alt="">
                        <img src="assets/icons/star.png" alt="">
                        <img src="assets/icons/star.png" alt="">
                        <img src="assets/icons/star.png" alt="">
                        <img src="assets/icons/star-white.png" alt="">
                    </div>
                    <img src="assets/products/people-headshot-nick-maslow-f21ef38676504bc89a091ec9a5c95e4b.jpg" style="    width: 70px;
                    margin-top: 20px;
                    border-radius: 50%;">
                    <h3>Sean Parker</h3>
                </div>
                <div class="col-3">
                    <span style="font-size: 120px;">"</span>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut magni ullam vitae minus? Voluptas
                        eum qui dolore veniam asperiores. Enim minus fugiat dolores provident cum facilis quae aliquam
                        alias iste!</p>
                    <div class="rating">
                        <img src="assets/icons/star.png" alt="">
                        <img src="assets/icons/star.png" alt="">
                        <img src="assets/icons/star.png" alt="">
                        <img src="assets/icons/star.png" alt="">
                        <img src="assets/icons/star-white.png" alt="">
                    </div>
                    <img src="assets/products/pexels-photo-415829.jpeg" style="    width:70px;
                    margin-top: 20px;
                    border-radius: 50%;">
                    <h3>Sean Parker</h3>
                </div>
                <div class="col-3">
                    <span style="font-size: 120px;">"</span>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut magni ullam vitae minus? Voluptas
                        eum qui dolore veniam asperiores. Enim minus fugiat dolores provident cum facilis quae aliquam
                        alias iste!</p>
                    <div class="rating">
                        <img src="assets/icons/star.png" alt="">
                        <img src="assets/icons/star.png" alt="">
                        <img src="assets/icons/star.png" alt="">
                        <img src="assets/icons/star.png" alt="">
                        <img src="assets/icons/star-white.png" alt="">
                    </div>
                    <img src="assets/products/temp-people-profile.jpg" style="    width: 70px;
                        margin-top: 20px;
                        border-radius: 50%;">
                    <h3>Dame Mole</h3>
                </div>
            </div>
        </div>
    </div>


    <!-- JavaScript for toggle menu -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuIcon = document.querySelector('.menu-icon');
            const menuItems = document.getElementById('menuItems');

            function toggleMenu() {
                menuItems.classList.toggle('active');
                document.body.classList.toggle('no-scroll');
            }

            menuIcon.addEventListener('click', toggleMenu);

            // Close menu when clicking outside
            document.addEventListener('click', function(event) {
                if (!menuIcon.contains(event.target) && !menuItems.contains(event.target)) {
                    menuItems.classList.remove('active');
                    document.body.classList.remove('no-scroll');
                }
            });

            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth > 800) {
                    menuItems.classList.remove('active');
                    document.body.classList.remove('no-scroll');
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            const carousel = document.querySelector('.product-carousel');
            const prevArrow = document.querySelector('.prev-arrow');
            const nextArrow = document.querySelector('.next-arrow');
            const cardWidth = 270; // Width of card + gap

            // Arrow navigation
            nextArrow.addEventListener('click', function() {
                carousel.scrollBy({
                    left: cardWidth * 3,
                    behavior: 'smooth'
                });
            });

            prevArrow.addEventListener('click', function() {
                carousel.scrollBy({
                    left: -cardWidth * 3,
                    behavior: 'smooth'
                });
            });

            // Hide/show arrows based on scroll position
            function updateArrows() {
                const isAtStart = carousel.scrollLeft < 10;
                const isAtEnd = carousel.scrollLeft >= carousel.scrollWidth - carousel.clientWidth - 10;

                prevArrow.style.opacity = isAtStart ? '0.5' : '1';
                prevArrow.style.pointerEvents = isAtStart ? 'none' : 'auto';

                nextArrow.style.opacity = isAtEnd ? '0.5' : '1';
                nextArrow.style.pointerEvents = isAtEnd ? 'none' : 'auto';
            }

            carousel.addEventListener('scroll', updateArrows);
            window.addEventListener('resize', updateArrows);

            // Initialize arrow states
            updateArrows();
        });
    </script>
</body>

</html>