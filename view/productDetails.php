<?php
require(__DIR__.'/../class/Product.php');

if(isset($_GET['product']) && is_numeric($_GET['product'])){
	$product = Product::find($_GET['product']);
}

require(__DIR__.'/header.php');
?>

	<div class="container">
		<div class="row">
			<div class="col-lg-3 offset-lg-3">
				<h3 class="details-title"><?= $product->getName() ?></h3>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3">
				<img src="../assets/img/<?= $product->getPicture() ?>" class="product-pic">
			</div>
			<div class="col-lg-6">
				<p class="p-details">
					<b>Description : </b><?= $product->getDescription() ?></p><br/>
					<b>Prix : </b><?= $product->getPrice() ?>€<br/>
					<a href="productEdition.php?product=<?= $product->getId() ?>" class="btn btn-primary btn-details">Modifier la fiche produit</a>
				</p>
			</div>
		</div>
		</div>
	</div>

	<?php
	require(__DIR__.'/footer.php');
	?>

</body>
</html>