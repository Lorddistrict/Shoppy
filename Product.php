<?php

require 'Database.php';
require 'vendor/autoload.php';

class Product {
	private $_id;
	private $_name;
	private $_price;
	private $_desc;
	private $_picture;


	public function __construct(string $name, float $price, string $desc, string $picture, $id = null){
		$this->_name = $name;
		$this->_price = $price;
		$this->_desc = $desc;
		$this->_picture = $picture;
		$this->_id = $id;
	}

	// Get Id
	public function getId(){
		return $this->_id;
	}

	// Get / Set Libellé
	public function setName(string $name){
		$this->_name = $name;
	}
	public function getName(): string
	{
		return $this->_name;
	}

	// Get / Set Prix
	public function setPrice(float $price){
		$this->_price=$price;
	}
	public function getPrice(): float
	{
		return $this->_price;
	}

	// Get / Set Description
	public function setDesc(string $desc){
		$this->_desc = $desc;
	}
	public function getDesc(): string
	{
		return $this->_desc;
	}

	// Get / Set Picture
	public function setPicture(string $picture){
		$this->_picture = $picture;
	}
	public function getPicture(): string
	{
		return $this->_picture;
	}

	public function save(){
		if (is_null($this->_id)){
			getDb()->insert('product', [
		    'nameProduct' => $this->_name,
		    'priceProduct' => $this->_price,
		    'descProduct' => $this->_desc,
		    'pictureProduct' => $this->_picture]);
		}else{
			getDb()->update('product', [
			    'nameProduct' => $this->_name,
			    'priceProduct' => $this->_price,
			    'descProduct' => $this->_desc,
			    'pictureProduct' => $this->_picture
			], ['idProduct' => $this->_id]);
		}

	}

	// Mais c'est un mélange entre ton truc lenaic et Medoo non ?

	public static function find(int $id): Product {
		$product = getDb()->select('product', '*', ['idProduct' => $id])[0];
		return new Product($product['nameProduct'], floatval($product['priceProduct']), $product['descProduct'], $product['pictureProduct']);
	}

	/*
	* @return Product[]
	**/
	public static function getAll() {
		$productList = getDb()->select('product', "*");
		$products = [];
		foreach ($productList as $produit){
			$products[]=new Product($produit['nameProduct'], $produit['priceProduct'], $produit['descProduct'], $produit['pictureProduct'], $produit['idProduct']);
		}
		return $products;
	}

	// test
	public function doSomething(){
		$product = new Product("Nom", 50, "description", "pic.png");
		$product->save();
		$product->setPrice(100);
		$product->save();
	}
}