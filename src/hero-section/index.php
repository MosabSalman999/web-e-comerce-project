<?php include 'db.php';
session_start();
$isLoggedIn = isset($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamers | E-commerce Website </title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
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
                    <a href="#"><img src="assets/logo/png/logo-no-background.png" alt="Logo" class="logo-image" width="100px"></a>
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
                <a href="./cart.php"> <img src="assets/icons/icons8-cart-pulsar-gradient/icons8-cart-96.png" alt="cart" width="30px">
                    <span id="cart-count" class="cart-count"></span>
                </a>
                <img src="assets/icons/hamburger-menu.png" class="menu-icon" onclick="toggleMenu()">
                <?php if ($isLoggedIn) { ?>
                    <div class="user-logo">
                        <a href="../login-signup/login.php"><img src="assets/icons/person.png" /></a>
                        <span>
                            <?php $result = $conn->query("SELECT (username) FROM userinfo");
                            $row = $result->fetch_assoc();
                            echo $row['username']; ?></span>
                    </div>
                <?php } else { ?>
                    <a style="margin-left: 10px; color: greenyellow;" href="../login-signup/login.php">Login / Signup</a>
                <?php  } ?>
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
                    <img src="assets/icons/star.png" alt="" h>
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
                    $result = $conn->query("SELECT * FROM products");
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='col-4'>
                    <img src='{$row['image_path']}'
                        alt='product-1' class='product-image'>
                    <h4>{$row['name']}</h4>
                    <div class='rating'>
                        <img src='assets/icons/star.png' alt=''>
                        <img src='assets/icons/star.png' alt=''>
                        <img src='assets/icons/star.png' alt=''>
                        <img src='assets/icons/star.png' alt=''>
                        <img src='assets/icons/star-white.png' alt=''>
                    </div>
                    <p>\${$row['price']}</p>
                        <button class='details-button' 
                          data-name='{$row['name']}' 
                          data-price='{$row['price']}' 
                          data-image='{$row['image_path']}' 
                          data-description='{$row['description']}'
                          data-id='{$row['id']}'
                          onclick ='openProductModal(this)'>
                           Item Details 
                         </button>
                      </div><hr>";
                    }
                    ?>


                    <div id="productModal" class="modal">
                        <div class="modal-content">
                            <span class="close-modal">&times;</span>
                            <img id="modal-image" src="" alt="Product Image" style="width:100%; max-height:300px; object-fit:contain;">
                            <h2 id="modal-name" style="color: aquamarine; font-size: xx-large; display: flex; text-align: center; justify-content: center;"></h2>

                            <textarea name="description" id="modal-description" rows="3" cols="50" readonly>
                                8 GB of RAM
                                More Info...
                            </textarea>
                            <p id="modal-price" style="font-weight: bold;"></p>
                            <div class="product-info">
                            </div>
                            <div class="product-right">
                                <button class="add-to-cart" onclick="addToCart()" id="add-to-cart-button" data-product-id="<?php echo $row['id']; ?>">Add to Cart</button>
                            </div>
                        </div>
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


    <footer>
        <hr>
        <div class="wrapper">
            <div class="corner"></div>
            <div class="footer-element">
                <h1>Exclusive</h1>
                <h5>Subscribe</h5>
                <p>Get 10% off your first order</p>
                <input type="email" placeholder="Enter your email" name="email">
            </div>
            <div class="footer-element">
                <h1>Support</h1>
                <p>Amman-Quismeh <br> 0786057551</p>
                <span>mosabsalman999@gmail.com</span><br>
                <span>+962786057551</span>
            </div>
            <div class="footer-element">
                <h1>Account</h1>
                <a href="#">My Account</a><br>
                <a href="#">Login/Register</a><br>
                <a href="#">Cart</a><br>
                <a href="#">Wishlist</a><br>
                <a href="#">Shop</a>
            </div>
            <div class="footer-element">
                <h1>Info</h1>
                <a href="#">Privacy Policy</a><br>
                <a href="#">Terms Of Use</a><br>
                <a href="#">FAQ</a><br>
                <a href="#">Contact</a>
            </div>
            <div class="footer-element latest">
                <div>
                    <h2>Download App</h2>
                    <span>Save $3 with App New User Only</span>
                    <div style="display: flex; gap: 10px; margin-top: 10px;">
                        <div>
                            <!-- From Uiverse.io by MeetJF -->
                            <div class="flex flex-col gap-3">
                                <button class="cursor-pointer">
                                    <div
                                        class="flex max-w-48 h-12 px-3 gap-2 rounded-xl items-center justify-center bg-black text-white dark:text-black dark:bg-white sm:h-14">
                                        <svg viewBox="30 336.7 120.9 129.2" class="w-5 sm:w-7">
                                            <path
                                                d="M119.2,421.2c15.3-8.4,27-14.8,28-15.3c3.2-1.7,6.5-6.2,0-9.7  c-2.1-1.1-13.4-7.3-28-15.3l-20.1,20.2L119.2,421.2z"
                                                fill="#FFD400"></path>
                                            <path
                                                d="M99.1,401.1l-64.2,64.7c1.5,0.2,3.2-0.2,5.2-1.3  c4.2-2.3,48.8-26.7,79.1-43.3L99.1,401.1L99.1,401.1z"
                                                fill="#FF3333"></path>
                                            <path
                                                d="M99.1,401.1l20.1-20.2c0,0-74.6-40.7-79.1-43.1  c-1.7-1-3.6-1.3-5.3-1L99.1,401.1z"
                                                fill="#48FF48"></path>
                                            <path
                                                d="M99.1,401.1l-64.3-64.3c-2.6,0.6-4.8,2.9-4.8,7.6  c0,7.5,0,107.5,0,113.8c0,4.3,1.7,7.4,4.9,7.7L99.1,401.1z"
                                                fill="#3BCCFF"></path>
                                        </svg>
                                        <div>
                                            <div class="text-[.5rem] sm:text-xs text-left">GET IT ON</div>
                                            <div class="text-sm font-semibold font-sans -mt-1 sm:text-xl">
                                                Google Play
                                            </div>
                                        </div>
                                    </div>
                                </button>

                                <button class="cursor-pointer">
                                    <div
                                        class="flex max-w-48 h-12 px-3 gap-2 rounded-xl items-center justify-center bg-black text-white dark:text-black dark:bg-white sm:gap-3 sm:h-14">
                                        <svg viewBox="0 0 384 512" class="w-5 sm:w-7">
                                            <path
                                                d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"
                                                fill="currentColor"></path>
                                        </svg>
                                        <div>
                                            <div class="text-[.5rem] sm:text-xs text-left">Download on the</div>
                                            <div class="text-lg font-semibold font-sans -mt-1 sm:text-2xl">
                                                App Store
                                            </div>
                                        </div>
                                    </div>
                                </button>

                                <button class="cursor-pointer">
                                    <div
                                        class="flex max-w-48 h-12 px-3 py-4 gap-2 rounded-xl items-center justify-center bg-black text-white dark:text-black dark:bg-white sm:h-14">
                                        <svg viewBox="0 0 16 16" class="w-5 sm:w-7">
                                            <path
                                                fill="currentColor"
                                                d="m10.213 1.471l.691-1.26q.069-.124-.048-.192q-.128-.057-.195.058l-.7 1.27A4.8 4.8 0 0 0 8.005.941q-1.032 0-1.956.404l-.7-1.27Q5.281-.037 5.154.02q-.117.069-.049.193l.691 1.259a4.25 4.25 0 0 0-1.673 1.476A3.7 3.7 0 0 0 3.5 5.02h9q0-1.125-.623-2.072a4.27 4.27 0 0 0-1.664-1.476ZM6.22 3.303a.37.37 0 0 1-.267.11a.35.35 0 0 1-.263-.11a.37.37 0 0 1-.107-.264a.37.37 0 0 1 .107-.265a.35.35 0 0 1 .263-.11q.155 0 .267.11a.36.36 0 0 1 .112.265a.36.36 0 0 1-.112.264m4.101 0a.35.35 0 0 1-.262.11a.37.37 0 0 1-.268-.11a.36.36 0 0 1-.112-.264q0-.154.112-.265a.37.37 0 0 1 .268-.11q.155 0 .262.11a.37.37 0 0 1 .107.265q0 .153-.107.264M3.5 11.77q0 .441.311.75q.311.306.76.307h.758l.01 2.182q0 .414.292.703a.96.96 0 0 0 .7.288a.97.97 0 0 0 .71-.288a.95.95 0 0 0 .292-.703v-2.182h1.343v2.182q0 .414.292.703a.97.97 0 0 0 .71.288a.97.97 0 0 0 .71-.288a.95.95 0 0 0 .292-.703v-2.182h.76q.436 0 .749-.308q.31-.307.311-.75V5.365h-9zm10.495-6.587a.98.98 0 0 0-.702.278a.9.9 0 0 0-.293.685v4.063q0 .406.293.69a.97.97 0 0 0 .702.284q.42 0 .712-.284a.92.92 0 0 0 .293-.69V6.146a.9.9 0 0 0-.293-.685a1 1 0 0 0-.712-.278m-12.702.283a1 1 0 0 1 .712-.283q.41 0 .702.283a.9.9 0 0 1 .293.68v4.063a.93.93 0 0 1-.288.69a.97.97 0 0 1-.707.284a1 1 0 0 1-.712-.284a.92.92 0 0 1-.293-.69V6.146q0-.396.293-.68"></path>
                                        </svg>
                                        <div>
                                            <div class="text-[.5rem] sm:text-xs text-left">Download</div>
                                            <div class="text-sm font-semibold font-sans -mt-1 sm:text-xl">
                                                Android APK
                                            </div>
                                        </div>
                                    </div>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuIcon = document.querySelector('.menu-icon');
            const menuItems = document.getElementById('menuItems');

            function toggleMenu() {
                menuItems.classList.toggle('active');
                document.body.classList.toggle('no-scroll');
            }

            menuIcon.addEventListener('click', toggleMenu);

            document.addEventListener('click', function(event) {
                if (!menuIcon.contains(event.target) && !menuItems.contains(event.target)) {
                    menuItems.classList.remove('active');
                    document.body.classList.remove('no-scroll');
                }
            });

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
            const cardWidth = 270;
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
            updateArrows();


            let selectedProduct = {}; // Store selected product info


            document.querySelector('.close-modal').onclick = function() {
                document.getElementById('productModal').style.display = 'none';
            };

            window.onclick = function(event) {
                const modal = document.getElementById('productModal');
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            }
        });

        function openProductModal(button) {
            document.getElementById('modal-image').src = button.dataset.image;
            document.getElementById('modal-name').innerText = button.dataset.name;
            document.getElementById('modal-description').value = button.dataset.description;
            document.getElementById('modal-price').innerText = "$" + button.dataset.price;

            selectedProduct = {
                id: button.dataset.id,
                name: button.dataset.name,
                price: button.dataset.price,
                image: button.dataset.image,
                description: button.dataset.description,
                quantity: 1
            };

            document.getElementById('productModal').style.display = 'flex';
        }

        function addToCart() {
            fetch('add-to-cart.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(selectedProduct)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Item added to cart!');
                        document.getElementById('productModal').style.display = 'none';
                    } else {
                        alert('Error: ' + data.message);
                        console.log("errrrrror");

                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while adding to cart.');
                });
        }

        function updateCartCount(count) {
            const cartCountElement = document.getElementById('cart-count');
            if (cartCountElement) {
                cartCountElement.textContent = count;
            } else {
                // Create cart count element if it doesn't exist
                const cartIcon = document.querySelector('a[href="./view-cart.php"]');
                if (cartIcon) {
                    const countElement = document.createElement('span');
                    countElement.id = 'cart-count';
                    countElement.className = 'cart-count';
                    countElement.textContent = count;
                    cartIcon.appendChild(countElement);
                }
            }
        }
    </script>
</body>

</html>