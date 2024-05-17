<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="../HeaderPage/head.css">
    <link rel="stylesheet" href="../FooterPage/footer.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <title>Cleckhuddersfax Supplies</title>


</head>
<body>
<div>
    <?php
    include('../HeaderPage/head.php');

    ?>
</div>

<section class="home" id="home">
    <div class="content">
        <h3>fresh and <span>organic</span> products for your</h3>
        <p>Crafting Moments, One Ingredient at a Time: Welcome to Our Cleckhuddersfax Supplies!</p>
        <a href="../ShopPage/shop.php" class="btn">Shop Now</a>
    </div>
</section>

<section class="features" id="features">
    <h1 class="heading">Our <span>Features</span></h1>

    <div class="box-container">
        <div class="box">
            <img src="../Image/fresh.jpeg" alt="">
            <h3>Fresh Market Outlets</h3>
            <p>Where quality meets culinary inspiration, offering a curated selection of premium groceries and gourmet
                delights."</p>
        </div>

        <div class="box">
            <img src="../Image/Delivery.jpeg" alt="">
            <h3>free delivery</h3>
            <p>Enjoy the convenience of free delivery straight to your picking place with Cleckhuddersfax Supplies,
                making shopping effortless.</p>
        </div>

        <div class="box">
            <img src="../Image/easy payment.jpeg" alt="">
            <h3>easy payments</h3>
            <p>Join us at Cleckhuddersfax Supplies and experience the ease of stress-free payments, tailored to your
                convenience.</p>
        </div>
    </div>
</section>


<!-- Product container starts here -->
<div class="container my-4" id="ques">
    <h1 class="heading">Our <span>Products</span></h1>
    <div class="row my-3">
        <!-- fetch all the products and use a loop to iterate through products -->
        <?php
        include '../../partials/dbConnect.php';
        $db = new Database();
        $products = $db->getProducts();

        foreach ($products as $product) {
            $id = $product["PRODUCT_ID"];
            $name = $product["PRODUCT_NAME"];
            $desc = $product["DESCRIPTION"];
            $rating = $product["RATING"]; // Assuming rating is out of 5
            $imageBase64 = $db->getProductImage($id);

            echo '<div class="col-md-4 my-4 product-card">
                    <div class="card border rounded shadow-sm" style="width: 100%; border-color: #ddd; height: 350px;">'; // Set a fixed height for the card container

            echo '<div style="height: 200px; overflow: hidden;">'; // Set a fixed height for the image container and hide overflow
            if ($imageBase64) {
                echo '<img src="data:image/jpeg;base64,' . $imageBase64 . '" alt="Customer Image" style="width: 100%; height: auto;">'; // Set the width to 100% and height to auto to maintain aspect ratio
            } else {
                echo '<img src="path_to_placeholder_image.jpg" alt="' . $name . ' Image" style="width: 100%; height: auto;">'; // Provide a placeholder image or handle the absence of image here
            }
            echo '</div>'; // Close image container

            echo '<div class="card-body" style="padding: 1.5rem;">';

            echo '<h5 class="card-title" style="font-family: \'Roboto\', sans-serif; font-size: 2rem;"><a href="/shop/product.php?productid=' . $id . '" style="color: #333;">' . $name . '</a></h5>
                  <p class="card-text text-muted" style="font-family: \'Roboto\', sans-serif; font-size: 1.5rem;">' . substr($desc, 0, 50) . '...</p>
                  <div class="ratings">';

            // Display star rating
            for ($i = 0; $i < 5; $i++) {
                if ($i < $rating) {
                    echo '<i class="fas fa-star text-warning"></i>';
                } else {
                    echo '<i class="far fa-star"></i>';
                }
            }
            echo '</div>
                    <div class="btn-group mt-3" role="group" aria-label="Product Actions">'; // Increased margin top for the button group

            // Increased font size for buttons
            echo '<a href="/shop/addToCart.php?add=' . $id . '" class="btn btn-primary" style="font-family: \'Roboto\', sans-serif; font-size: 1.8rem;">Add to Cart</a>';
            echo '<a href="/shop/wishlist.php?add=' . $id . '" class="btn btn-outline-secondary ml-2" style="font-family: \'Roboto\', sans-serif; font-size: 1.8rem;">Add to Wishlist</a>';

            echo '</div>
                </div>
            </div>
        </div>';
        }
        ?>
    </div>
</div>


<!-- Include Bootstrap JS and dependencies here -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous">
</script>

<section class="categores" id="categores">
    <h1 class="heading">Our <span>Shops</span></h1>
    <div class="box-container">
        <div class="box">
            <img src="../Image/greengrocer.jpeg" alt="">
            <h3>Greengrocer</h3>
            <p>upto 45% off</p>
            <a href="../ShopPage/shop.php" class="btn">Shop now</a>
        </div>

        <div class="box">
            <img src="../Image/bakery.jpeg" alt="">
            <h3>Bakery</h3>
            <p>upto 45% off</p>
            <a href="../ShopPage/shop.php" class="btn">Shop now</a>
        </div>

        <div class="box">
            <img src="../Image/butchers.jpeg" alt="">
            <h3>Butcher</h3>
            <p>upto 45% off</p>
            <a href="../ShopPage/shop.php" class="btn">Shop now</a>
        </div>

        <div class="box">
            <img src="../Image/fishmonger.jpeg" alt="">
            <h3>Fishmonger</h3>
            <p>upto 45% off</p>
            <a href="../ShopPage/shop.php" class="btn">Shop now</a>
        </div>

        <div class="box">
            <img src="../Image/delicatessen.jpg" alt="">
            <h3>Delicatessen</h3>
            <p>upto 45% off</p>
            <a href="../ShopPage/shop.php" class="btn">Shop now</a>
        </div>
    </div>
</section>
<br><br><br>

<?php include('../FooterPage/footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="homepage.js"></script>
<script src="../HeaderPage/head.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>
</body>
</html>