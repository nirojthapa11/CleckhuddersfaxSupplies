<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
</head>
<body>

    <!-- Product container starts here -->
    <div class="container my-4" id="ques">
        <h2 class="text-center my-3">iDiscuss - Browse Products</h2>
        <div class="row my-3">

            <!-- fetch all the products and use a loop to iterate through products -->
            <?php
            include 'partials/dbConnect.php';
            $db = new Database();
            $products = $db->getProducts();

            foreach ($products as $product) {
                // $id = $product["PRODUCT_ID"];
                // $name = $product["PRODUCT_NAME"];
                // $desc = $product["DESCRIPTION"];
                // $price = $product["PRICE"];
                // $rating = $product["RATING"]; // Assuming rating is out of 5
                $id =$product["PRODUCT_ID"];
                $cat = $product["PRODUCT_NAME"];
                $desc = $product["DESCRIPTION"];
                echo '<div class="col-md-4 my-2">
                                    <div class="card" style="width: 18rem;">
                                        <img src="https://source.unsplash.com/500x400/?' . $cat . ',coding" class="card-img-top" alt="image for this category">
                                        <div class="card-body">
                                            <h5 class="card-title"><a href="/forum/threadlist.php?catid=' . $id . '">' . $cat . '</a></h5>
                                            <p class="card-text">' . substr($desc, 0, 30) . '...</p>
                                            <a href="/forum/threadlist.php?catid=' . $id . '" class="btn btn-primary">View Threads</a>
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
</body>
</html>
