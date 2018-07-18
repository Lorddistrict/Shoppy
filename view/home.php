<?php
require(__DIR__.'/../class/Product.php');
require(__DIR__.'/header.php');
?>

	<div class="container">
		<div class="row">
		
		<?php
		$productList = Product::getAll();
		foreach ($productList as $product):
		?>

			<div class="container col-lg-3 product-container">
				<div class="product-title">
					<b><a href="view/productDetails.php?product=<?= $product->getId(); ?>" class="product-title-link"><?= $product->getName(); ?></a></b>
				</div>
				<div class="product">
					<img src="../assets/img/<?= $product->getPicture(); ?>" class="product-pic">
				</div>
				<div class="product-desc">
					<b>Description : </b><br/>
					<span class="tiled"><?= $product->getDescription() ?></span>
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

	<?php
	require(__DIR__.'/footer.php');
	?>

</body>
</html>