<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trader Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="shopInterface.css">
</head>
<body>
    <?php include('head.php');?> 
    <section class="trader-interface">
        <div class="container">
            <div class="boxx" style="background-image: url('../Image/viewshop.jpeg');" onclick="navigateTo('shop.php');">
                <h3>View <br>Shops</h3>
            </div>
            <div class="boxx" style="background-image: url('../Image/addshop.jpeg');" onclick="navigateTo('addshop.php');">
                <h3>Add <br>Shops</h3>
            </div>
            <div class="boxx" style="background-image: url('../Image/updateshop.jpg');" onclick="navigateTo('updateshop.php');">
                <h3>Update Shops</h3>
            </div>
            <div class="boxx" style="background-image: url('../Image/deleteshop.jpeg');" onclick="navigateTo('products.html');">
                <h3>Delete Shops</h3>
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
