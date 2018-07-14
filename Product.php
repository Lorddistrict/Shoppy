<?php

require 'Database.php';
require 'vendor/autoload.php';

class Product {
	private $_id;
	private $_name;
	private $_price;
	private $_desc;
	private $_picture;

	/**
	* description
	*
	* $id is set as null in case you want to create a new Product but you don't have to set
	*	any id number. However you need to get $id for searching product's informations.
	**/

	public function __construct(string $name, float $price, string $desc, string $picture, $id = null){
		$this->_name = $name;
		$this->_price = $price;
		$this->_desc = $desc;
		$this->_picture = $picture;
		$this->_id = $id;
	}

	public function getId(){
		return $this->_id;
	}

	public function setName(string $name){
		$this->_name = $name;
	}
	public function getName(): string
	{
		return $this->_name;
	}

	public function setPrice(float $price){
		$this->_price=$price;
	}
	public function getPrice(): float
	{
		return $this->_price;
	}

	public function setDesc(string $desc){
		$this->_desc = $desc;
	}
	public function getDesc(): string
	{
		return $this->_desc;
	}

	public function setPicture(string $picture){
		$this->_picture = $picture;
	}
	public function getPicture(): string
	{
		return $this->_picture;
	}

	/**
	* If the id is null (product created from zero), save this instance
	* otherwise, update it.
	**/
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

	/**
	* description
	*
	* @param id : id of the product selected
	*	@return Product
	**/
	public static function find(int $id): Product {
		$product = getDb()->select('product', '*', ['idProduct' => $id])[0];
		return new Product($product['nameProduct'], floatval($product['priceProduct']), $product['descProduct'], $product['pictureProduct'], $product['idProduct']);
	}

	/**
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
}