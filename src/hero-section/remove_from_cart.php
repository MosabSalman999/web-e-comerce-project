<?php
include 'db.php';
session_start();

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Please login to update cart']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);
$productId = $data['product_id'] ?? 0;

// Validate input
if ($productId <= 0) {
    echo json_encode(['success' => false, 'message' => 'Invalid product']);
    exit;
}

// Get user's cart
$cartQuery = "SELECT id FROM cart WHERE user_id = ?";
$stmt = $conn->prepare($cartQuery);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode(['success' => false, 'message' => 'Cart not found']);
    exit;
}

$cart = $result->fetch_assoc();
$cartId = $cart['id'];

// Remove item from cart
$deleteQuery = "DELETE FROM cart_items WHERE cart_id = ? AND product_id = ?";
$stmt = $conn->prepare($deleteQuery);
$stmt->bind_param("ii", $cartId, $productId);

if ($stmt->execute()) {
    // Get updated cart count
    $countQuery = "SELECT SUM(quantity) as total FROM cart_items WHERE cart_id = ?";
    $stmt = $conn->prepare($countQuery);
    $stmt->bind_param("i", $cartId);
    $stmt->execute();
    $result = $stmt->get_result();
    $total = $result->fetch_assoc()['total'] ?? 0;
    
    echo json_encode(['success' => true, 'cart_count' => $total]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to remove item from cart']);
}
?>