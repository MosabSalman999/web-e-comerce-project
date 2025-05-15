<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart | Gamers E-commerce</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <style>
        :root {
            --primary: #10B981;
            --primary-dark: #059669;
            --primary-light: #D1FAE5;
            --dark-bg: #111827;
            --dark-secondary: #1F2937;
            --dark-text: #F3F4F6;
            --dark-text-secondary: #9CA3AF;
        }
        
        body {
            background-color: var(--dark-bg);
            color: var(--dark-text);
        }
        
        .dark-card {
            background-color: var(--dark-secondary);
            border-color: #374151;
        }
        
        .quantity-btn {
            transition: all 0.2s ease;
        }
        
        .quantity-btn:hover {
            background-color: var(--primary-dark);
            color: white;
        }
        
        .remove-item {
            transition: color 0.2s ease;
        }
        
        .remove-item:hover {
            color: #EF4444;
        }
        
        #checkout-btn {
            background-color: var(--primary);
            transition: all 0.2s ease;
        }
        
        #checkout-btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        
        input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.2);
        }
        
        .promo-btn {
            background-color: #374151;
            transition: all 0.2s ease;
        }
        
        .promo-btn:hover {
            background-color: #4B5563;
        }
        
        .border-dark {
            border-color: #374151;
        }
    </style>
</head>
<body>
    <!-- Header (same as your other pages but with dark mode) -->
    <?php include 'db.php'; ?>
    
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 text-green-400">Your Shopping Cart</h1>
        
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Cart Items Section -->
            <div class="lg:w-2/3">
                <div class="dark-card rounded-lg shadow-lg overflow-hidden border border-dark">
                    <!-- Cart Header -->
                    <div class="hidden md:grid grid-cols-12 bg-gray-800 p-4 font-semibold text-green-300 border-b border-dark">
                        <div class="col-span-5">Product</div>
                        <div class="col-span-2 text-center">Price</div>
                        <div class="col-span-3 text-center">Quantity</div>
                        <div class="col-span-2 text-center">Subtotal</div>
                    </div>
                    
                    <!-- Cart Items -->
                    <?php
                    $total = 0;
                    if (isset($_SESSION['user_id'])) {
                        $userId = $_SESSION['user_id'];
                        $cartQuery = "SELECT p.id, p.name, p.image_path, p.price, ci.quantity 
                                    FROM cart_items ci
                                    JOIN products p ON ci.product_id = p.id
                                    JOIN cart c ON ci.cart_id = c.id
                                    WHERE c.user_id = $userId";
                        $result = $conn->query($cartQuery);
                        
                        if ($result->num_rows > 0) {
                            while ($item = $result->fetch_assoc()) {
                                $subtotal = $item['price'] * $item['quantity'];
                                $total += $subtotal;
                    ?>
                    <div class="grid grid-cols-12 items-center p-4 border-b border-dark hover:bg-gray-800 transition-colors duration-200">
                        <!-- Product Info -->
                        <div class="col-span-12 md:col-span-5 flex items-center space-x-4">
                            <img src="<?php echo $item['image_path']; ?>" alt="<?php echo $item['name']; ?>" 
                                 class="w-20 h-20 object-contain bg-gray-700 p-2 rounded-lg">
                            <div>
                                <h3 class="font-medium"><?php echo $item['name']; ?></h3>
                                <button class="text-red-400 text-sm mt-1 remove-item hover:text-red-500" 
                                        data-product-id="<?php echo $item['id']; ?>">
                                    Remove
                                </button>
                            </div>
                        </div>
                        
                        <!-- Price -->
                        <div class="col-span-4 md:col-span-2 text-center mt-4 md:mt-0">
                            <span class="md:hidden font-semibold text-green-300">Price: </span>
                            <span class="text-green-400">$<?php echo number_format($item['price'], 2); ?></span>
                        </div>
                        
                        <!-- Quantity -->
                        <div class="col-span-4 md:col-span-3 text-center mt-4 md:mt-0">
                            <div class="flex items-center justify-center space-x-2">
                                <button class="quantity-btn minus bg-gray-700 text-gray-200 px-3 py-1 rounded" 
                                        data-product-id="<?php echo $item['id']; ?>">-</button>
                                <span class="quantity px-3"><?php echo $item['quantity']; ?></span>
                                <button class="quantity-btn plus bg-gray-700 text-gray-200 px-3 py-1 rounded" 
                                        data-product-id="<?php echo $item['id']; ?>">+</button>
                            </div>
                        </div>
                        
                        <!-- Subtotal -->
                        <div class="col-span-4 md:col-span-2 text-center mt-4 md:mt-0">
                            <span class="md:hidden font-semibold text-green-300">Subtotal: </span>
                            <span class="text-green-400">$<?php echo number_format($subtotal, 2); ?></span>
                        </div>
                    </div>
                    <?php 
                            }
                        } else {
                            echo '<div class="p-8 text-center text-gray-400">Your cart is empty</div>';
                        }
                    } else {
                        echo '<div class="p-8 text-center text-gray-400">Please login to view your cart</div>';
                    }
                    ?>
                </div>
                
                <!-- Continue Shopping Button -->
                <div class="mt-4">
                    <a href="products.php" class="text-green-400 hover:text-green-300 flex items-center transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        Continue Shopping
                    </a>
                </div>
            </div>
            
            <!-- Order Summary Section -->
            <div class="lg:w-1/3">
                <div class="dark-card rounded-lg shadow-lg p-6 border border-dark">
                    <h2 class="text-xl font-bold mb-4 text-green-300">Order Summary</h2>
                    
                    <div class="space-y-4">
                        <div class="flex justify-between">
                            <span class="text-gray-300">Subtotal</span>
                            <span class="text-green-400">$<?php echo number_format($total, 2); ?></span>
                        </div>
                        
                        <div class="flex justify-between">
                            <span class="text-gray-300">Shipping</span>
                            <span class="text-green-400">Free</span>
                        </div>
                        
                        <div class="flex justify-between">
                            <span class="text-gray-300">Tax</span>
                            <span class="text-green-400">$<?php echo number_format($total * 0.1, 2); ?></span>
                        </div>
                        
                        <div class="border-t border-dark pt-4 mt-4">
                            <div class="flex justify-between font-bold text-lg">
                                <span class="text-gray-100">Total</span>
                                <span class="text-green-300">$<?php echo number_format($total * 1.1, 2); ?></span>
                            </div>
                        </div>
                        
                        <button id="checkout-btn" class="w-full text-white py-3 rounded-lg font-medium mt-6">
                            Proceed to Checkout
                        </button>
                        
                        <div class="text-center text-sm text-gray-400 mt-2">
                            or <a href="#" class="text-green-400 hover:text-green-300">Pay with PayPal</a>
                        </div>
                    </div>
                </div>
                
                <!-- Promo Code -->
                <div class="dark-card rounded-lg shadow-lg p-6 mt-4 border border-dark">
                    <h3 class="font-medium mb-2 text-green-300">Promo Code</h3>
                    <div class="flex">
                        <input type="text" placeholder="Enter promo code" 
                               class="flex-1 bg-gray-700 border border-dark text-gray-200 rounded-l-lg px-4 py-2 focus:border-green-400">
                        <button class="promo-btn text-gray-200 px-4 py-2 rounded-r-lg">Apply</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer (same as your other pages but with dark mode) -->
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Quantity buttons
        document.querySelectorAll('.quantity-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const productId = this.dataset.productId;
                const isPlus = this.classList.contains('plus');
                const quantityElement = this.parentElement.querySelector('.quantity');
                let quantity = parseInt(quantityElement.textContent);
                
                if (isPlus) {
                    quantity++;
                } else {
                    if (quantity > 1) quantity--;
                }
                
                // Update via AJAX
                updateCartItem(productId, quantity, quantityElement);
            });
        });
        
        // Remove item buttons
        document.querySelectorAll('.remove-item').forEach(btn => {
            btn.addEventListener('click', function() {
                const productId = this.dataset.productId;
                const cartItem = this.closest('.grid');
                
                if (confirm('Are you sure you want to remove this item?')) {
                    // Remove via AJAX
                    fetch('remove_from_cart.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ product_id: productId })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            cartItem.style.opacity = '0';
                            setTimeout(() => {
                                cartItem.remove();
                                location.reload(); // Refresh to update totals
                            }, 300);
                        } else {
                            alert('Error: ' + data.message);
                        }
                    });
                }
            });
        });
        
        // Checkout button
        document.getElementById('checkout-btn').addEventListener('click', function() {
            <?php if (isset($_SESSION['user_id'])): ?>
                window.location.href = 'checkout.php';
            <?php else: ?>
                window.location.href = 'login.php?redirect=cart.php';
            <?php endif; ?>
        });
        
        // Function to update cart item quantity
        function updateCartItem(productId, quantity, quantityElement) {
            fetch('update_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ 
                    product_id: productId, 
                    quantity: quantity 
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Animate quantity change
                    quantityElement.style.transform = 'scale(1.2)';
                    setTimeout(() => {
                        quantityElement.textContent = quantity;
                        quantityElement.style.transform = 'scale(1)';
                        location.reload(); // Refresh to update totals
                    }, 200);
                } else {
                    alert('Error: ' + data.message);
                }
            });
        }
    });
    </script>
</body>
</html>