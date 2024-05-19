<?php
require_once('../../partials/dbconnect.php'); 

$database = new Database();

$productID = isset($_GET['product_id']) ? $_GET['product_id'] : null;
$product = $database->getProductById($productID);

$imageBase64 = $database->getProductImage($productID);

$productQuantity = 1;

$database->closeConnection();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="productdtl.css">
    <link rel="stylesheet" href="../HeaderPage/head.css">
    <link rel="stylesheet" href="../FooterPage/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div>
    <?php
        include('../HeaderPage/head.php');
    ?>
   
    </div>



<div class="container my-5">


    <div class="row">
        <?php if ($product && $imageBase64) : ?>
            <div class="col-md-5">
                <div class="main-img">
                    <!-- Resize and display the product image -->
                    <img class="img-fluid" src="data:image/png;base64, <?php echo $imageBase64; ?>" alt="Product" width="100" height="100">
                </div>
                <div class="text-center mt-3">
                    <div class="d-flex justify-content-between">
                        <!-- "Add to Wishlist" button with icon -->
                        <a href="addToWishlist.php?product_id=<?php echo $productID; ?>" class="btn btn-outline-secondary" style="font-family: 'Roboto', sans-serif; font-size: 1.8rem;">
                            <i class="fas fa-heart"></i> Add to Wishlist
                        </a>
                        <!-- Quantity increase and decrease buttons -->
                        <div class="quantity-buttons my-2">
                            <button class="btn btn-secondary" onclick="updateQuantity('decrease')"><i class="fas fa-minus"></i></button>
                            <span id="productQuantity" class="mx-2">1</span>
                            <button class="btn btn-secondary" onclick="updateQuantity('increase')"><i class="fas fa-plus"></i></button>
                        </div>
                        <!-- Add to Cart button -->
                        <?php
                        // Increased font size for buttons
                        echo '<a href="addToCart.php?productid=' . $productID . '&quantity=" class="btn btn-primary" style="font-family: \'Roboto\', sans-serif; font-size: 1.8rem;">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                            </a>';
                        ?>
                    </div>
                </div>
            </div>
            
            <div class="col-md-7">
                <!-- Product details -->
                <div class="main-description px-2">
                    <div class="product-title text-bold my-3">
                        <?php echo $product['PRODUCT_NAME']; ?> <!-- Product Name -->
                    </div>
                    <div class="price-area my-4">
                        <?php if ($product['PRICE']) : ?>
                            <!-- Display Price -->
                            <p class="new-price text-bold mb-1">Price: $<?php echo $product['PRICE']; ?></p>
                        <?php endif; ?>
                        <!-- Display Rating -->
                        <?php
                        $rating = $product['RATING'];
                        for ($i = 0; $i < $rating; $i++) {
                            echo '<span class="fa fa-star"></span>';
                        }
                        ?>
                    </div>
                    <div class="product-details my-4">
                        <!-- Display Product Description -->
                        <p class="description"><?php echo $product['DESCRIPTION']; ?></p>
                    </div>
                    <!-- Additional Product Details -->
                    <div class="product-details my-4">
                        <p><strong>Category:</strong> <?php echo $product['CATEGORY_NAME']; ?></p>
                        <p><strong>Shop:</strong> <?php echo $product['SHOP_NAME']; ?></p>
                        <p><strong>Stock:</strong> <?php echo $product['STOCK']; ?></p>
                        <p><strong>Discount:</strong> <?php echo $product['DISCOUNT_PERCENTAGE']; ?></p>
                        <p><strong>Allergy Info:</strong> <?php echo $product['ALLERGY_INFO']; ?></p>
                    </div>
                </div>
            </div>  
        <?php else : ?>
            <div class="col-md-12">
                <p>Product not found.</p>
            </div>
        <?php endif; ?>
    </div>


<script>
        // Initialize productQuantity JavaScript variable with the value from PHP
        var productQuantity = <?php echo $productQuantity; ?>;

        // JavaScript function to update quantity
        function updateQuantity(action) {
            if (action === 'increase') {
                productQuantity++;
            } else if (action === 'decrease' && productQuantity > 1) {
                productQuantity--;
            }
            document.getElementById('productQuantity').innerText = productQuantity;
        }
</script>

    <div class="container">
		<div class="row">
            <div class="review">
                <input id="btnBox" type="checkbox">
                <p class="display-5">Product Reviews</p>
                <ul>
                <li>
                <div class="rev">
                    <div class="name_date">
                        <p class="pname">Person Name</p>
                        <p class="rev_date">05/02/2024</p>
                    </div>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, sit quam eligendi eaque libero odio possimus illo voluptas soluta, distinctio repellat ullam ut modi. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor, est?.</p>
                </div>
            </li>
            <li>
                <div class="rev">
                    <div class="name_date">
                        <p class="pname">Person Name</p>
                        <p class="rev_date">05/04/2024</p>
                    </div>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, sit quam eligendi eaque libero odio possimus illo voluptas soluta, distinctio repellat ullam ut modi. Lorem, ipsum dolor sit amet consectetur adipisicing.</p>
                </div>

            </li>

            <li>
                <div class="rev">
                    <div class="name_date">
                        <p class="pname">Person Name</p>
                        <p class="rev_date">05/07/2024</p>
                    </div>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, sit quam eligendi eaque libero odio possimus illo voluptas soluta, distinctio repellat ullam ut modi. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Labore, est!.</p>
                </div>
            </li>
            <li>
                <div class="rev">
                    <div class="name_date">
                        <p class="pname">Person Name</p>
                        <p class="rev_date">05/08/2024</p>
                    </div>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, sit quam eligendi eaque libero odio possimus illo voluptas soluta, distinctio repellat ullam ut modi. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Labore, est!.</p>
                </div>
            </li>
            <li>
                <div class="rev">
                    <div class="name_date">
                        <p class="pname">Person Name</p>
                        <p class="rev_date">05/09/2024</p>
                    </div>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, sit quam eligendi eaque libero odio possimus illo voluptas soluta, distinctio repellat ullam ut modi. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Labore, est!.</p>
                </div>
            </li>
            </ul>
                <label class="btn_a" for="btnBox"><span class="btn1">See More</span><span class="btn2">See Less</span></label>
            </div>
	    </div>
    </div>



    <div class="container similar-products my-4">
        <hr>
        <p class="display-5">Similar Products</p>
        <div class="row">
            <div class="col-md-3">
                <div class="similar-product">
                    <img class="w-100" src="../gallery/cross.png" alt="Preview">
                    <p class="title">Bakery Item</p>
                    <p class="price">$6</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni tempora rem expedita laborum! Magnam.</p>
                    <button type="button" class="btn btn-outline-primary">Add to Cart</button><br><br>
                    <button type="button" class="btn btn-dark">Review</button>
                </div>
            </div>
            <div class="col-md-3">
                <div class="similar-product">
                    <img class="w-100" src="../gallery/cross.png" alt="Preview">
                    <p class="title">Bakery Item</p>
                    <p class="price">$20</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni tempora rem expedita laborum! Magnam.</p>
                    <button type="button" class="btn btn-outline-primary">Add to Cart</button><br><br>
                    <button type="button" class="btn btn-dark">Review</button>
                </div>
            </div>
            <div class="col-md-3">
                <div class="similar-product">
                    <img class="w-100" src="../gallery/cross.png" alt="Preview">
                    <p class="title">Bakery Item</p>
                    <p class="price">$12</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni tempora rem expedita laborum! Magnam.</p>
                    <button type="button" class="btn btn-outline-primary">Add to Cart</button><br><br>
                    <button type="button" class="btn btn-dark">Review</button>
                </div>
            </div>
            <div class="col-md-3">
                <div class="similar-product">
                    <img class="w-100" src="../gallery/cross.png" alt="Preview">
                    <p class="title">Bakery Item</p>
                    <p class="price">$10</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni tempora rem expedita laborum! Magnam.</p>
                    <button type="button" class="btn btn-outline-primary">Add to Cart</button><br> <br>
                    <button type="button" class="btn btn-dark">Review</button>
                </div>
            </div>
        </div>
    </div>




</div>
<?php require('../FooterPage/footer.php'); ?>
</body>
</html>