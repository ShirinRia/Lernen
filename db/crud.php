<?php
  class crud{
      private $db;
      function __construct($conn){
            $this->db = $conn;
      }
      
      public function insert($full,$user,$pass,$email,$gender,$otp){
       try {
        $sql = "select * from sign where  username = :user OR email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':user',$user);
        $stmt->bindparam(':email',$email);
        $stmt->execute();
        $reslt = $stmt->rowCount();
       if($reslt==0)
      {

        $sql = "INSERT INTO sign (fullname, username, passwor, email, gender,OTP) VALUES (:full, :user, :pass, :email, :gender,:otp)";
        $stmt = $this->db->prepare($sql);

        $stmt->bindparam(':full',$full);
        $stmt->bindparam(':user',$user);
        $stmt->bindparam(':pass',$pass);
        $stmt->bindparam(':email',$email);
        $stmt->bindparam(':gender',$gender);
        $stmt->bindparam(':otp',$otp);

        $stmt->execute();
        return true;
       }
       
      }
       catch (PDOException $e) {
         echo $e->getMessage();
         return false;
       }
      }
      public function inserttcr($full,$user,$pass,$email,$gender,$otp){
        try {
         $sql = "select * from sign where  username = :user OR email = :email";
         $stmt = $this->db->prepare($sql);
         $stmt->bindparam(':user',$user);
         $stmt->bindparam(':email',$email);
         $stmt->execute();
         $reslt = $stmt->rowCount();
        if($reslt==0)
       {
 
         
         $sql2 = "INSERT INTO teach (username,pass) VALUES ( :user, :pass)";
        
         
         $stmt = $this->db->prepare($sql2);
         $stmt->bindparam(':user',$user);
         $stmt->bindparam(':pass',$pass);
 
         $stmt->execute();
         return true;
        }
        
       }
        catch (PDOException $e) {
          echo $e->getMessage();
          return false;
        }
       }
      public function num(){
        try {
    
        $sql = "select * from sign ";
        $stmt = $this->db->prepare($sql);
       
        $stmt->execute();
        $reslt = $stmt->rowCount();
        echo  $reslt;
 
         return true;
        }
        
       
        catch (PDOException $e) {
          echo $e->getMessage();
          return false;
        }
       }
      
       public function data($user){
        
          try{
            $sql = "select * from sign where username = :user";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':user', $user);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
       }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
        
       }
       public function getcrsid($title){
        
        try{
          $sql = "select * from course where c_name = :title";
          $stmt = $this->db->prepare($sql);
          $stmt->bindparam(':title', $title);
          $stmt->execute();
          $result = $stmt->fetch();
          return $result;
     }catch (PDOException $e) {
          echo $e->getMessage();
          return false;
      }
      
     }
    
       public function crd(){
        try{
          $sql = "SELECT * FROM `course` ";
          $result = $this->db->query($sql);
          return $result;
      }catch (PDOException $e) {
          echo $e->getMessage();
          return false;
     }
      
     }
     public function best(){
      try{
        $sql = "SELECT * FROM `books` ";
        $result = $this->db->query($sql);
        return $result;
    }catch (PDOException $e) {
        echo $e->getMessage();
        return false;
   }
    
   }
   public function devlpmnt(){
    try{
      $sql = "SELECT * FROM `books` ";
      $result = $this->db->query($sql);
      return $result;
  }catch (PDOException $e) {
      echo $e->getMessage();
      return false;
 }
  
 }
 public function genknw(){
  try{
    $sql = "SELECT * FROM `books` ";
    $result = $this->db->query($sql);
    return $result;
}catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}

}
public function ilts(){
  try{
    $sql = "SELECT * FROM `books` ";
    $result = $this->db->query($sql);
    return $result;
}catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}

}
public function islamic(){
  try{
    $sql = "SELECT * FROM `books` ";
    $result = $this->db->query($sql);
    return $result;
}catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}

}
public function design(){
  try{
    $sql = "SELECT * FROM `books` ";
    $result = $this->db->query($sql);
    return $result;
}catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}

}
public function school(){
  try{
    $sql = "SELECT * FROM `books` ";
    $result = $this->db->query($sql);
    return $result;
}catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}

}
public function college(){
  try{
    $sql = "SELECT * FROM `books` ";
    $result = $this->db->query($sql);
    return $result;
}catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}

}
public function english(){
  try{
    $sql = "SELECT * FROM `books` ";
    $result = $this->db->query($sql);
    return $result;
}catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}

}
     public function crslst($cat){
      try{
        $sql = "SELECT * FROM `course` where category=$cat";
        $result = $this->db->query($sql);
        return $result;
    }catch (PDOException $e) {
        echo $e->getMessage();
        return false;
   }
    
   }
     public function catgry(){
      try{
        $sql = "SELECT * FROM `crs_cat` ";
        $result = $this->db->query($sql);
        return $result;
    }catch (PDOException $e) {
        echo $e->getMessage();
        return false;
   }
    
   }
   public function section(){
    try{
     // $sql = "SELECT * FROM `section` where crs_id=34";
      $sql = "SELECT * FROM `section` a inner join course s on a.crs_id = s.c_id";
      $stmt = $this->db->prepare($sql);

      $result = $this->db->query($sql);
      return $result;
  }catch (PDOException $e) {
      echo $e->getMessage();
      return false;
 }
  
 }

 public function quiz(){
  try{
    $sql = "SELECT * FROM `quiz` where crs_id=63";
    $result = $this->db->query($sql);
    return $result;
}catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}

}

     public function delete($usr){
      try{
           $sql = "delete from sign where username = :user";
           $stmt = $this->db->prepare($sql);
           $stmt->bindparam(':user', $usr);
           $stmt->execute();
           return true;
       }catch (PDOException $e) {
           echo $e->getMessage();
           return false;
       }
   }

   public function updtusrdata($n,$em,$mb,$bd,$cn,$destination){
    echo 'otp success';

   try{ 
    $sql = "UPDATE `sign` SET `mobile`=:mbl, `fullname`=:nam, `country`=:cntry, `bdate`=:dt, `img_path`=:img WHERE email=:em";
    $stmt = $this->db->prepare($sql);
    // bind all placeholders to the actual values
    $stmt->bindparam(':nam',$n);
    $stmt->bindparam(':mbl',$mb);
    $stmt->bindparam(':dt',$bd);
    $stmt->bindparam(':cntry',$cn);
    $stmt->bindparam(':em',$em);
    
    $stmt->bindparam(':img',$destination);
    // execute statement
    $stmt->execute();
    return true;
    }
    catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }

  public function insertcrs($title,$descrip,$sec,$destination,$cat){
    try {
    

     $sql = "INSERT INTO course (c_name,category, des, sectn, img_path	) VALUES (:title, :cat, :descrip, :sectn, :img)";
     $stmt = $this->db->prepare($sql);

     $stmt->bindparam(':title',$title);
     $stmt->bindparam(':cat',$cat);
     $stmt->bindparam(':descrip',$descrip);
     $stmt->bindparam(':sectn',$sec);
     $stmt->bindparam(':img',$destination);

     $stmt->execute();
     return true;
    }

    catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
   }
   public function insertsec($title,$id,$destination){
    try {
    

     $sql = "INSERT INTO section (name, crs_id, video) VALUES (:title, :id, :vdo)";
     $stmt = $this->db->prepare($sql);

     $stmt->bindparam(':title',$title);
     $stmt->bindparam(':id',$id);
     $stmt->bindparam(':vdo',$destination);

     $stmt->execute();
     return true;
    }

    catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
   }
   public function insertqz($q,$id){
    try {
    

     $sql = "INSERT INTO quiz (link, crs_id) VALUES (:quiz, :id)";
     $stmt = $this->db->prepare($sql);

     $stmt->bindparam(':quiz',$q);
     $stmt->bindparam(':id',$id);

     $stmt->execute();
     return true;
    }

    catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
   }
   public function insertbooks( $title,$descrip,$price,$author,$cat){
    try {
    

     $sql = "INSERT INTO books (bname,bdes,bprice,aname,bcat) VALUES (:title, :descrip, :price, :author, :cat)";
     $stmt = $this->db->prepare($sql);

     $stmt->bindparam(':title',$title);
     $stmt->bindparam(':cat',$cat);
     $stmt->bindparam(':price',$price);
     $stmt->bindparam(':descrip',$descrip);
     $stmt->bindparam(':author',$author);
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