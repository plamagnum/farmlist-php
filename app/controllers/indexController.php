<?php

session_start();

require LIB_PATH . '/View.php';
require APPLICATION_PATH . '/models/linksModel.php';
//require APPLICATION_PATH . '/models/userModel.php';


class indexController{

   public function indexAction(){
      //echo "It`s OK";
      $view = new View('index');
      $view->render();
   }

   public function formAction(){
      $view = new View('form');
      $view->render();

      if(isset($_POST['submit'])){
         $name = $_POST['name'];
         $link = $_POST['link'];

         $new = new linksList();
         $new->save($name, $link);

         header("Location: /index");
         
      }
   }

   public static function delAction(){
      
      if(isset($_POST['send'])){
         $id = $_POST['send'];
         
         $del = new linksList();
         $del->delete($id);
                                             
         header("Location: /index");
      }
   }

   public static function show(){
      $a = new linksList();
      $a->getAll();
   }
   
   public static function logged(){
      if(isset($_SESSION['user_session'])){
         return true;
      } 
   }

   public function logOutAction(){
         
      if(isset($_GET['logout'])){
         userModel::logout();
         header("Location: /user");
      }
   }
   
   public function noactiveAction(){
      
      if(isset($_GET['noactive'])){
      $view = new View('noactive');
      $view->render();
      //if(isset($_GET['noactive'])){
         $no = new linksList();
         $no->getNoactive(); 
      }
   }
} 

?>
