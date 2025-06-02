<?php
session_start();
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$productId = $data['product_id'] ?? 0;

if (!isset($_SESSION['id'])) {
    echo json_encode(['success' => false, 'message' => 'Please login to manage your cart']);
    exit;
}

if (!isset($_SESSION['cart'][$productId])) {
    echo json_encode(['success' => false, 'message' => 'Product not in cart']);
    exit;
}

// Remove the product from cart
unset($_SESSION['cart'][$productId]);

echo json_encode(['success' => true]);
?>
