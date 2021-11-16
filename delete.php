<?php 
$title ='Homepage';
require_once 'includes/header_2.php';
require_once 'db/conn.php';
if(!isset($_GET['us'])){
    header("Location: homepage.php");
}else{
    // Get ID values
    $id = $_GET['us'];

    //Call Delete function
    $result = $crud->delete($id);
    
    if($result)
    {
        header("Location: login.php");
    }
    else{
       echo 'error';
    }
}
?> 

  