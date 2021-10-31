<?php 
$title ='Index';
require_once 'includes/header.php';
require_once 'db/conn.php';
require_once 'sendmail.php';
//$user= $_POST['user'];
 //if(isset($_POST['submit'])){
  //  $full= $_POST['full'];
   // $user= $_POST['user'];
  //  $pass=$_POST['pass'];
  //  $newpass=md5($pass);
  //  $email= $_POST['email'];
  //  $gender= $_POST['gen'];
  //  $sub="VERIFICATION";
  //  $otp=rand(1000,99999);
  //  $success = $crud->insert($full,$user,$newpass,$email,$gender,$otp);
  //echo $otp;
  //  if($success) {
      //sendemail ::sendmail($email,$full,$sub,$otp);
       //echo '<h1>sccs</h1>';
      // $success = $crud->num();
     // require_once 'index.php';
       
   // }
  //  else{
    //    echo '<h1>fail1</h1>';
   // }
   
//}

if (isset($_POST['rsnd'])) {
  $vuser= $_POST['ouser'];
  $email= $_POST['remail'];
  $full= $_POST['rfull'];
  $newotp=rand(1000,99999);
  $res=$opt->u_otp($vuser,$newotp);
  $sub="VERIFICATION";
  if($res) {
    //  sendemail ::sendmail($email,$full,$sub,$newotp);
     // echo 'update';
  }
  else{
      
     echo 'failupdt';
  }

}
else if(isset($_POST['sotp'])){
   
  $vuser= $_POST['ouser'];
  $o=$_POST['otp'];
 
  $result=$opt->otp($vuser,$o);
  if($result) {
 // echo '<h2>MATCH<h2>';
  //require_once 'index.php';
  header("Location: home.php");
}
else{
 echo 'Not Match';
}
}
?>
<div class="otp_containr" id="otp_pop">
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" class="otp">
                        <h3>Enter OTP</h3>
                        <h4>Check Your Email for OTP.</h4>
                        <input type="text" class="otpt" name ="ouser" value= "<?php echo $_SESSION['user'];?>">
                        <input type="text" class="hid" name ="remail" value= "<?php echo  $_SESSION['email']; ?>">
                        <input type="text" class="hid" name ="rfull" value= "<?php echo $_SESSION['full']  ?>">
                        <input type="text" class="otpt" name ="otp" placeholder="Enter OTP" >
   
                        <input type="submit"  name="sotp" class="btn otpb" value="Submit">
                        <input type="submit" name ="rsnd" class="btn otpb" value ="RESEND">
                </form>
            </div>

</body>
</html>