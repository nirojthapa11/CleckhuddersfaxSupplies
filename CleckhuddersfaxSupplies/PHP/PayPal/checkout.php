<?php
  require_once '../../partials/dbConnect.php';
  require_once '../alertService.php';

  if (session_status() === PHP_SESSION_NONE) {
      session_start();
  }

  $customerid = $_SESSION['user_id'];

  $db = new Database();
  $cartid = $db->getCartIdUsingCustomerId($customerid);
  $cart_products = $db->getCartProducts($cartid);

  $subtotal = 0;
  foreach ($cart_products as $product) {
      $subtotal += $product['PRICE'] * $product['QUANTITY'];
  }

  $total = $subtotal;



  $customer = $db->getCustomerById($customerid);

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <link rel="stylesheet" href="checkout.css">
</head>

<body>
    <div class="container">
        <h1>Checkout</h1>
        <form action="/submit-order" method="POST">
            <div class="left-container">
                <div class="details-box">
                    <div class="billing-details">
                        <h2>Billing Details</h2>
                        <label for="full-name">Full Name</label>
                        <input type="text" id="full-name" name="full-name"
                            value="<?php echo $customer['FIRST_NAME'] . ' ' . $customer['LAST_NAME'] ?>" disabled>

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo $customer['EMAIL'] ?>" disabled>

                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" value="<?php echo $customer['ADDRESS'] ?>" disabled>
                    </div>
                </div>

                <div class="product-box">
                    <h2>Order Products</h2>
                    <?php foreach ($cart_products as $product) { ?>
                    <div class="product-item">

                        <?php
                            $imageBase64 = $db->getProductImage($product['PRODUCT_ID']);
                        ?>
                        <?php if (!empty($imageBase64)): ?>
                        <img src="data:image/jpeg;base64,<?php echo $imageBase64; ?>" alt="Product Image"
                            class="product-image">
                        <?php else: ?>
                        <img src="../Image/apple.jpeg" alt="No Image" class="product-image">
                        <?php endif; ?>
                        <div class="product-details">
                            <div class="product-info">
                                <span><?php echo $product['PRODUCT_NAME']; ?></span>
                            </div>
                            <div class="product-Quan">
                                <span><?php echo $product['QUANTITY']; ?></span>
                            </div>
                            <div class="product-price">
                                <span>£<?php echo number_format($product['PRICE'] * $product['QUANTITY'], 2); ?></span>
                            </div>
                        </div>

                    </div>
                    <?php } ?>
                </div>
            </div>

            <div class="right-container">
                <div class="collection-slot">
                    <h2>Collection Slot</h2>
                    <label for="collection-day">Select a Day</label>
                    <select id="collection-day" name="collection-day" required>
                        <option value="" disabled selected>Select a day</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                    </select>

                    <label for="collection-time">Select a Time Slot</label>
                    <select id="collection-time" name="collection-time" required>
                        <option value="" disabled selected>Select a time slot</option>
                        <option value="10-13">10:00 - 13:00</option>
                        <option value="13-16">13:00 - 16:00</option>
                        <option value="16-19">16:00 - 19:00</option>
                    </select>
                </div>


                <div class="order-summary">
                    <h2>Order Summary</h2>
                    <div class="summary-item">
                        <span>Item 1:</span>
                        <span>$10.00</span>
                    </div>
                    <div class="summary-item">
                        <span>Item 2:</span>
                        <span>$20.00</span>
                    </div>
                    <div class="summary-item">
                        <span>Shipping:</span>
                        <span>$5.00</span>
                    </div>
                    <div class="summary-item total">
                        <span>Total:</span>
                        <span>£<?php echo $total; ?></span>
                    </div>
                </div>












                <div class="payment-details">
                    <h2>Payment Option</h2>
                    <div class="paypal-option">
                        <label for="paypal">
                            <img src="../Image/PayPal.jpeg" alt="PayPal" class="paypal-logo">
                        </label>
                    </div>
                </div>







                <button type="submit">Place Order</button>
            </div>
        </form>
    </div>
</body>

</html>