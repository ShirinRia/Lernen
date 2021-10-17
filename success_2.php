<?php 
$title ='Index';
require_once 'includes/header.php';
require_once 'db/conn.php';
if(isset($_POST['submit'])){
   
    $duser= $_POST['user'];
    $pass=$_POST['pass'];
    $newpass=md5($pass);
$result=$login->getuser($duser,$newpass);
if($result) {
   // $_SESSION['user']=$user;
   // header("Location: homepage.php");
    require_once 'homepage.php';
}
else{
   // echo '<div class ="alert alert-danger"Username or Password is Incorrect! Please try again</div>';
   echo 'failllll';
}
}
?>

</body>
</html>