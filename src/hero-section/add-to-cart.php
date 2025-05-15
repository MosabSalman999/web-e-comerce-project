<?php
include 'db.php';
session_start();

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Please login to add items to cart']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);
$productId = $data['product_id'] ?? 0;
$quantity = $data['quantity'] ?? 1;

// Validate input
if ($productId <= 0 || $quantity <= 0) {
    echo json_encode(['success' => false, 'message' => 'Invalid product or quantity']);
    exit;
}

// Get or create cart for user
$cartId = getOrCreateCart($_SESSION['user_id'], $conn);

// Add item to cart
if (addToCart($cartId, $productId, $quantity, $conn)) {
    // Get updated cart count
    $countQuery = "SELECT SUM(quantity) as total FROM cart_items WHERE cart_id = ?";
    $stmt = $conn->prepare($countQuery);
    $stmt->bind_param("i", $cartId);
    $stmt->execute();
    $result = $stmt->get_result();
    $total = $result->fetch_assoc()['total'] ?? 0;
    
    echo json_encode(['success' => true, 'cart_count' => $total]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to add item to cart']);
}
?>