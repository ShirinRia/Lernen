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
      public function getem($em){
        try {
         $sql = "select * from sign where username = :user AND otpmtch='Not Match'";
         $stmt = $this->db->prepare($sql);
 
         $stmt->bindparam(':user',$em);
        
         $stmt->execute();
         $result=$stmt->fetch();
         
         return $result;
        } 
        catch (PDOException $e) {
          echo $e->getMessage();
          return false;
        }
       }

      public function gettchr($user,$pass,$typ){
        try {
         $sql = "select * from sign where username = :user  AND type = :typ AND passwor = :passwor" ;
         $stmt = $this->db->prepare($sql);
 
         $stmt->bindparam(':user',$user);
         $stmt->bindparam(':passwor',$pass);
         $stmt->bindparam(':typ',$typ);
         $stmt->execute();
         $result=$stmt->fetch();
         return $result;
         echo $typ;
        } 
        catch (PDOException $e) {
          echo $e->getMessage();
          return false;
        }
       }
       public function getemail($email,$otp){
        try {
         $sql = "select * from sign where email = :email";
         $stmt = $this->db->prepare($sql);
 
         $stmt->bindparam(':email',$email);
         $stmt->execute();
         $result=$stmt->fetch();
         $reslt = $stmt->rowCount();
         if($reslt>0){
          $sql2 = "UPDATE `sign` SET  `otp`=:otp WHERE email=:email";
          $stmt = $this->db->prepare($sql2);
          $stmt->bindparam(':email',$email);
          $stmt->bindparam(':otp',$otp);
          $stmt->execute();
         }
         return $result;
        } 
        catch (PDOException $e) {
          echo $e->getMessage();
          return false;
        }
       }
       public function updtpass($usser,$newpass){
        try {
        
 
          $sql = "UPDATE `sign` SET  `passwor`=:newpass WHERE username=:usr";
    
         $stmt = $this->db->prepare($sql);
 
         $stmt->bindparam(':usr',$usser);
         $stmt->bindparam(':newpass',$newpass);
         $stmt->execute();
         return true;

       }
        catch (PDOException $e) {
          echo $e->getMessage();
          return false;
        }
       }
  }
?>