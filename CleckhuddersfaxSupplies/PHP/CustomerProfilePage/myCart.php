<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="../HeaderPage/head.css">
    <link rel="stylesheet" href="../FooterPage/footer.css">
    <title>Document</title>
</head>
<body>
    <div><?php include('../HeaderPage/head.php');?></div>
    <!-- Cart items details -->
    <div class="small-container cart-page">
        <table>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>SubTotal</th>
            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="../Image/apple.jpeg">
                        <div>
                            <p>Fresh Apple</p>
                            <small>Price: $50.00</small>
                            <br>
                            <a href="">Remove</a>
                        </div>
                    </div>
                </td>
                <td><input type="number" value="1"></td>
                <td>$50.00</td>
            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="../Image/apple.jpeg">
                        <div>
                            <p>Fresh Apple</p>
                            <small>Price: $50.00</small>
                            <br>
                            <a href="">Remove</a>
                        </div>
                    </div>
                </td>
                <td><input type="number" value="1"></td>
                <td>$50.00</td>
            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="../Image/apple.jpeg">
                        <div>
                            <p>Fresh Apple</p>
                            <small>Price: $50.00</small>
                            <br>
                            <a href="">Remove</a>
                        </div>
                    </div>
                </td>
                <td><input type="number" value="1"></td>
                <td>$50.00</td>
            </tr>
        </table>

        <div class="total-price">
            <table>
                <tr>
                    <td>SubTotal</td>
                    <td>$150.00</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>$50.00</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>$200.00</td>
                </tr>
            </table>
        </div>
    </div>

    <?php include('../FooterPage/footer.php');?>
    <script src="../HeaderPage/head.js"></script>
</body>
</html>