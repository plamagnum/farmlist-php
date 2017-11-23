<?php

require LIB_PATH . '/Model.php';

class linksList extends Model{

   private $id = null;
   private $name = null;
   private $link = null;

   function __construct(){
      
      parent::__construct($id = null);

      if($id){
         $id = int($id);
         $list = $this->db->query("SELECT * FROM list WHERE $id=". $id)
                          ->fetch();
         if(count($list) == 0) throw new Exception("No links" . $id);
      }
   }

   public function getAll(){
     $list = $this->db->query("SELECT * FROM list")->fetchAll();
     foreach($list as $row){
         echo "<a href=".$row['link'].">".$row['name']."</a>"."<form method=\"POST\" action=\"\">"."<button type=\"submit\" name=\"send\" value=".$row['id'].">Delete</button>"."</form>"."<br>";
     } 
   }

   public function delete($id){
      $del = $this->db->query("DELETE FROM list WHERE id='$id'");
   }
   
   public function save($name, $link){
      
      $save = $this->db->prepare("INSERT INTO list (id, name, link) VALUES (:_id, :_name, :_link)");
      $save->bindParam(':_id', $id);
      $save->bindParam(':_name', $name);
      $save->bindParam(':_link', $link);
      $save->execute();

   }

   public function getNoactive(){

      $noactive = $this->db->query("SELECT * FROM list WHERE type='1'")->fetchAll();
      foreach($noactive as $row){
         echo "<a href=".$row['link'].">".$row['name']."</a>"."<form method=\"POST\" action=\"\">"."<button type=\"submit\" name=\"send\" value=".$row['id'].">Delete</button>"."</form>"."<br>";
      }

   }

}

?>
