<?php

require LIB_PATH . '/View.php';
require APPLICATION_PATH . '/models/linksModel.php';


class formController{

   public function formAction(){
      //echo "It`s OK";
      $view = new View('form');
      $view->render();
   }

   public static function show(){
      $a = new linksList();
      $a->getAll();
   }
}

?>
