<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wishlist</title>
    <link rel="stylesheet" href="myWishlist.css">
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
                <li><a href="#"><i class="fas fa-cart-shopping"></i>My Orders</a></li>
                <li><a href="myWishlist.php"><i class="fas fa-heart"></i>My Wishlist</a></li>
                <li><a href="#"><i class="fas fa-money-bill"></i></i>Payment</a></li>
                <li><a href="#"><i class="fas fa-home"></i>Back to Home</a></li>
            </ul> 
        </div>
        <div class="main_content">
            <div class="hr">My Wishlist</div>  
            <table class="table wishlist-table">
                <thead>
                    <tr>
                        <th scope="col">Product Image</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Stock Status</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Category</th>
                        <th scope="col">Shop Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Include database connection
                    include '../../partials/dbConnect.php';

                    // Fetch wishlist items from the database
                    $db = new Database();
                    $conn = $db->getConnection();
                    $customerId = $_SESSION['user_id'];
                    $sql = "SELECT * FROM favourite WHERE customer_id = :cust_id";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param(":cust_id", $customerId);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    // Display wishlist items in table rows
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='img-container'><img src='../Image/{$row['product_image']}' alt='Product Image'></td>";
                        echo "<td class='td-product-name'>{$row['product_name']}</td>";
                        echo "<td class='td-price'>{$row['price']}</td>";
                        echo "<td class='td-stock'>{$row['stock_status']}</td>";
                        echo "<td class='th-quantity'><input type='number' value='1' min='1' class='form-control text-center'></td>";
                        echo "<td class='td-category'>{$row['category']}</td>";
                        echo "<td class='td-shop-name'>{$row['shop_name']}</td>";
                        echo "<td class='td-actions'><button type='button' class='btn btn-danger btn-sm'>Remove</button><button type='button' class='btn btn-primary btn-sm'>Add to Cart</button></td>";
                        echo "</tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include('../FooterPage/footer.php');?>

    <script src="../HeaderPage/head.js"></script>
</body>
</html>
