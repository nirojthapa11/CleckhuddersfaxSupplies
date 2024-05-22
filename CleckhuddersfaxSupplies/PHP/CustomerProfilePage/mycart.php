<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="myCart.css">
    <link rel="stylesheet" href="../HeaderPage/head.css">
    <link rel="stylesheet" href="../FooterPage/footer.css">
    <title>My Cart</title>
</head>
<body>
    <div><?php include('../HeaderPage/head.php');?></div>
    <!-- Cart items details -->
    <div class="wrapper">
        <div class="sidebar">
            <ul>
                <li><a href="customerProfile.php"><i class="fas fa-user"></i>My Profile</a></li>
                <li><a href="myOrder.php"><i class="fas fa-cart-shopping"></i>My Orders</a></li>
                <li><a href="myWishlist.php"><i class="fas fa-heart"></i>My Whislists</a></li>
                <li><a href="myReview.php"><i class="fas fa-money-bill"></i>My Reviews</a></li>
                <li><a href="mycart.php"><i class="fas fa-cart-shopping"></i>My Cart</a></li>
            </ul>
        </div>
        <div class="small-container cart-page">
            <div class="hed">My Cart</div>
            <div class="cart-contain">
                <table>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>SubTotal</th>
                    </tr>
                    <tr>
                        <td>
                            <div class="cart-info">
                                <img src="../Image/apple.jpeg" alt="Fresh Apple">
                                <div>
                                    <p>Fresh Apple</p>
                                    <small>Price: $50.00</small>
                                    <br>
                                    <a href="">Remove</a>
                                </div>
                            </div>
                        </td>
                        <td><input type="number" value="1"></td>
                        <td>$50.00</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="cart-info">
                                <img src="../Image/apple.jpeg" alt="Fresh Apple">
                                <div>
                                    <p>Fresh Apple</p>
                                    <small>Price: $50.00</small>
                                    <br>
                                    <a href="">Remove</a>
                                </div>
                            </div>
                        </td>
                        <td><input type="number" value="1"></td>
                        <td>$50.00</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="cart-info">
                                <img src="../Image/apple.jpeg" alt="Fresh Apple">
                                <div>
                                    <p>Fresh Apple</p>
                                    <small>Price: $50.00</small>
                                    <br>
                                    <a href="">Remove</a>
                                </div>
                            </div>
                        </td>
                        <td><input type="number" value="1"></td>
                        <td>$50.00</td>
                    </tr>
                </table>

                <div class="total-price">
                    <table>
                        <tr>
                            <td>SubTotal</td>
                            <td>$150.00</td>
                        </tr>
                        <tr>
                            <td>Tax</td>
                            <td>$50.00</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>$200.00</td>
                        </tr>
                    </table>
                </div>
                <div class="checkout-button">
                    <button onclick="location.href='checkout.php'" class="btn">Proceed to Checkout</button>
                </div>
            </div>
        </div>
    </div>

    <br><br><br><br><br>
    <?php include('../FooterPage/footer.php');?>
    <script src="../HeaderPage/head.php"></script>
</body>
</html>
