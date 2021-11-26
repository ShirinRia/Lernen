<?php 
$title ='Homepage';

include_once 'includes/session.php';
require_once 'db/conn.php';
$id = $_GET['courseid'];
$destination = $_GET['img'];
$qus = $_GET['qus'];
$_SESSION['cid'] =$id;

if(isset($_POST['change'])){
  //  $title= $_POST['crsnm'];
    
    $orig_file = $_FILES["crsvdo"]["tmp_name"];
    $ext = pathinfo($_FILES["crsvdo"]["name"], PATHINFO_EXTENSION);
    $target_dir = 'uploads/';
    $destination = "$target_dir$id.$ext";
    move_uploaded_file($orig_file,$destination);

   $success = $crud->updtvdo($_SESSION['cid'],$destination);
  if($success)
  header("Location: view.php?courseid=$id");
} 
if(isset($_POST['upload'])){
    //  $title= $_POST['crsnm'];
      
      $orig_file = $_FILES["img"]["tmp_name"];
      $ext = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
      $target_dir = 'uploads/';
      $destination = $target_dir . basename($_FILES["img"]["name"]);
      move_uploaded_file($orig_file,$destination);
  
     $success = $crud->updtsld($destination, $id);
    if($success)
    header("Location: view.php?courseid=$id");
  } 
  if(isset($_POST['delete'])){
    //  $title= $_POST['crsnm'];
      
     $success = $crud->deleteimg($destination, $id);
    if($success)
    header("Location: view.php?courseid=$id");
  } 
  if(isset($_POST['qusdlt'])){
    //  $title= $_POST['crsnm'];
      
     $success = $crud->deletequs($qus, $id);
    if($success)
    $opt = $crud->deleteops($qus, $id);
    header("Location: view.php?courseid=$id");
  } 
  if(isset($_POST['cdelete'])){
    //  $title= $_POST['crsnm'];
      
     $success = $crud->deletecrs($id);
    if($success)
    $success1 = $crud->deletecrsarc($id);
    $success2 = $crud->deletecrsopt($id);
    $success3 = $crud->deletecrsqus($id);
    $success4 = $crud->deletecrsqa($id);
    $success5 = $crud->deletecrsreg($id);
    $success6 = $crud->deletecrsrev($id);
    $success7 = $crud->deletecrssec($id);
    $success8 = $crud->deletecrssld($id);
    $success9 = $crud->deletecrsstr($id);
    //$opt = $crud->deleteops($qus, $id);
    header("Location: status.php");
  } 
?>