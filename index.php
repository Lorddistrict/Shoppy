<?php
require 'Product.php';
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
		
		<?php
		$productList = Product::getAll();
		foreach ($productList as $product):
		?>

			<div class="container col-lg-3 product-container">
				<div class="product-title">
					<b><a href="productDetails.php?product=<?= $product->getId(); ?>" class="product-title-link"><?= $product->getName(); ?></a></b>
				</div>
				<div class="product">
					<img src="assets/img/<?= $product->getPicture(); ?>" class="product-pic">
				</div>
				<div class="product-desc">
					<b>Description : </b><br/>
					<span class="tiled"><?= $product->getDesc() ?></span>
				</div>
				<br/>
				<div class="product">
					<b>Prix : </b><?= $product->getPrice() ?>€
				</div>
				<br/>
				<div class="product">
					<b><a href="productDetails.php?product=<?= $product->getId() ?>" class="product-links">Voir le produit</a></b>
				</div>
			</div>

		<?php
		endforeach;
		?>
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