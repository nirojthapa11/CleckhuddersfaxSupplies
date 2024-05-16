<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trader Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="productInterface.css">
</head>
<body>
    <?php include('head.php');?>
    <section class="trader-interface">
        <div class="container">
            <div class="boxx" style="background-image: url('../Image/viewproduct.jpeg');" onclick="navigateTo('product.php');">
                <h3>View Produts</h3>
            </div>
            <div class="boxx" style="background-image: url('../Image/addproduct.jpeg');" onclick="navigateTo('addproduct.php');">
                <h3>Add Products</h3>
            </div>
            <div class="boxx" style="background-image: url('../Image/updateproduct.jpeg');" onclick="navigateTo('updateproduct.php');">
                <h3>Update Produts</h3>
            </div>
            <div class="boxx" style="background-image: url('../Image/deleteproduct.jpeg');" onclick="navigateTo('products.html');">
                <h3>Delete Produts</h3>
            </div>
        </div>
    </section>

    <?php include('footer.php');?>
    <script>
        function navigateTo(url) {
            window.location.href = url;
        }
    </script>

</body>
</html>
