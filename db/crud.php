<?php
  class crud{
      private $db;
      function __construct($conn){
            $this->db = $conn;
      }
      
      public function insert($email,$otp,$user){
       try {
        $sql = "select * from sign where   email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':email',$email);
        $stmt->execute();
        $reslt = $stmt->rowCount();
       if($reslt==0)
      {

        $sql = "INSERT INTO sign (email,OTP,username) VALUES (:email, :otp, :user)";
        $stmt = $this->db->prepare($sql);

        $stmt->bindparam(':email',$email);
        $stmt->bindparam(':otp',$otp);
        $stmt->bindparam(':user',$user);
        $stmt->execute();
        return true;
       }
       
      }
       catch (PDOException $e) {
         echo $e->getMessage();
         return false;
       }
      }
      public function insertt($full,$user,$pass,$gender,$type,$em,$mn){
        try {
        
 
          $sql = "UPDATE `sign` SET `username`=:user, `fullname`=:full, `passwor`=:pass, `gender`=:gender, `type`=:type, `otpmtch`=:mn WHERE email=:em";
    
         $stmt = $this->db->prepare($sql);
 
         $stmt->bindparam(':full',$full);
         $stmt->bindparam(':user',$user);
         $stmt->bindparam(':pass',$pass);
         $stmt->bindparam(':gender',$gender);
         $stmt->bindparam(':type',$type);
         $stmt->bindparam(':em',$em);
         $stmt->bindparam(':mn',$mn);
         $stmt->execute();
         return true;

       }
        catch (PDOException $e) {
          echo $e->getMessage();
          return false;
        }
       }
       public function updtstts($user,$cid){
        try {
        
 
          $sql = "UPDATE `registration` SET `status`='done' WHERE user=:user AND c_id=:cid";
    
         $stmt = $this->db->prepare($sql);
         $stmt->bindparam(':user',$user);
         $stmt->bindparam(':cid',$cid);
    
         $stmt->execute();
         return true;

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
       public function tnum(){
        try {
    
        $sql = "select * from sign where type= 'Teacher' ";
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
       public function lnum(){
        try {
    
        $sql = "select * from sign where type= 'Learner' ";
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
       public function cnum(){
        try {
    
        $sql = "select * from course ";
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
       public function snum($cid){
        try {
    
        $sql = "select * from registration where c_id=:cid";
        $stmt = $this->db->prepare($sql);
       
        $stmt->bindparam(':cid',$cid);
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
       public function total_course($user){
        try {
    
        $sql = "select * from registration where user = :user";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':user',$user);
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
       public function completed_course($user){
        try {
    
        $sql = "select * from registration where user = :user AND status='done'";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':user',$user);
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
       public function in_progress_course($user){
        try {
    
        $sql = "select * from registration where user = :user AND status='In progress'";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':user',$user);
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
       public function bkdata($id){
        
        try{
          $sql = "select * from books where bid = :bid";
          $stmt = $this->db->prepare($sql);
          $stmt->bindparam(':bid', $id);
          $stmt->execute();
          $result = $stmt->fetch();
          return $result;
     }catch (PDOException $e) {
          echo $e->getMessage();
          return false;
      }
      
     }
       public function search($data){
        
        try{
          $sql = "SELECT * FROM `course` WHERE c_name=:data";
          $result = $this->db->prepare($sql);
          $executerrecord=$result->execute(array(":data"=>$data));
          return $executerrecord;
       
     }catch (PDOException $e) {
          echo $e->getMessage();
          return false;
      }
      
     }

       public function enrl($cid){
        
        try{
          $sql = "select * from course where c_id = :id";
          $stmt = $this->db->prepare($sql);
          $stmt->bindparam(':id', $cid);
          $stmt->execute();
          $result = $stmt->fetch();
          return $result;
     }catch (PDOException $e) {
          echo $e->getMessage();
          return false;
      }
      
     }
     public function descrption($id){
        
      try{
        $sql = "select * from course where c_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':id', $id);
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
          $sql = "select * from course where month(Date)=month(now());";
          $result = $this->db->query($sql);
          return $result;
      }catch (PDOException $e) {
          echo $e->getMessage();
          return false;
     }
      
     }
     public function high(){
      try{
        $sql = "SELECT * FROM registration,course where registration.c_id=course.c_id GROUP BY registration.c_id HAVING COUNT(registration.c_id)>0;";
        $result = $this->db->query($sql);
        return $result;
    }catch (PDOException $e) {
        echo $e->getMessage();
        return false;
   }
    
   }
     public function status($tid){
      try{
        $sql = "select * from course where tid=$tid";
        $result = $this->db->query($sql);
        return $result;
    }catch (PDOException $e) {
        echo $e->getMessage();
        return false;
   }
    
   }
   public function stdntnum($crsid){
    try {

    $sql = "select * from registration where c_id=$crsid ";
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
   public function ttlstdntnum($tcrid){
    try {

    $sql = "select * from registration where tcr_id=$tcrid ";
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
     public function mycrs($uid){
      try{
      $sql = "SELECT * FROM registration,course where usrid=$uid AND registration.c_id=course.c_id";
      // $sql = "SELECT * FROM registration where usrid=$uid";
        $result = $this->db->query($sql);
        return $result;
    }catch (PDOException $e) {
        echo $e->getMessage();
        return false;
   }
    
   }
   public function myarchv($uid){
    try{
      $sql = "SELECT * FROM archive,course where usr_id=$uid AND cid=c_id";
      $result = $this->db->query($sql);
      return $result;
  }catch (PDOException $e) {
      echo $e->getMessage();
      return false;
 }
  
 }
 public function vdo($id){
  try{
    $sql = "SELECT * FROM slide where cid=$id";
    $result = $this->db->query($sql);
    return $result;
}catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}

}
     public function best(){
      try{
        $sql = "SELECT * FROM `books`WHERE bcat='Academic(College)' ";
        $result = $this->db->query($sql);
        return $result;
    }catch (PDOException $e) {
        echo $e->getMessage();
        return false;
   }
    
   }
   public function devlpmnt(){
    try{
      $sql = "SELECT * FROM `books`WHERE bcat='Development' ";
      $result = $this->db->query($sql);
      return $result;
  }catch (PDOException $e) {
      echo $e->getMessage();
      return false;
 }
  
 }
 public function genknw(){
  try{
    $sql = "SELECT * FROM `books`WHERE bcat='GK' ";
    $result = $this->db->query($sql);
    return $result;
}catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}

}
public function ilts(){
  try{
    $sql = "SELECT * FROM `books`WHERE bcat='IELTS' ";
    $result = $this->db->query($sql);
    return $result;
}catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}

}
public function islamic(){
  try{
    $sql = "SELECT * FROM `books`WHERE bcat='Islam Shikkha' ";
    $result = $this->db->query($sql);
    return $result;
}catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}

}
public function design(){
  try{
    $sql = "SELECT * FROM `books`WHERE bcat='Design' ";
    $result = $this->db->query($sql);
    return $result;
}catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}

}
public function school(){
  try{
    $sql = "SELECT * FROM `books`WHERE bcat='Academic(School)' ";
    $result = $this->db->query($sql);
    return $result;
}catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}

}
public function college(){
  try{
    $sql = "SELECT * FROM `books`WHERE bcat='Academic(College)'";
    $result = $this->db->query($sql);
    return $result;
}catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}

}
public function english(){
  try{
    $sql = "SELECT * FROM `books`WHERE bcat='Academic(College)' ";
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
   
   public function allcrslst(){
    try{
      $sql = "SELECT * FROM `course` ";
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
   public function section($id){
    try{
     // $sql = "SELECT * FROM `section` where crs_id=34";
      $sql = "SELECT * FROM `section` a inner join course s on a.crs_id = s.c_id where crs_id=$id";
      $stmt = $this->db->prepare($sql);

      $result = $this->db->query($sql);
      return $result;
  }catch (PDOException $e) {
      echo $e->getMessage();
      return false;
 }
  
 }


public function ecat($ctid){
        
  try{
    $sql = "select * from crs_cat where cat_id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindparam(':id', $ctid);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result;
}catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}

}
public function revew($id){
  try{
    $sql = "select * from review where cid = $id";
    $result = $this->db->query($sql);
    return $result;
}catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}

}


 public function quiz($id){
  try{
    $sql = "SELECT * FROM `quiz` where crs_id=$id";
    $result = $this->db->query($sql);
    return $result;
}catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}

}
public function questn($id){
  try{
    $sql = "SELECT * FROM `question` where cid=$id";
    $result = $this->db->query($sql);
    return $result;
}catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}

}
public function qustn($id){
  try{
    $sql = "SELECT id FROM `question` where cid=$id";
    $result = $this->db->query($sql);
    return $result;
}catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}

}
public function hstry($id){
  try{
    $sql = "SELECT * FROM `registration` where usrid=$id";
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
   public function mydlt($id,$uid){
    try{
      //SELECT * FROM archive,course where usr_id=$uid AND cid=c_id
         $sql = "delete from registration where c_id = :cid AND usrid=:id";
         $stmt = $this->db->prepare($sql);
         $stmt->bindparam(':id', $uid);
         $stmt->bindparam(':cid', $id);
         $stmt->execute();
         return true;
     }catch (PDOException $e) {
         echo $e->getMessage();
         return false;
     }
 }

   public function updtusrdata($n,$em,$mb,$bd,$cn,$destination,$ides){
    //echo 'otp success';

   try{ 
    $sql = "UPDATE `sign` SET `mobile`=:mbl, `fullname`=:nam, `country`=:cntry, `bdate`=:dt, `img_path`=:img, `ides`=:ides WHERE email=:em";
    $stmt = $this->db->prepare($sql);
    // bind all placeholders to the actual values
    $stmt->bindparam(':nam',$n);
    $stmt->bindparam(':mbl',$mb);
    $stmt->bindparam(':dt',$bd);
    $stmt->bindparam(':cntry',$cn);
    $stmt->bindparam(':em',$em);
    $stmt->bindparam(':ides',$ides);
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
  public function insertans($id,$ans,$cid){
   // echo 'otp success';

   try{ 
    $sql = "UPDATE `question` SET `ans`=:ans WHERE id=:aid AND cid=:crid";
    $stmt = $this->db->prepare($sql);
    // bind all placeholders to the actual values
    $stmt->bindparam(':ans',$ans);
    $stmt->bindparam(':aid',$id);
    $stmt->bindparam(':crid',$cid);
    // execute statement
    $stmt->execute();
    return true;
    }
    catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }
  public function insertcrs($title,$descrip,$destination,$cat,$tname,$tid,$lrn,$cdes){
    try {
    

     $sql = "INSERT INTO course (c_name,category, des,  img_path,tid, tname,learn, cdes	) VALUES (:title, :cat, :descrip,  :img,:tid, :tname,:lrn, :cdes)";
     $stmt = $this->db->prepare($sql);

     $stmt->bindparam(':title',$title);
     $stmt->bindparam(':cat',$cat);
     $stmt->bindparam(':descrip',$descrip);
     $stmt->bindparam(':img',$destination);
     $stmt->bindparam(':tid',$tid);
     $stmt->bindparam(':tname',$tname);
     $stmt->bindparam(':lrn',$lrn);
     $stmt->bindparam(':cdes',$cdes);

     $stmt->execute();
     return true;
    }

    catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
   }
   public function insertstr( $cid){
    try {
    

     $sql = "INSERT INTO stars (crs_id	) VALUES (:cid)";
     $stmt = $this->db->prepare($sql);

     $stmt->bindparam(':cid',$cid);

     $stmt->execute();
     return true;
    }

    catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
   }
   public function archive($id,$user,$usid,$tchr){
    try {
    

     $sql = "INSERT INTO archive (cid,user_nm,usr_id,tchr	) VALUES (:cid, :usr, :usrid, :tcr)";
     $stmt = $this->db->prepare($sql);

     $stmt->bindparam(':cid',$id);
     $stmt->bindparam(':usr',$user);
     $stmt->bindparam(':usrid',$usid);
     $stmt->bindparam(':tcr',$tchr);
     $stmt->execute();
     return true;
    }

    catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
   }

   public function insertreg($user,$crsid,$corsname,$teacrname,$uid,$tcr){
    try {
    
      $sql = "select * from registration where  user = :us AND c_id = :crsid";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':us',$user);
        $stmt->bindparam(':crsid',$crsid);
        $stmt->execute();
        $reslt = $stmt->rowCount();
        if($reslt==0)
      {
     $sql = "INSERT INTO registration (user, c_id, cors_name, tcr_name, usrid,tcr_id) VALUES (:user, :cid, :cors, :tcr, :usid,:tid)";
     $stmt = $this->db->prepare($sql);

     $stmt->bindparam(':user',$user);
     $stmt->bindparam(':cid',$crsid);
     $stmt->bindparam(':cors',$corsname);
     $stmt->bindparam(':tcr',$teacrname);
     $stmt->bindparam(':usid',$uid);
     $stmt->bindparam(':tid',$tcr);
     $stmt->execute();
     return true;
    }
  }
    catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
   }

   public function insertrvw($user,$crsid,$rvw){
    try {
    

     $sql = "INSERT INTO review (user, review, cid) VALUES (:user, :review, :cid)";
     $stmt = $this->db->prepare($sql);

     $stmt->bindparam(':user',$user);
     $stmt->bindparam(':cid',$crsid);
     $stmt->bindparam(':review',$rvw);
     $stmt->execute();
     return true;
    }

    catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
   }

   public function insertqus($user,$qs,$cid){
    try {
    

     $sql = "INSERT INTO question (user, ques, cid) VALUES (:user, :ques, :cid)";
     $stmt = $this->db->prepare($sql);

     $stmt->bindparam(':user',$user);
     $stmt->bindparam(':ques',$qs);
     
     $stmt->bindparam(':cid',$cid);
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
   public function insertsld($destination,$cid){
    try {
    

     $sql = "INSERT INTO slide (ansr,cid) VALUES (:destination,:cid)";
     $stmt = $this->db->prepare($sql);

     $stmt->bindparam(':destination',$destination);
     $stmt->bindparam(':cid',$cid);
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
   public function insertbooks( $title,$author,$cat,$pdf,$pub,$ed,$lang,$destination,$size){
    try {
    

     $sql = "INSERT INTO books (bname,aname,bcat,pdf,publshr,edtn,lang,img_path,size) VALUES (:title, :author, :cat, :pdf, :pub, :ed, :lang, :destination, :size)";
     
     $stmt = $this->db->prepare($sql);

     $stmt->bindparam(':title',$title);
     $stmt->bindparam(':cat',$cat);
     $stmt->bindparam(':author',$author);
     
     $stmt->bindparam(':pdf',$pdf);
     $stmt->bindparam(':pub',$pub);
     $stmt->bindparam(':ed',$ed);
     $stmt->bindparam(':destination',$destination);
     $stmt->bindparam(':lang',$lang);
     $stmt->bindparam(':size',$size);
     $stmt->execute();
     return true;
    }

    catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
   }
   public function ques($cid,$lvl){
    try{
      $sql = "SELECT * FROM questions where questions.crs_id=$cid AND level='$lvl'";
      $result = $this->db->query($sql);
      return $result;
  }catch (PDOException $e) {
      echo $e->getMessage();
      return false;
 }
  
 }
 public function crct($cid,$numbr,$level){
        
  try{
    $sql = "SELECT * FROM options WHERE options.crs_id=:cid AND question_number=:numbr AND is_correct=1 AND level ='$level';";
    $stmt = $this->db->prepare($sql);
    $stmt->bindparam(':numbr', $numbr);
    
    $stmt->bindparam(':cid', $cid);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result;
}catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}

}
public function usransr($numbr){
        
  try{
    $sql = "SELECT * FROM summry,options WHERE q_num=:numbr AND question_number=q_num AND ansr=id;";
    $stmt = $this->db->prepare($sql);
    $stmt->bindparam(':numbr', $numbr);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result;
}catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}

}
public function usrdlt(){
        
  try{
    $sql = "DELETE FROM `summry`";
    $stmt = $this->db->prepare($sql);
   
    $stmt->execute();
    $result = $stmt->fetch();
    return $result;
}catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}

}
public function ides($ides){
  try {
   $sql = "select * from sign where   user_id = :ides";
   $stmt = $this->db->prepare($sql);
   $stmt->bindparam(':ides',$ides);
   $stmt->execute();
   $result = $stmt->fetch();

   return $result;
  
 }
  catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
 }
 public function viewvdo($id){
  try {
   $sql = "select * from section where   crs_id = :id";
   $stmt = $this->db->prepare($sql);
   $stmt->bindparam(':id',$id);
   $stmt->execute();
   $result = $stmt->fetch();

   return $result;
  
 }
  catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
 }
 public function viewimg($id){
  try{
    $sql = "SELECT * FROM slide where cid=$id";
    $result = $this->db->query($sql);
    return $result;
}catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}

}
public function viewqus($id){
  try{
    $sql = "SELECT * FROM questions where crs_id=$id";
    $result = $this->db->query($sql);
    return $result;
}catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}

}
public function viewops($id,$qn){
  try{
    $sql = "SELECT * FROM options where crs_id=$id AND question_number=$qn";
    $result = $this->db->query($sql);
    return $result;
}catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}

}
public function viewcrct($id,$qn){
  try {
   $sql = "select * from options where   crs_id = :id AND question_number=:qn AND is_correct=1";
   $stmt = $this->db->prepare($sql);
   $stmt->bindparam(':id',$id);
   
   $stmt->bindparam(':qn',$qn);

   $stmt->execute();
   $result = $stmt->fetch();

   return $result;
  
 }
  catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
 }
 public function updtvdo($id,$destination){
  //echo 'otp success';

 try{ 
  $sql = "UPDATE `section` SET   `video`=:vdo WHERE crs_id=:cid";
  $stmt = $this->db->prepare($sql);
  // bind all placeholders to the actual values
  $stmt->bindparam(':cid',$id);
  $stmt->bindparam(':vdo',$destination);
  // execute statement
  $stmt->execute();
  return true;
  }
  catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
}
public function updtimg($id,$destination){
  //echo 'otp success';

 try{ 
  $sql = "INSERT INTO books (bname,aname,bcat,pdf,publshr,edtn,lang,img_path) VALUES (:title, :author, :cat, :pdf, :pub, :ed, :lang, :destination)";
     
  $stmt = $this->db->prepare($sql);
  // bind all placeholders to the actual values
  $stmt->bindparam(':cid',$id);
  $stmt->bindparam(':vdo',$destination);
  // execute statement
  $stmt->execute();
  return true;
  }
  catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
}
public function deleteimg($destination, $id){
  try{
       $sql = "delete from slide where ansr = :img AND cid=:id";
       $stmt = $this->db->prepare($sql);
       $stmt->bindparam(':img', $destination);
       
       $stmt->bindparam(':id', $id);
       $stmt->execute();
       return true;
   }catch (PDOException $e) {
       echo $e->getMessage();
       return false;
   }
}
public function deletequs($qus, $id){
  try{
       $sql = "delete from questions where question_number = :qus AND crs_id=:id";
       $stmt = $this->db->prepare($sql);
       $stmt->bindparam(':qus', $qus);
       
       $stmt->bindparam(':id', $id);
       $stmt->execute();
       return true;
   }catch (PDOException $e) {
       echo $e->getMessage();
       return false;
   }
}
public function deleteops($qus, $id){
  try{
       $sql = "delete from options where question_number = :qus AND crs_id=:id";
       $stmt = $this->db->prepare($sql);
       $stmt->bindparam(':qus', $qus);
       
       $stmt->bindparam(':id', $id);
       $stmt->execute();
       return true;
   }catch (PDOException $e) {
       echo $e->getMessage();
       return false;
   }
}
public function deletecrs($id){
  try{
       $sql = "delete from course where c_id=:id";
       $stmt = $this->db->prepare($sql);
       $stmt->bindparam(':id', $id);
       $stmt->execute();
       return true;
   }catch (PDOException $e) {
       echo $e->getMessage();
       return false;
   }
}
public function deletecrsarc($id){
  try{
       $sql = "delete from archive where cid=:id";
       $stmt = $this->db->prepare($sql);
       $stmt->bindparam(':id', $id);
       $stmt->execute();
       return true;
   }catch (PDOException $e) {
       echo $e->getMessage();
       return false;
   }
}

public function deletecrsopt($id){
  try{
       $sql = "delete from options where crs_id=:id";
       $stmt = $this->db->prepare($sql);
       $stmt->bindparam(':id', $id);
       $stmt->execute();
       return true;
   }catch (PDOException $e) {
       echo $e->getMessage();
       return false;
   }
}

public function deletecrsqus($id){
  try{
       $sql = "delete from questions where crs_id=:id";
       $stmt = $this->db->prepare($sql);
       $stmt->bindparam(':id', $id);
       $stmt->execute();
       return true;
   }catch (PDOException $e) {
       echo $e->getMessage();
       return false;
   }
}

public function deletecrsqa($id){
  try{
       $sql = "delete from question where cid=:id";
       $stmt = $this->db->prepare($sql);
       $stmt->bindparam(':id', $id);
       $stmt->execute();
       return true;
   }catch (PDOException $e) {
       echo $e->getMessage();
       return false;
   }
}

public function deletecrsreg($id){
  try{
       $sql = "delete from registration where c_id=:id";
       $stmt = $this->db->prepare($sql);
       $stmt->bindparam(':id', $id);
       $stmt->execute();
       return true;
   }catch (PDOException $e) {
       echo $e->getMessage();
       return false;
   }
}

public function deletecrsrev($id){
  try{
       $sql = "delete from review where cid=:id";
       $stmt = $this->db->prepare($sql);
       $stmt->bindparam(':id', $id);
       $stmt->execute();
       return true;
   }catch (PDOException $e) {
       echo $e->getMessage();
       return false;
   }
}

public function deletecrssec($id){
  try{
       $sql = "delete from section where crs_id=:id";
       $stmt = $this->db->prepare($sql);
       $stmt->bindparam(':id', $id);
       $stmt->execute();
       return true;
   }catch (PDOException $e) {
       echo $e->getMessage();
       return false;
   }
}

public function deletecrssld($id){
  try{
       $sql = "delete from slide where cid=:id";
       $stmt = $this->db->prepare($sql);
       $stmt->bindparam(':id', $id);
       $stmt->execute();
       return true;
   }catch (PDOException $e) {
       echo $e->getMessage();
       return false;
   }
}

public function deletecrsstr($id){
  try{
       $sql = "delete from stars where crs_id=:id";
       $stmt = $this->db->prepare($sql);
       $stmt->bindparam(':id', $id);
       $stmt->execute();
       return true;
   }catch (PDOException $e) {
       echo $e->getMessage();
       return false;
   }
}
public function insertdwnld($n,$bid){
  try {
  

    $sql = "UPDATE `books` SET  `download`=:n WHERE bid=:bid";
    
   $stmt = $this->db->prepare($sql);
   $stmt->bindparam(':n', $n);
   $stmt->bindparam(':bid', $bid);
   $stmt->execute();
   return true;

 }
  catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
 }


 public function getnum($num){
        
  try{
    $sql = "select * from books where bid = :num";
    $stmt = $this->db->prepare($sql);
    $stmt->bindparam(':num', $num);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result;
}catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}

}


  }
?>