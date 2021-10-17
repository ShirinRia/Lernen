<?php
  class login{
    private $db;
    function __construct($conn){
          $this->db = $conn;
    }
      public function getuser($user,$pass){
       try {
        $sql = "select * from sign where username = :user AND passwor = :pass";
        $stmt = $this->db->prepare($sql);

        $stmt->bindparam(':user',$user);
        $stmt->bindparam(':pass',$pass);
       
        $stmt->execute();
        $result=$stmt->fetch();
        return $result;
       } 
       catch (PDOException $e) {
         echo $e->getMessage();
         return false;
       }
      }
  }
?>