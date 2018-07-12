<?php

require 'Database.php';
require 'vendor/autoload.php';

class Product {
	private $_id = null;
	private $_name;
	private $_price;
	private $_desc;
	private $_picture;


	public function __construct(string $name, double $price, string $desc, string $picture){
		$this->_name = $name;
		$this->_price = $price;
		$this->_desc = $desc;
		$this->_picture = $picture;
	}

	public function setPrice(double $price){
		$this->_price=$price;
	}



	public function save(){
		if (is_null($this->_id)){
			$this->_id=Database::exec('INSERT INTO produit (libelleProduit, prixProduit, descProduit) VALUES ("'.$this->_name.'", "'.$this->_price.'", "'.$this->_desc.'","'.$this->_picture.'"");');
		}else{
			Database::exec('UPDATE produit SET libelleProduit="'.$this->_name.'", prixProduit="'.$this->_price.'", descProduit="'.$this->_desc.'", imageProduit="'.$this->_picture.'" WHERE id='.$this->_id.';');
		}
	}

	/////////

	public function doSomething(){
		$ticket = new Ticket("Nom", 50, "description", "pic.png");
		$ticket->save();




		$ticket->srtPrice(100);
		$ticket->save();
	}

}
