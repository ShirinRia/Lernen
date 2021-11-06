<?php
  class opt{
    private $db;
    
    function __construct($conn){
          $this->db = $conn;
         
    }
      public function otp($email,$otp){
       
       try {
        $sql = "select * from sign where email = :email AND OTP= :otp";
        $stmt = $this->db->prepare($sql);

        $stmt->bindparam(':email',$email);
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
      public function u_otp($email,$otp){
        echo 'otp success';

       try{ 
        $sql = "UPDATE `sign` SET `OTP`=:otp WHERE email=:email ";
        $stmt = $this->db->prepare($sql);
        // bind all placeholders to the actual values
        $stmt->bindparam(':email',$email);
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