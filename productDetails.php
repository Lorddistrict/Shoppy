<?php
require 'Product.php';
$product = Product::find($_GET['product']);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Shoppy</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/Shoppy/assets/css/shoppy.css" />
</head>
<body>
	<div class="header">
		<nav class="navbar navbar-expand-lg navbar-dark bg-info">
			<a class="navbar-brand" href="index.php">Shoppy</a>
		</nav>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-3 offset-lg-3">
				<h3 class="details-title"><?= $product->getName() ?></h3>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3">
				<img src="assets/img/<?= $product->getPicture() ?>" class="product-pic">
			</div>
			<div class="col-lg-6">
				<p class="p-details">
					<b>Description : </b><?= $product->getDesc() ?></p><br/>
					<b>Prix : </b><?= $product->getPrice() ?>€<br/>
					<a href="productEdition.php?product=<?= $_GET['product']; ?>" class="btn btn-primary btn-details">Modifier la fiche produit</a>
				</p>
			</div>
		</div>
		</div>
	</div>


	<!-- Footer -->
	<footer class="page-footer font-small blue pt-4">
	  <!-- Copyright -->
	  <div class="footer-copyright text-center py-3">© 2018 Copyright:
	    <a href="#" class="footer-link"> Shoppy</a>
	  </div>
	  <!-- Copyright -->
  </footer>
  <!-- Footer -->
</body>
</html>