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
    <title>Cleckhuddersfax Supplies</title>

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


<!-- Product container starts here -->
<!--<div class="container my-4" id="ques">-->
<!--    <h2 class="text-center my-3">iDiscuss - Browse Products</h2>-->
<!--    <div class="row my-3">-->
<!---->
<!--        <!-- fetch all the products and use a loop to iterate through products -->-->
<!--        --><?php
//        include '../../partials/dbConnect.php';
//        $db = new Database();
//        $products = $db->getProducts();
//
//        foreach ($products as $product) {
//            // $id = $product["PRODUCT_ID"];
//            // $name = $product["PRODUCT_NAME"];
//            // $desc = $product["DESCRIPTION"];
//            // $price = $product["PRICE"];
//            // $rating = $product["RATING"]; // Assuming rating is out of 5
//            $id =$product["PRODUCT_ID"];
//            $cat = $product["PRODUCT_NAME"];
//            $desc = $product["DESCRIPTION"];
//            echo '<div class="col-md-4 my-2">
//                                    <div class="card" style="width: 18rem;">
//                                        <img src="https://source.unsplash.com/500x400/?' . $cat . ',coding" class="card-img-top" alt="image for this category">
//                                        <div class="card-body">
//                                            <h5 class="card-title"><a href="/forum/threadlist.php?catid=' . $id . '">' . $cat . '</a></h5>
//                                            <p class="card-text">' . substr($desc, 0, 30) . '...</p>
//                                            <a href="/forum/threadlist.php?catid=' . $id . '" class="btn btn-primary">View Threads</a>
//                                        </div>
//                                    </div>
//                                </div>';
//        }
//        ?>
<!--    </div>-->
<!--</div>-->



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