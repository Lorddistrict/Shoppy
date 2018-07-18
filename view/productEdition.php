<?php
require(__DIR__.'/../class/Product.php');

if(isset($_GET['product']) && is_numeric($_GET['product'])){
	$product = Product::find($_GET['product']);
	if($product->isEdited() == false){
		$product->setIsEdited(true);
		$product->save();
	}else{
		echo'<input type="hidden" id="isEdited" value="'.$product->isEdited().'" />';
	}
}

require(__DIR__.'/header.php');
?>

	<div class="container">
		<div class="row hidden-alert" id="alert-success">
			<div class="alert alert-success" role="alert">
			  L'édition s'est effectée correctement. Vous allez être redirigé(e)
			</div>	
		</div>
		<div class="row hidden-alert" id="alert-danger">
			<div class="alert alert-danger" role="alert">
			  L'édition du produit est en cours par un autre utilisateur. Veuillez revenir ultérieurement.
			</div>	
		</div>
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
					<form id="updateForm">
						<div class="form-group">
							<label for="description">Description :</label>
							<textarea class="form-control" id="description" name="description" required><?= $product->getDescription() ?></textarea>
						</div>
						<div class="form-group">
							<label for="price">Prix : </label>
							<div class="input-group">
								<input class="form-control" type="number" step="0.01" id="price" name="price" value="<?= $product->getPrice() ?>" required>
								<div class="input-group-append">
									<span class="input-group-text">€</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<input type="hidden" name="id" value="<?= $product->getId() ?>">
							<button id="editButton" type="submit" class="btn btn-success btn-details">Valider</button>
						</div>
					</form>
				</p>
			</div>
		</div>
		</div>
	</div>

	<?php
	require(__DIR__.'/footer.php');
	?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript">
  	$(document).ready(function (){
  		isEdited = $('#isEdited').val();
  		if(isEdited == true){
  			$('#alert-danger').show();
  			$('#editButton').text("En cours d'édition").prop('disabled', true);
  		}else{
	  		$('#updateForm').submit(function (e){
	  			e.preventDefault();
	  			$('#editButton').text("Veuillez patienter ...").prop('disabled', true);
	  			var dataflow = $('#updateForm').serialize();
	  			$.post('editionSubmit.php', dataflow, function (data){
	  				$('#alert-success').show();
		  			$('#editButton').text("Valider").prop('disabled', false);
		  			setTimeout(function() {
		  				window.location.replace("../index.php");
						}, 3000);
	  			});
	  		});
  		}
  	});
  </script>

</body>
</html>