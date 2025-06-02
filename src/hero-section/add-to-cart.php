<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['id'])) {
    echo json_encode(['success' => false, 'message' => 'Please login to add items to cart']);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['id'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid product data']);
    exit;
}

$productId = $data['id'];

// Initialize cart 
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// If already in cart, just increase quantity
if (isset($_SESSION['cart'][$productId])) {
    $_SESSION['cart'][$productId]['quantity'] += 1;
} else {
    $_SESSION['cart'][$productId] = [
        'id' => $data['id'],
        'name' => $data['name'],
        'price' => $data['price'],
        'image' => $data['image'],
        'description' => $data['description'],
        'quantity' => 1
    ];
}

echo json_encode(['success' => true]);
