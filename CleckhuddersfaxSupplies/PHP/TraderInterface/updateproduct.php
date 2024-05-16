<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="updateproduct.css">
    <link rel="stylesheet" href="../HeaderPage/head.css">
    <link rel="stylesheet" href="../FooterPage/footer.css">

</head>
<body>
    <div><?php include('../HeaderPage/head.php');?></div>
    <div class="container-add">
        <div class="content">
            <img src="../Image/Tom.jpeg" alt="Company Image">
            <div class="signup">
                <header>
                    <h1>Update Product</h1>
                </header>
                <form action="#" method="post">
                <div class="formh-group">
                    <label for="shop-name">Product Name:</label>
                    <input type="text1" id="shop-name" name="shop-name" required>
                </div>
                <div class="formh-group inline">
                    <label for="price">Price:</label>
                    <input type="number" id="price" name="price" required>
                </div>
                <div class="formh-group inline">
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" required>
                </div>
                <div class="formh-group inline">
                    <label for="min-order">Min Order:</label>
                    <input type="number" id="min-order" name="min-order" required>
                </div>
                <div class="formh-group inline">
                    <label for="max-order">Max Order:</label>
                    <input type="number" id="max-order" name="max-order" required>
                </div>
                <div class="form-group">
                    <label for="product-image">Product Image:</label>
                    <input type="file" id="product-image" name="product-image" required>
                </div>
                <div class="formh-group">
                    <label for="category">Product Category</label>
                    <select type="category" id="category" name="category" required>
                    <option value="">Select a category</option>
                    <option value="Butchers">Butchers</option>
                    <option value="Greengrocer">Greengrocer</option>
                    <option value="Fishmonger">Fishmonger</option>
                    <option value="Bakery">Bakery</option>
                    <option value="Deliccatessen">Deliccatessen</option>
                    </select>
                </div>
                <div class="formh-group">
                    <label for="description">Description:</label>
                    <br />
                    <textarea id="description" name="description" rows="11" cols="50" required></textarea>
                    <br />
                </div>
                    <button type="submit" class="next">Update</button>
                </form>
            </div>
        </div>
    </div>
    <?php include('../FooterPage/footer.php');?>
    <script src="../HeaderPage/head.js"></script>
</body>
</html>
