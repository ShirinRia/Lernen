<?php 
$title ='Homepage';

include_once 'includes/session.php';
$_SESSION['type'] = 'NULL';
require_once 'db/conn.php';
$results = $crud->crd();
if(isset($_COOKIE['usernamecookie'])){
    $duser=$_COOKIE['usernamecookie'];
    $pass=$_COOKIE['passecookie'];
    $newpass=md5($pass);
    $result=$login->getuser($duser,$newpass);

if($result) {
    $_SESSION['user']=$duser;
    $_SESSION['userid']=$result['user_id'];
    $_SESSION['fname'] = $result['fullname'];
    
    $_SESSION['pimg'] = $result['img_path'];
    $_SESSION['type']=$result['type'];
    $typ=$_SESSION['type'];
    header("Location: home.php");
}
}
else{
 
                
                
    include 'guestpagehdr.php';


include 'test.php';

}
?>  


  
</body>
</html>