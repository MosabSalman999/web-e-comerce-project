<?php
session_start();
header('Content-Type: text/plain');
header('Content-Disposition: attachment; filename="order_summary.txt"');

$user = $_SESSION['user'] ?? [
    'username' => 'Guest',
    'email' => 'Not provided'
];
$cart = $_SESSION['cart'] ?? [];
$subtotal = 0;
$taxRate = 0.025;
$delivery = 3.00;

echo "Order Summary\n";
echo "=============\n";
echo "Customer: " . htmlspecialchars($user['username']) . "\n";
echo "Email: " . htmlspecialchars($user['email']) . "\n\n";
echo "Items:\n";

foreach ($cart as $item) {
    $itemSubtotal = $item['price'] * $item['quantity'];
    $subtotal += $itemSubtotal;
    echo "- {$item['name']} (x{$item['quantity']}): {$item['price']} JOD each, Subtotal: " . number_format($itemSubtotal, 2) . " JOD\n";
}

$tax = $subtotal * $taxRate;
$total = $subtotal + $tax + $delivery;

echo "\nSubtotal: " . number_format($subtotal, 2) . " JOD\n";
echo "Tax (2.5%): " . number_format($tax, 2) . " JOD\n";
echo "Delivery: " . number_format($delivery, 2) . " JOD\n";
echo "Total: " . number_format($total, 2) . " JOD\n";
echo "\nPayment Method: Cash Only\n";
echo "Thank you for your order!\n";

// Save the same file on the server
$orderDir = __DIR__ . '/orders';
if (!is_dir($orderDir)) {
    mkdir($orderDir, 0777, true);
}
$orderFile = $orderDir . '/order_' . date('Ymd_His') . '_' . session_id() . '.txt';
file_put_contents($orderFile, ob_get_contents());
?>