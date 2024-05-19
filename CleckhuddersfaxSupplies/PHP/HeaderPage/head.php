<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cleckhuddersfax Supplies Header</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- <link rel="stylesheet" href="head.css"> -->
</head>
<body>
<header class="header">
    <div class="header-1">
        <img src="../Image/WebsiteLogo.png" alt="Website Logo">
        <form action="" class="search-form">
            <input type="search" name="" placeholder="Search here..." id="search-box">
            <label for="search-box" class="fas fa-search"></label>
        </form>
        <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>
            <a href="../CartPage/cart.php" class="fas fa-shopping-cart"></a>
            <?php
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                $customerId = $_SESSION['user_id'];
                echo '<div id="login-btn" class="fas fa-user">';
                echo '<div class="login-options">';
                echo '<a href="../CustomerProfilePage/customerProfile.php"> <i class="fa-regular fa-face-smile"></i> Manage My Account</a>';
                echo '<a href="#"> <i class="fa-sharp fa-solid fa-box-open"></i> My Orders</a>';
                echo '<a href="../CustomerProfilePage/myWishlist.php?customer_id=' . $customerId . '"><i class="fa-regular fa-heart"></i> My Wishlist</a>';
                echo '<a href="#"> <i class="fa-regular fa-star"></i> My Reviews</a>';
                echo '<a href="../Login_Signup/logout.php"> <i class="fa-solid fa-person-walking-arrow-right"></i> Log out</a>';
                echo '</div>';
                echo '</div>';
                echo '<div class="login-btn-container"><a href="../Login_Signup/logout.php" class="login-btn">Log out</a></div>';
            } else {
                echo '<div class="login-btn-container"><a href="../Login_Signup/login.php" class="login-btn">Log in</a></div>';
                echo '<div class="login-btn-container"><a href="../Login_Signup/customerSignup.php" class="login-btn">Sign up</a></div>';
            }
            ?>
        </div>
    </div>
    <div class="header-2">
        <div class="header-item item-center">
            <div class="menu-overlay"></div>
            <nav class="menu">
                <ul class="menu-main">
                    <li><a href="../HomePage/homepage.php">Home</a></li>
                    <li><a href="../AboutUsPage/aboutus.php">About Us</a></li>
                    <li><a href="../ContactUsPage/contactus.php">Contact Us</a></li>
                    <li><a href="../ProductPage/product.php">Products</a></li>
                    <li class="menu-item-has-children">
                        <a href="../ShopPage/shop.php">Shop <i class="fa fa-angle-down"></i></a>
                        <div class="sub-menu mega-menu mega-menu-column-4">
                            <div class="list-item">
                                <h4 class="title">Greengrocer</h4>
                                <ul>
                                    <li><a href="../CategoriesPage/greengrocerCategories.php">Fruits List</a></li>
                                    <li><a href="../CategoriesPage/greengrocerCategories.php">Vegetables List</a></li>
                                </ul>
                                <h4 class="title">Bakery</h4>
                                <ul>
                                    <li><a href="../CategoriesPage/bakeryCategories.php">Bread List</a></li>
                                    <li><a href="../CategoriesPage/bakeryCategories.php">Cakes List</a></li>
                                    <li><a href="../CategoriesPage/bakeryCategories.php">Cookies List</a></li>
                                </ul>
                            </div>
                            <div class="list-item">
                                <h4 class="title">Butcher</h4>
                                <ul>
                                    <li><a href="../CategoriesPage/butcherCategories.php">Meat List</a></li>
                                    <li><a href="../CategoriesPage/butcherCategories.php">Wings & Legs List</a></li>
                                    <li><a href="../CategoriesPage/butcherCategories.php">Sausages List</a></li>
                                </ul>
                                <h4 class="title">Fishmonger</h4>
                                <ul>
                                    <li><a href="../CategoriesPage/fishmongerCategories.php">Fish List</a></li>
                                    <li><a href="../CategoriesPage/fishmongerCategories.php">Seafood List</a></li>
                                    <li><a href="../CategoriesPage/fishmongerCategories.php">Smoked & Cured Fish
                                            List</a></li>
                                </ul>
                            </div>
                            <div class="list-item">
                                <h4 class="title">Delicatessen</h4>
                                <ul>
                                    <li><a href="../CategoriesPage/delicatessenCategories.php">Cured Meats List</a></li>
                                    <li><a href="../CategoriesPage/delicatessenCategories.php">Cheeses List</a></li>
                                    <li><a href="../CategoriesPage/delicatessenCategories.php">Sandwiches List</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<nav class="bottom-navbar">
    <a href="../HomePage/homepage.php" class="fas fa-home"></a>
    <a href="../AboutUsPage/aboutus.php" class="fa-solid fa-address-card"></a>
    <a href="../ContactUsPage/contactus.php" class="fas fa-comments"></a>
    <a href="../ProductPage/product.php" class="fa-solid fa-bowl-food"></a>
    <a href="../ShopPage/shop.php" class="fa-solid fa-store"></a>
</nav>
</body>
</html>
