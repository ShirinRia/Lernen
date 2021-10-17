
<?php
       
  class login{
    
    private $db;
    function __construct($conn){
          $this->db = $conn;
          
    }
    public function insertUser($username,$password){
      try {
          $result = $this->getUserbyUsername($username);
          if($result['num'] > 0){
              return false;
          } else{
              $new_password = md5($password.$username);
              // define sql statement to be executed
              $sql = "INSERT INTO users (username,password) VALUES (:username,:password)";
              //prepare the sql statement for execution
              $stmt = $this->db->prepare($sql);
              // bind all placeholders to the actual values
              $stmt->bindparam(':username',$username);
              $stmt->bindparam(':password',$new_password);
              
              // execute statement
              $stmt->execute();
              return true;
          }
          
  
      } catch (PDOException $e) {
          echo $e->getMessage();
          return false;
      }
  }
  public function getUserbyUsername($username){
    try{
        $sql = "select count(*) as num from users where username = :username";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':username',$username);
        
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
    }
}


      public function getuser($user,$pass){
        
       try {
    
        $sql = "select * from sign where username = :user AND passwor = :pass";
        $stmt = $this->db->prepare($sql);

        $stmt->bindparam(':user',$user);
        $stmt->bindparam(':pass',$pass);
       
        $stmt->execute();
        $result=$stmt->fetch();
        return true;
       } 
       catch (PDOException $e) {
         echo $e->getMessage();
         return false;
       }
      }
  }
?>