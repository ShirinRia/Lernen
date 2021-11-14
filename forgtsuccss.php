<?php 
$title ='Index';
require_once 'includes/header.php';
require_once 'db/conn.php';
require_once 'sendmail.php';

$usser = $_SESSION['user'];
$eml =  $_SESSION['email'] ;
if (isset($_POST['rsnd'])) {
  $vuser= $_POST['ouser'];
  $email= $_POST['remail'];
  $full= $_POST['rfull'];
  $newotp=rand(1000,99999);
  $res=$opt->u_otp($vuser,$newotp);
  $sub="VERIFICATION";
  if($res) {
    sendemail ::sendmail($email,$full,$sub,$newotp);
    
  }
  else{
      
     echo 'failupdt';
  }

}
if(isset($_POST['sotp'])){
   
  $vuser= $_POST['ouser'];
  $o=$_POST['otp'];
 
  $result=$opt->otp($eml,$o);
  if($result) {
  $user=$_SESSION['user']  ;
  
  header("Location: rpass.php");
     
  }
  else{
    echo '<div class="alert alert-danger" id= "alert">OTP doesnot match</div>';
  }
}
?>
<div class="otp_containr" id="otp_pop">
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" class="otp">
                        <h3>Enter OTP</h3>
                        <h4>Check Your Email for OTP.</h4>
                        <input type="text" class="otpt" name ="ouser" value= "<?php echo $usser;?>">
                        
                       
                        <input type="text" class="otpt" name ="otp" placeholder="Enter OTP" >
   
                        <input type="submit"  name="sotp" class="btn otpb" value="Submit">
                        <input type="submit" name ="rsnd" class="btn otpb" value ="RESEND">
                </form>
            </div>

</body>
</html>