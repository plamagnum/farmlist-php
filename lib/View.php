<?php

class View{

   public $data;
   private $path;

   public function __construct($path){
   
      $path = APPLICATION_PATH . '/view/' . $path . '.php';
      //$css = APPLICATION_PATH . '/css/style.css';

      if(!is_file($path)) throw new InvalidArgumenException("Np view" . $path);

      $this->path = $path;
      //$this->css = $css;
      $this->data = new ArrayObject();
   }

   public function render(){

      include $this->path;
   }

}

?>
