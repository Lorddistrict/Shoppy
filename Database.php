<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * @author Who knows :)
 */

require 'init.php';


class Database {
  private static function connexion(){
    try{
      $bdd = new PDO(getenv('DB_TYPE').':host='.getenv('DB_HOST').';dbname='.getenv('DB_NAME').';charset=utf8', getenv('DB_USERNAME'), getenv('DB_PASS'));
      return $bdd;
    }catch (Exception $e){
      die('Erreur : ' . $e->getMessage());
    }
  } 
}