<?php include 'db.php'; session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cart</title>
</head>
<body>
    <h1>Your Cart</h1>
    <a href="index.php">Back to Shop</a>
    <?php
    if (!isset($_SESSION['cart']) || count($_SESSION['cart']) === 0) {
        echo "<p>Your cart is empty.</p>";
    } else {
        $ids = implode(",", $_SESSION['cart']);
        $result = $conn->query("SELECT * FROM products WHERE id IN ($ids)");
        while ($row = $result->fetch_assoc()) {
            echo "<p>{$row['name']} - \${$row['price']}</p>";
        }
    }
    ?>
</body>
</html>
