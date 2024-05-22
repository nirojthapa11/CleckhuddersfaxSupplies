<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My review</title>
  <link rel="stylesheet" href="myReview.css">
  <link rel="stylesheet" href="../HeaderPage/head.css">
  <link rel="stylesheet" href="../FooterPage/footer.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <div><?php include('../HeaderPage/head.php'); ?></div>
  <div class="wrapper">
    <div class="sidebar">
      <ul>
        <li><a href="customerProfile.php"><i class="fas fa-user"></i>My Profile</a></li>
        <li><a href="myOrder.php"><i class="fas fa-cart-shopping"></i>My Orders</a></li>
        <li><a href="myWishlist.php"><i class="fas fa-heart"></i>My Whislists</a></li>
        <li><a href="myReview.php"><i class="fas fa-money-bill"></i>My Reviews</a></li>
        <li><a href="myCart.php"><i class="fas fa-cart-shopping"></i>My Cart</a></li>
      </ul>
    </div>
    <div class="main_content">
      <div class="header">My Review</div>
      <div class="table-container">
        <table class="review-table">
          <thead>
            <tr>
              <th scope="col">Product Image</th>
              <th scope="col">Product Name</th>
              <th scope="col">Price</th>
              <th scope="col">Review</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="img-container">
                <img src="../Image/apple.jpeg" alt="Product 1">
              </td>
              <td class="td-product-name">Product Split</td>
              <td class="td-price">€100.00</td>
              <td>
                <textarea name="review" rows="6" cols="60" class="form-control"></textarea>
              </td>
              <td class="td-actions">
                <button type="button" class="btn btn-warning btn-sm">Edit</button>
                <button type="button" class="btn btn-danger btn-sm">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php include('../FooterPage/footer.php'); ?>
    <script src="../HeaderPage/head.js"></script>
</body>
</html>
