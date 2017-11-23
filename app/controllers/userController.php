<?php
require APPLICATION_PATH . '/models/linksModel.php';

session_start();

require LIB_PATH . '/View.php';
require APPLICATION_PATH . '/models/userModel.php';


class userController {


   public function indexAction(){
      $view = new View('user');
      $view->render(); 
   }
   
   public function registerAction(){
      $view = new View('user');
      $view->render();

      if(isset($_POST['submit'])){
         $login = $_POST['login'];
         $email = $_POST['email'];
         $password = md5($_POST['password']);

         $reg = new userModel();
         $reg->register($login, $email, $password);

         header("Location: /user");
      }
   }   

   public function loginAction(){
      $view = new View('login');
      $view->render();

      if(isset($_POST['submit'])){
         $login = $_POST['login'];
         $password = $_POST['password'];
         
         $logIn = new userModel();
         if($logIn->login($login, $password)){
              header("Location: /index"); 
         }else{
            header("Location: /user/login");
            echo "Wrong";
         }
      }
   }
   
   public function logOutAction(){
         
      if(isset($_GET['logout'])){
         userModel::logout();
         header("Location: /user/login");
      }
   }


      
}


?>
