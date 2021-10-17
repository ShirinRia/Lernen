<?php
  class opt{
    private $db;
    
    function __construct($conn){
          $this->db = $conn;
         
    }
      public function otp($user,$otp){
       
       try {
        $sql = "select * from sign where username = :user AND OTP= :otp";
        $stmt = $this->db->prepare($sql);

        $stmt->bindparam(':user',$user);
        $stmt->bindparam(':otp',$otp);
       
        $stmt->execute();
        $result=$stmt->fetch();
        return $result;
       } 
       catch (PDOException $e) {
         echo $e->getMessage();
         return false;
       }
      }
      public function u_otp($user,$otp){
        echo 'otp success';

       try{ 
        $sql = "UPDATE `sign` SET `OTP`=:otp WHERE username=:user ";
        $stmt = $this->db->prepare($sql);
        // bind all placeholders to the actual values
        $stmt->bindparam(':user',$user);
        $stmt->bindparam(':otp',$otp);
        // execute statement
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