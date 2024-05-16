<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Interface</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="admininterface.css">
    <link rel="stylesheet" href="../HeaderPage/head.css">
    <link rel="stylesheet" href="../FooterPage/footer.css">
</head>
<body>
    <div><?php include('../HeaderPage/head.php');?></div>


    <section class="admin-interface">
        <div class="container">
            <div class="boxx" style="background-image: url('../Image/customer.jpg');" onclick="navigateTo('products.html');">
                <h3>Customer</h3>
            </div>
            <div class="boxx" style="background-image: url('../Image/trader.jpg');" onclick="navigateTo('products.html');">
                <h3>Traders</h3>
            </div>
            <div class="boxx" style="background-image: url('../Image/products.jpeg');" onclick="navigateTo('products.html');">
                <h3>Products</h3>
            </div>
            <div class="boxx" style="background-image: url('../Image/order.jpg');" onclick="navigateTo('products.html');">
                <h3>Orders</h3>
            </div>
            <div class="boxx" style="background-image: url('../Image/report.jpg');" onclick="navigateTo('products.html');">
                <h3>Reports</h3>
            </div>
            <div class="boxx" style="background-image: url('../Image/Dashboard.jpeg');" onclick="navigateTo('products.html');">
                <h3>Dashboard</h3>
            </div>
        </div>
    </section>

    <?php include('../FooterPage/footer.php');?>

    <script>
        function navigateTo(url) {
            window.location.href = url;
        }
    </script>
    <script src="../HeaderPage/head.js"></script>

</body>
</html>
