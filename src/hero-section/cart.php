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
            ?>
              <div class="grid grid-cols-12 items-center text-gray-300 border-b border-dark px-4 py-4">
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
                <div class="col-span-2 text-center text-green-300">$<?= number_format($itemSubtotal, 2) ?></div>
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
            $tax = $subtotal * $taxRate;
            $total = $subtotal + $tax;
          ?>

          <div class="space-y-4">
            <div class="flex justify-between">
              <span class="text-gray-300">Subtotal</span>
              <span class="text-green-400">$<?= number_format($subtotal, 2) ?></span>
            </div>

            <div class="flex justify-between">
              <span class="text-gray-300">Shipping</span>
              <span class="text-green-400">Free</span>
            </div>

            <div class="flex justify-between">
              <span class="text-gray-300">Tax</span>
              <span class="text-green-400">$<?= number_format($tax, 2) ?></span>
            </div>

            <div class="border-t border-dark pt-4 mt-4">
              <div class="flex justify-between font-bold text-lg">
                <span class="text-gray-100">Total</span>
                <span class="text-green-300">$<?= number_format($total, 2) ?></span>
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
              class="flex-1 bg-gray-700 border border-dark text-gray-200 rounded-l-lg px-4 py-2 focus:border-green-400" />
            <button class="promo-btn text-gray-200 px-4 py-2 rounded-r-lg">Apply</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      document.querySelectorAll(".quantity-btn").forEach((btn) => {
        btn.addEventListener("click", function () {
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

      document.getElementById("checkout-btn").addEventListener("click", function () {
        window.location.href = "login.php?redirect=cart.php";
      });

      function updateCartItem(productId, quantity, quantityElement) {
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
    });
  </script>
</body>
</html>
