<?php

$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "gamers.jo";

$conn = new mysqli($servername, $username, $password, $dbname);
$result = $conn->query("SELECT * FROM products");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}






// ________________________________ cart________________________


function getOrCreateCart($userId, $conn)
{
    // Check if user has a cart
    $cartQuery = "SELECT id FROM cart WHERE user_id = ?";
    $stmt = $conn->prepare($cartQuery);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $cart = $result->fetch_assoc();
        return $cart['id'];
    } else {
        // Create new cart
        $insertQuery = "INSERT INTO cart (user_id) VALUES (?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        return $stmt->insert_id;
    }
}

// Function to add item to cart
function addToCart($cartId, $productId, $quantity, $conn)
{
    // Check if item already exists in cart
    $checkQuery = "SELECT id, quantity FROM cart_items WHERE cart_id = ? AND product_id = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("ii", $cartId, $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update existing item
        $item = $result->fetch_assoc();
        $newQuantity = $item['quantity'] + $quantity;
        $updateQuery = "UPDATE cart_items SET quantity = ? WHERE id = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("ii", $newQuantity, $item['id']);
        return $stmt->execute();
    } else {
        // Add new item
        $insertQuery = "INSERT INTO cart_items (cart_id, product_id, quantity) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("iii", $cartId, $productId, $quantity);
        return $stmt->execute();
    }
}
