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
            <img src="../Image/Website Logo.png" alt="">
            <form action="" class="search-form">
                <input type="search" name="" placeholder="Search here..." id="search-box">
                <label for="search-box" class="fas fa-search"></label>
            </form>
            <div class="icons">
                <div id="search-btn" class="fas fa-search"></div>
                <a href="#" class="fas fa-shopping-cart"></a>
                
                <div id="login-btn" class="fas fa-user">
                    <div class="login-options">
                        <a href="customerProfile.php"> <i class="fa-regular fa-face-smile"></i> Manage My Account</a>
                        <a href="#"> <i class="fa-sharp fa-solid fa-box-open"></i> My Orders</a>
                        <a href="myWishlist.php"> <i class="fa-regular fa-heart"></i> My Wishlist</a>
                        <a href="#"> <i class="fa-regular fa-star"></i> My Reviews</a>
                        <a href="#"> <i class="fa-solid fa-person-walking-arrow-right"></i> Logout</a>
                    </div>
                </div>
                <a href="../PHP/Login_Signup/login.php">LogIn</a>
                <a href="../PHP/Login_Signup/customerSignup.php">SignUp</a>
            </div>
        </div>
        <div class="header-2">
            <div class="header-item item-center">
                <div class="menu-overlay">
                </div>
                <nav class="menu">
                    <ul class="menu-main">
                        <li>
                            <a href="../PHP/homepage.php">Home</a>
                        </li>
                       <li>
                           <a href="../PHP/aboutus.php">About Us</a>
                       </li>
                       <li>
                           <a href="../PHP/contactus.php">Contact Us</a>
                       </li>
                       <li>
                           <a href="../PHP/product.php">Products</a>
                       </li>
                        <li class="menu-item-has-children">
                            <a href="../PHP/shop.php">Shop <i class="fa fa-angle-down"></i></a>
                            <div class="sub-menu mega-menu mega-menu-column-4">
                              <div class="list-item">
                                    <h4 class="title">Greengrocer</h4>
                                    <ul>
                                        <li><a href="../PHP/greengrocerCategories.php">Fruits List</a></li>
                                        <li><a href="../PHP/greengrocerCategories.php">Vegetables List</a></li>
                                    </ul>
                                    <h4 class="title">Bakery</h4>
                                    <ul>
                                        <li><a href="../PHP/bakeryCategories.php">Bread List</a></li>
                                        <li><a href="../PHP/bakeryCategories.php">Cakes List</a></li>
                                        <li><a href="../PHP/bakeryCategories.php">Cookies List</a></li>
                                    </ul>
                              </div>
                              <div class="list-item">
                                  <h4 class="title">Butcher</h4>
                                  <ul>
                                        <li><a href="../PHP/butcherCategories.php">Meat List</a></li>
                                        <li><a href="../PHP/butcherCategories.php">Wings & Legs List</a></li>
                                        <li><a href="../PHP/butcherCategories.php">Sausages List</a></li>
                                    </ul>
                                    <h4 class="title">Fishmonger</h4>
                                  <ul>
                                        <li><a href="../PHP/fishmongerCategories.php">Fish List</a></li>
                                        <li><a href="../PHP/fishmongerCategories.php">Seafood List</a></li>
                                        <li><a href="../PHP/fishmongerCategories.php">Smoked & Cured Fish List</a></li>
                                    </ul>
                              </div>
                              <div class="list-item">
                                  <h4 class="title">Delicatessen</h4>
                                  <ul>
                                         <li><a href="../PHP/delicatessenCategories.php">Cured Meats List</a></li>
                                         <li><a href="../PHP/delicatessenCategories.php">Cheeses List</a></li>
                                         <li><a href="../PHP/delicatessenCategories.php">Sandwiches List</a></li>
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
        <a href="../PHP/homepage.php" class="fas fa-home"></a>
        <a href="../PHP/aboutus.php" class="fa-solid fa-address-card""></a>
        <a href="../PHP/contactus.php" class="fas fa-comments"></a>
        <a href="../PHP/product.php" class="fa-solid fa-bowl-food"></a>
        <a href="../PHP/shop.php" class="fa-solid fa-store"></a>
    </nav>

    <script src="head.js"></script>

</body>
</html>