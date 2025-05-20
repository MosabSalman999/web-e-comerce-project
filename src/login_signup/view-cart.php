<?php
include 'db.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Your Cart</title>
    <style>
        body {
            background-color: #000;
            color: #0dd511;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 40px;
        }

        h1 {
            margin-bottom: 20px;
        }

        .cart-item {
            background-color: #111;
            padding: 15px;
            border: 1px solid #0dd511;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .cart-item p {
            margin: 5px 0;
        }

        a {
            color: #0dd511;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .empty {
            color: #aaa;
        }
    </style>
</head>
<body>

    <h1>Your Cart</h1>
    <a href="index.php">⬅ Back to Shop</a>
    <br><br>

    <?php
    if (!isset($_SESSION['cart']) || count($_SESSION['cart']) === 0) {
        echo "<p class='empty'>Your cart is empty.</p>";
    } else {
        $ids = implode(",", array_map('intval', $_SESSION['cart']));
        $result = $conn->query("SELECT * FROM products WHERE id IN ($ids)");
        while ($row = $result->fetch_assoc()) {
            echo "<div class='cart-item'>";
            echo "<p><strong>{$row['name']}</strong></p>";
            echo "<p>Price: \${$row['price']}</p>";
            echo "</div>";
        }
    }
    ?>

</body>
</html>