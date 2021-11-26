<?php 
$title ='Index';
require_once 'includes/header.php';
require_once 'db/conn.php';
if(!isset($_GET['arc'])){
  echo 'not found';
   
} 
else{
   $id = $_GET['arc'];
   $result = $crud->archive($id,$_SESSION['user'],$_SESSION['userid'],$_SESSION['tcr']);
  if($result){
   // $_SESSION['did'] = $result['cid'];
    $dlt = $crud->mydlt($id,$_SESSION['userid']);
    header("Location:mycourses.php");
   
  }
  
}

?>