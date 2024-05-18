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
                        <input type="text" id="full-name" name="full-name" required>
                        
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                        
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" required>
                    </div>
        
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
                </div>

                <div class="product-box">
                    <h2>Order Products</h2>
                    <div class="product-item">
                        <img src="../Image/apple.jpeg" alt="">
                        <div class="product-details">
                            <div class="product-info">
                                <span>Fresh Apple</span>
                            </div>
                            <div class="product-Quan">
                                <span>Quantity: 1</span>
                            </div>
                            <div class="product-price">
                                <span>$20.00</span>
                            </div>
                        </div>
                    </div>  
                    <div class="product-item">
                        <img src="../Image/banana.jpeg" alt="">
                        <div class="product-details">
                            <div class="product-info">
                                <span>Fresh Banana</span>
                            </div>
                            <div class="product-Quan">
                                <span>Quantity: 1</span>
                            </div>
                            <div class="product-price">
                                <span>$20.00</span>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
            
            <div class="right-container">
                <div class="discount">
                    <h2>Discount</h2>
                    <div class="discount-item">
                        <span>Discount Code:</span>
                        <input type="text" id="discount-code" placeholder="Enter Discount Code" name="discount-code">
                    </div>
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
                        <span>$35.00</span>
                    </div>
                </div>
                <div class="payment-details">
                    <h2>Payment Option</h2>
                    <div class="paypal-option">
                        <label for="paypal">
                            <img src="../Image/PayPal.jpeg" alt="PayPal" class="paypal-logo">
                            <img src="../Image/strikepay.png" alt="Strikepay" class="paypal-logo">
                        </label>
                    </div>
                </div>

                <button type="submit">Place Order</button>
            </div>
        </form>
    </div>
</body>
</html>