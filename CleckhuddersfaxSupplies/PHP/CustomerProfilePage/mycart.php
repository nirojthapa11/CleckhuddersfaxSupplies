<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Cart</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="mycart.css">
    <link rel="stylesheet" href="../HeaderPage/head.css">
    <link rel="stylesheet" href="../FooterPage/footer.css">
</head>
<body>
	
	<div><?php include('../HeaderPage/head.php');?></div>

	<section id="cart-container" class="container my-5">
		<table width="100%">
			<thead>
				<tr>
					<td>Id</td>
					<td>Image</td>
					<td>Product</td>
					<td>Price</td>
					<td>Quantity</td>
					<td>Total</td>
					<td>Action</td>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td><h5>1</h5></td>
					<td><img src="./frimage.jpeg" alt=""></td>
					<td>
						<h5>Kiwi fruit</h5>
					</td>
					<td><h5>$10</h5></td>
					<td><input class="w-25 pl-1" value="1" type="number"></td>
					<td><h5>$20</h5></td>
					<td><button>Remove</button></td>
				</tr>

				<tr>
					<td><h5>2</h5></td>
					<td><img src="./frimage.jpeg" alt=""></td>
					<td>
						<h5>Kiwi fruit</h5>
					</td>
					<td><h5>$10</h5></td>
					<td><input class="w-25 pl-1" value="1" type="number"></td>
					<td><h5>$20</h5></td>
					<td><button>Remove</button></td>
				</tr>

				<tr>
					<td><h5>3</h5></td>
					<td><img src="./frimage.jpeg" alt=""></td>
					<td>
						<h5>Kiwi fruit</h5>
					</td>
					<td><h5>$10</h5></td>
					<td><input class="w-25 pl-1" value="1" type="number"></td>
					<td><h5>$20</h5></td>
					<td><button>Remove</button></td>
				</tr>
			</tbody>
		</table>
	</section>

	<section id="cart-bottom" class="container">
		<div class="row">
			<div class="total col-lg-6 col-md-6 col-12">
				<div>
					<h5>CART TOTAL</h5>
					<div class="d-flex justify-content-between">
						<h6>Subtotal</h6>
						<p>$30</p>
					</div>
					<div class="d-flex justify-content-between">
						<h6>Shipping</h6>
						<p>$30</p>
					</div>
					<hr class="second-hr">
					<div class="d-flex justify-content-between">
						<h6>Total</h6>
						<p>$60</p>
					</div>

					<button class="ml-auto">PROCEED TO CHECKOUT</button>
				</div>
			</div>
		</div>
	</section>

	<br><br><br><br>
    <?php include('../FooterPage/footer.php');?>

    <script src="../HeaderPage/head.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>