<?php
require(__DIR__.'/../class/Product.php');

$product = Product::find($_POST['id']);
if($product != null){
	if(isset($_POST['description']) && isset($_POST['price']))
	{
		$desc = htmlspecialchars($_POST['description']);
		$price = htmlspecialchars($_POST['price']);

		$product->setDescription($desc);
		$product->setPrice($price);
		$product->setIsEdited(false);
		$product->save();
	}
}else{
	// If my object is null
}