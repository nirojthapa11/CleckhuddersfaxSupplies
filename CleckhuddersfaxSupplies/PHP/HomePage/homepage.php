<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cleckhuddersfax Supplies</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="../HeaderPage/head.css">
    <link rel="stylesheet" href="../FooterPage/footer.css">

</head>
<body>
<div><?php include('../HeaderPage/head.php'); ?></div>

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

<section class="products" id="products">
    <h1 class="heading">Our <span>Products</span></h1>
    <div class="swiper product-slider">
        <div class="swiper-wrapper">

            <?php
            include('../../partials/dbConnect.php');

            $db = new Database();

            $products = $db->getProducts();

            foreach ($products as $product) {
                echo '<div class="swiper-slide box">';
                echo '<img src="' . $product['image_path'] . '" alt="">';
                echo '<h3>' . $product['name'] . '</h3>';
                echo '<div class="price">$' . $product['price'] . '</div>';
                // Additional product details can be displayed here
                echo '<a href="#" class="btn">Add to Cart</a>';
                echo '</div>';
            }
            ?>

        </div>
    </div>
</section>

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
</body>
</html>