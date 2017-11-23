<?php

class Model {

   const DB_ADAPTER = 'mysql';
   const DB_HOST = 'localhost';
   const DB_NAME = 'farm';
   const DB_LOGIN = 'root';
   const DB_PASSWORD = 'root13';

   protected $db;

   public function __construct(){
      
      $this->db = new PDO(Model::DB_ADAPTER . ':host=' . Model::DB_HOST . ';dbname=' . Model::DB_NAME, Model::DB_LOGIN, Model::DB_PASSWORD);
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   }
}

?>
