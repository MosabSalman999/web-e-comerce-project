<?php
include 'db.php';
session_start();

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$productId = $data['product_id'] ?? 0;
$quantity = $data['quantity'] ?? 1;

if (!isset($_SESSION['cart'][$productId])) {
    echo json_encode(['success' => false, 'message' => 'Product not in cart']);
    exit;
}

if ($quantity < 1) {
    unset($_SESSION['cart'][$productId]);
} else {
    $_SESSION['cart'][$productId]['quantity'] = $quantity;
}

echo json_encode(['success' => true]);
?>