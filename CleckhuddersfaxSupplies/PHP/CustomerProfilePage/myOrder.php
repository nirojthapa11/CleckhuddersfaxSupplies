<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Orders</title>
	<link rel="stylesheet" href="myOrder.css">
  <link rel="stylesheet" href="../HeaderPage/head.css">
  <link rel="stylesheet" href="../FooterPage/footer.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <div><?php include('../HeaderPage/head.php');?></div>
  <div class="wrapper">
        <div class="sidebar">
            <ul>
                <li><a href="customerProfile.php"><i class="fas fa-user"></i>My Profile</a></li>
                <li><a href="myOrder.php"><i class="fas fa-cart-shopping"></i>My Orders</a></li>
                <li><a href="myWishlist.php"><i class="fas fa-heart"></i>My Whislists</a></li>
                <li><a href="#"><i class="fas fa-money-bill"></i></i>My Reviews</a></li>
                <li><a href="#"><i class="fas fa-cart-shopping"></i>My Cart</a></li>
            </ul> 
        </div>
        <div class="main_content">
            <div class="hr">My Orders</div>
            <div class="order-container">
                <table class="table order-table">
                    <thead>
                        <tr>
                            <th scope="col">Product Image</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                            <td class="img-container">
                            <img src="../Image/apple.jpeg" alt="Product 1">
                            </td>
                            <td class="td-product-name">Apple</td>
                            <td class="td-status">Pending</td>
                            <td class="td-price">€77.00</td>
                            <td class="th-quantity">
                                <input type="number" value="1" min="1" class="form-control text-center">
                            </td>
                            <td class="td-total">€77.00</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
  </div>

  <?php include('../FooterPage/footer.php');?>

  <script src="../HeaderPage/head.js"></script>
</body>
</html>