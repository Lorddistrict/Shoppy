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
			<a class="navbar-brand" href="#">Shoppy</a>
		</nav>
	</div>
	<div class="container">
		<div class="row">
			<div class="alert alert-success" id="alert-success" role="alert" hidden="hidden">
			  This is a success alert—check it out!
			</div>
		</div>	
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
					<form id="updateFrom">
						<div class="form-group">
							<label for="description">Description :</label>
							<textarea class="form-control" id="description" name="description" required>
								<?= $product->getDesc() ?>
							</textarea>
						</div>
						<div class="form-group">
							<label for="price">Prix : </label>
							<div class="input-group">
								<input class="form-control" type="text" name="price" value="<?= $product->getPrice() ?>" required>
								<div class="input-group-append">
									<span class="input-group-text">€</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<input type="hidden" name="id" value="<?= $product->getId() ?>">
							<button type="submit" class="btn btn-success btn-details">Valider</button>
						</div>
					</form>
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript">
  	$(document).ready(function (){
  		$('#updateFrom').submit(function (e){
  			e.preventDefault();
  			var dataflow = $('#updateFrom').serialize();
  			$.post('editionSubmit.php', dataflow, function (data){
  				$('#alert-success').show();
  			});
  		});
  	});
  </script>

</body>
</html>