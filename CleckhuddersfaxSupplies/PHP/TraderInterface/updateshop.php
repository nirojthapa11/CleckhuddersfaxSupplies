<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="updateshop.css">

</head>
<body>
    <?php include('head.php');?>

    <div class="container-add">
        <div class="content">
            <img src="../Image/Tom.jpeg" alt="Company Image">
            <div class="signup">
                <header>
                    <h1>Update Shop</h1>
                </header>
                <form action="#" method="post">
                <div class="formh-group">
                    <label for="shop-name">Shop Name:</label>
                    <input type="text1" id="shop-name" name="shop-name" required>
                </div>
                <div class="formh-group">
                    <label for="phone-number">Phone Number:</label>
                    <input type="tel" id="phone-number" name="phone-number" required>
                </div>
                <div class="formh-group">
                    <label for="shop-email">Shop Email:</label>
                    <input type="email" id="shop-email" name="shop-email" required>
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
    
    <?php include('footer.php');?>
</body>
</html>
