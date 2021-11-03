<?php
  class quiz{
      private $db;
      function __construct($conn){
            $this->db = $conn;
      }
     
       
public function questn($i,$id){
  try{
    $sql = "SELECT * FROM `qz_qus` where qid=$i AND crsid=$id";
    $result = $this->db->query($sql);
    return $result;
    
}catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}

}
public function getrow($id){
  try {

  $sql = "SELECT * FROM `qz_qus` where  crsid=$id";
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
public function ansr($i){
  try{
    $sql = "SELECT * FROM `qz_ans` where qid=$i";
    $result = $this->db->query($sql);
    return $result;
}catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}

}
public function getans(){
        
  try{
    $sql = "SELECT * FROM `qz_qus`";
    $result = $this->db->query($sql);
    return $result;
}catch (PDOException $e) {
   echo $e->getMessage();
 return false;
}

}
  }
?>