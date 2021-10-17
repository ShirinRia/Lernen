<?php 
$title ='Index';
require_once 'includes/header.php';
require_once 'db/conn.php';
require_once 'sendmail.php';
if(isset($_POST['sotp'])){
   
    $vuser= $_POST['ouser'];
    $o=$_POST['otp'];
   
    $result=$opt->otp($vuser,$o);
    if($result) {
   // echo '<h2>MATCH<h2>';
    //require_once 'index.php';
    header("Location: homepage.php");
}
else{
   echo 'Not Match';
}
}

?>
<?php 


if (isset($_POST['rsnd'])) {
    $vuser= $_POST['ouser'];
    $email= $_POST['remail'];
    $full= $_POST['rfull'];
    $newotp=rand(1000,99999);
    $res=$opt->u_otp($vuser,$newotp);
    $sub="VERIFICATION";
    if($res) {
       // sendemail ::sendmail($email,$full,$sub,$newotp);
        echo 'update';
    }
    else{
        
       echo 'failupdt';
    }

}

?>

</body>
</html>