<?php
require 'Product.php';
$product = Product::find($_POST['id']);

if(isset($_POST['desc']) && isset($_POST['price']))
{
	$desc = htmlspecialchars($_POST['desc']);
	$price = htmlspecialchars($_POST['price']);

	$product->setDesc($desc);
	$product->setPrice($price);
	$product->save();
}

