<?php
session_start();
$cart = $_SESSION['cart'] ?? [];
$subtotal = 0;
$taxRate = 0.10;
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Your Cart | Gamers E-commerce</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" />
  <link rel="stylesheet" href="style1.css">
</head>

<body>
  <div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8 text-green-400">Your Shopping Cart</h1>

    <div class="flex flex-col lg:flex-row gap-8">
      <!-- Cart Items Section -->
      <div class="lg:w-2/3">
        <div class="dark-card rounded-lg shadow-lg overflow-hidden border border-dark">
          <div class="hidden md:grid grid-cols-12 bg-gray-800 p-4 font-semibold text-green-300 border-b border-dark">
            <div class="col-span-5">Product</div>
            <div class="col-span-2 text-center">Price</div>
            <div class="col-span-3 text-center">Quantity</div>
            <div class="col-span-2 text-center">Subtotal</div>
          </div>

          <?php if (empty($cart)): ?>
            <div class="p-8 text-center text-gray-400">Your cart is empty.</div>
          <?php else: ?>
            <?php foreach ($cart as $item):
              $itemSubtotal = $item['price'] * $item['quantity'];
              $subtotal += $itemSubtotal;
            ?>              <div class="grid grid-cols-12 items-center text-gray-300 border-b border-dark px-4 py-4">
                <div class="col-span-5 flex items-center gap-4">
                  <img src="<?= htmlspecialchars($item['image']) ?>" class="w-16 h-16 rounded object-cover" alt="<?= htmlspecialchars($item['name']) ?>">
                  <span class="font-medium"><?= htmlspecialchars($item['name']) ?></span>
                </div>
                <div class="col-span-2 text-center text-green-400">$<?= number_format($item['price'], 2) ?></div>
                <div class="col-span-3 flex justify-center items-center gap-2">
                  <button class="quantity-btn px-2 py-1 bg-gray-700 rounded plus" data-product-id="<?= $item['id'] ?>">+</button>
                  <span class="quantity"><?= $item['quantity'] ?></span>
                  <button class="quantity-btn px-2 py-1 bg-gray-700 rounded minus" data-product-id="<?= $item['id'] ?>">−</button>
                </div>
                <div class="col-span-1 text-center text-green-300">$<?= number_format($itemSubtotal, 2) ?></div>
                <div class="col-span-1 text-center">
                  <button class="remove-item text-red-400 hover:text-red-500" data-product-id="<?= $item['id'] ?>" title="Remove item">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                  </button>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>

        <div class="mt-4">
          <a href="index.php"
            class="text-green-400 hover:text-green-300 flex items-center transition-colors duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd"
                d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                clip-rule="evenodd" />
            </svg>
            Continue Shopping
          </a>
        </div>
      </div>

      <!-- Order Summary Section -->
      <div class="lg:w-1/3">
        <div class="dark-card rounded-lg shadow-lg p-6 border border-dark">
          <h2 class="text-xl font-bold mb-4 text-green-300">Order Summary</h2>

          <?php
          $taxRate = 0.025; // 2.5%
          $delivery = 3.00; // 3 JOD
          $tax = $subtotal * $taxRate;
          $total = $subtotal + $tax + $delivery;
          ?>

          <div class="space-y-4">
            <div class="flex justify-between">
              <span class="text-gray-300">Subtotal</span>
              <span class="text-green-400"><?= number_format($subtotal, 2) ?> JOD</span>
            </div>
            <div class="flex justify-between">
              <span class="text-gray-300">Tax (2.5%)</span>
              <span class="text-green-400"><?= number_format($tax, 2) ?> JOD</span>
            </div>
            <div class="flex justify-between">
              <span class="text-gray-300">Delivery</span>
              <span class="text-green-400"><?= number_format($delivery, 2) ?> JOD</span>
            </div>
            <div class="border-t border-dark pt-4 mt-4">
              <div class="flex justify-between font-bold text-lg">
                <span class="text-gray-100">Total</span>
                <span class="text-green-300"><?= number_format($total, 2) ?> JOD</span>
              </div>
            </div>
            <div class="mt-4 text-center text-green-400 font-semibold">
              Payment Method: <span style="color:#fff;">Cash Only</span>
            </div>
          </div>
          <button id="checkout-btn" class="w-full text-white py-3 rounded-lg font-medium mt-6">
            Checkout
          </button>

          <!-- Promo Code -->
          <div class="dark-card rounded-lg shadow-lg p-6 mt-4 border border-dark">
            <h3 class="font-medium mb-2 text-green-300">Promo Code</h3>
            <div class="flex">
              <input type="text" placeholder="Enter promo code"
                class="flex-1 bg-gray-700 border border-dark text-gray-200 rounded-l-lg px-4 py-2 focus:border-green-400" />
              <button class="promo-btn text-gray-200 px-4 py-2 rounded-r-lg">Apply</button>
            </div>
          </div>
        </div>
      </div>
    </div>    <script>
      document.addEventListener("DOMContentLoaded", function() {
        // Add click event to quantity buttons
        document.querySelectorAll(".quantity-btn").forEach((btn) => {
          btn.addEventListener("click", function() {
            const productId = this.dataset.productId;
            const isPlus = this.classList.contains("plus");
            const quantityElement = this.parentElement.querySelector(".quantity");
            let quantity = parseInt(quantityElement.textContent);

            if (isPlus) {
              quantity++;
            } else {
              if (quantity > 1) quantity--;
            }

            updateCartItem(productId, quantity, quantityElement);
          });
        });

        // Add click event for delete/remove buttons
        document.querySelectorAll(".remove-item").forEach((btn) => {
          btn.addEventListener("click", function() {
            const productId = this.dataset.productId;
            if (confirm('Are you sure you want to remove this item from your cart?')) {
              removeCartItem(productId);
            }
          });
        });        // Add click event to checkout button
        document.getElementById("checkout-btn").addEventListener("click", function() {
          <?php if (!isset($_SESSION['id'])): ?>
          if (confirm('You must be logged in to checkout. Go to login page?')) {
            window.location.href = '../login-signup/login.php';
          }
          <?php else: ?>
          if (Object.keys(<?= json_encode($cart) ?>).length === 0) {
            alert('Your cart is empty!');
          } else {
            window.location.href = "download_order.php";
          }
          <?php endif; ?>
        });function updateCartItem(productId, quantity, quantityElement) {
          fetch("update_cart.php", {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
              },
              body: JSON.stringify({
                product_id: productId,
                quantity: quantity,
              }),
            })
            .then((response) => response.json())
            .then((data) => {
              if (data.success) {
                quantityElement.style.transform = "scale(1.2)";
                setTimeout(() => {
                  quantityElement.textContent = quantity;
                  quantityElement.style.transform = "scale(1)";
                  location.reload();
                }, 200);
              } else {
                alert("Error: " + data.message);
              }
            });
        }
        
        function removeCartItem(productId) {
          fetch("remove_from_cart.php", {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
              },
              body: JSON.stringify({
                product_id: productId,
              }),
            })
            .then((response) => response.json())
            .then((data) => {
              if (data.success) {
                location.reload();
              } else {
                alert("Error: " + data.message);
              }
            });
        }
      });
    </script>
</body>

</html>