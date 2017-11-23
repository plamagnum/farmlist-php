<?php

session_start();

require LIB_PATH . '/Model.php';

class userModel extends Model{

   public function __construct(){
      parent::__construct();
   }
   

   public function register($login, $email, $password){
   
      $reg = $this->db->prepare("INSERT 
         INTO users (id, login, email, password) VALUES (:_id, :_login, :_email, :_password)");
      $reg->bindParam(':_id', $id);  
      $reg->bindParam(':_login', $login);  
      $reg->bindParam(':_email', $email);  
      $reg->bindParam(':_password', $password);
      $reg->execute();  
   }

   public function login($login, $password){

      $log = $this->db->prepare("SELECT * FROM users WHERE login=:_login OR password=:_password LIMIT 1");
      $log->execute(array(":_login" => $login, 
                          ":_password" => $password));
      $logRow = $log->fetch(PDO::FETCH_ASSOC);
      if($log->rowCount() > 0){
         if($logRow['password'] === md5($password)){
            $_SESSION['user_session'] = $logRow['id'];
            return true;
            //echo $_SESSION['user_session'];
         }else{
            return false;
         }   
      }
   }

   public function isLogged(){

      if(isset($_SESSION['user_session'])){
         return true;
      }
      
   }

   public static function logout(){
      session_destroy();
      unset($_SESSION['user_session']);
      return true;
   }   

}   


?>
