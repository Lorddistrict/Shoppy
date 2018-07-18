<?php
require(__DIR__.'/../init.php');
require(__DIR__.'/../vendor/autoload.php');

class Product {
	private $_id;
	private $_name;
	private $_price;
	private $_description;
	private $_picture;
	private $_isEdited;

	/**
	* description
	*
	* $id is set as null in case you want to create a new Product but you don't have to set
	*	any id number. However you need to get $id for searching product's information.
	**/

	public function __construct(string $name, float $price, string $description, string $picture, bool $isEdited, $id = null){
		$this->_name = $name;
		$this->_price = $price;
		$this->_description = $description;
		$this->_picture = $picture;
		$this->_isEdited = $isEdited;
		$this->_id = $id;
	}

	public function setName(string $name){
		$this->_name = $name;
	}
	public function getName(): string
	{
		return $this->_name;
	}

	public function setPrice(float $price){
		$this->_price = $price;
	}
	public function getPrice(): float
	{
		return $this->_price;
	}

	public function setDescription(string $description){
		$this->_description = $description;
	}
	public function getDescription(): string
	{
		return $this->_description;
	}

	public function setPicture(string $picture){
		$this->_picture = $picture;
	}
	public function getPicture(): string
	{
		return $this->_picture;
	}

	public function setIsEdited(bool $isEdited){
		$this->_isEdited = $isEdited;
	}
	public function isEdited(): bool
	{
		return $this->_isEdited;
	}

	public function getId(){
		return $this->_id;
	}

	/**
	* If the id is null (product created from zero), save this instance
	* otherwise, update it.
	**/
	public function save(){
		if (is_null($this->_id)){
			getDb()->insert('product', [
		    'name' => $this->_name,
		    'price' => $this->_price,
		    'description' => $this->_description,
		    'picture' => $this->_picture,
		  	'isEdited' => $this->_isEdited
		  ]);
		}else{
			getDb()->update('product', [
			    'name' => $this->_name,
			    'price' => $this->_price,
			    'description' => $this->_description,
			    'picture' => $this->_picture,
			    'isEdited' => $this->_isEdited
			], ['id' => $this->_id]);
		}

	}

	/**
	* description
	*
	* @param id : id of the product selected
	*	@return Product
	**/
	public static function find(int $id): Product {
		$product = getDb()->select('product', '*', ['id' => $id])[0];
		return new Product($product['name'], floatval($product['price']), $product['description'], $product['picture'], $product['isEdited'], $product['id']);
	}

	/**
	* @return Product[]
	**/
	public static function getAll() {
		$productList = getDb()->select('product', "*");
		$products = [];
		foreach ($productList as $produit){
			$products[] = new Product($produit['name'], $produit['price'], $produit['description'], $produit['picture'], (bool) $produit['isEdited'], $produit['id']);
		}
		return $products;
	}
}