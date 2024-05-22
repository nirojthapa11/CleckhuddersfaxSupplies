<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="myCart.css">
    <link rel="stylesheet" href="../PHP/HeaderPage/head.css">
    <link rel="stylesheet" href="../PHP/FooterPage/footer.css">
    <title>Document</title>
</head>
<body>
    <div><?php include('../../PHP/HeaderPage/head.php');?></div>
    <!-- Cart items details -->
    <div class="wrapper">
		<div class="sidebar">
			<ul>
				<li><a href="customerProfile.php"><i class="fas fa-user"></i>My Profile</a></li>
				<li><a href="myOrder.php"><i class="fas fa-cart-shopping"></i>My Orders</a></li>
				<li><a href="myWishlist.php"><i class="fas fa-heart"></i>My Wishlist</a></li>
				<li><a href="#"><i class="fas fa-money-bill"></i>Payment</a></li>
				<li><a href="mycart.php"><i class="fas fa-cart-shopping"></i>My Cart</a></li>
			</ul>
		</div>
        <div class="small-container cart-page">
            <table>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>SubTotal</th>
                </tr>
                <tr>
                    <td>
                        <div class="cart-info">
                            <img src="../Image/apple.jpeg">
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
                            <img src="../Image/apple.jpeg">
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
                            <img src="../Image/apple.jpeg">
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
        </div>
    </div>

    <br><br><br><br><br>

    <?php include('../../PHP/FooterPage/footer.php');?>
    <script src="../PHP/HeaderPage/head.php"></script>
</body>
</html>