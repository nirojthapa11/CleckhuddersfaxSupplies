<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cleckhuddersfax Supplies Header</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="head.css">
</head>
<body>
    <header class="header">
        <div class="header-1">
            <img src="../Image/WebsiteLogo.png" alt="">
            <form action="" class="search-form">
                <input type="search" name="" placeholder="Search here..." id="search-box">
                <label for="search-box" class="fas fa-search"></label>
            </form>
            <div class="icons">
                <div id="search-btn" class="fas fa-search"></div>
                <?php
                session_start();

                // Check if the user is logged in
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    // If the user is logged in, display user options
                    echo '<div id="login-btn" class="fas fa-user">
                            <div class="login-options">
                                <a href="../CustomerProfilePage/customerProfile.php"> <i class="fa-regular fa-face-smile"></i> Manage My Account</a>
                                <a href="#"> <i class="fa-sharp fa-solid fa-box-open"></i> My Orders</a>
                                <a href="../CustomerProfilePage/myWishlist.php"> <i class="fa-regular fa-heart"></i> My Wishlist</a>
                                <a href="#"> <i class="fa-regular fa-star"></i> My Reviews</a>
                                <a href="../Login_Signup/logout.php"> <i class="fa-solid fa-person-walking-arrow-right"></i> Logout</a>
                            </div>
                        </div>';
                    echo '<a href="../Login_Signup/logout.php">LogOut</a>';
                } else {
                    // If the user is not logged in, display login and signup buttons
                    echo '<a href="../Login_Signup/login.php">LogIn</a>';
                    echo '<a href="../Login_Signup/customerSignup.php">SignUp</a>';
                }
                ?>
            </div>
        </div>
        <div class="header-2">
            <div class="header-item item-center">
                <div class="menu-overlay">
                </div>
                <nav class="menu">
                    <ul class="menu-main">
                        <li>
                            <a href="../HomePage/homepage.php">Home</a>
                        </li>
                       <li>
                           <a href="../AboutUsPage/aboutus.php">About Us</a>
                       </li>
                       <li>
                           <a href="../ContactUsPage/contactus.php">Contact Us</a>
                       </li>
                       <li>
                           <a href="../ProductPage/product.php">Products</a>
                       </li>
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
                                        <li><a href="../CategoriesPage/fishmongerCategories.php">Smoked & Cured Fish List</a></li>
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
        <a href="../AboutUsPage/aboutus.php" class="fa-solid fa-address-card""></a>
        <a href="../ContactUsPage/contactus.php" class="fas fa-comments"></a>
        <a href="../ProductPage/product.php" class="fa-solid fa-bowl-food"></a>
        <a href="../ShopPage/shop.php" class="fa-solid fa-store"></a>
    </nav>

    <script src="head.js"></script>

</body>
</html>