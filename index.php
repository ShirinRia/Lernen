<?php 
$title ='Index';
require_once 'includes/header.php';
require_once 'db/conn.php';
require_once 'sendmail.php';

if(isset($_POST['sub'])){
    
    $full= $_POST['full'];
    $user= $_POST['user'];
    $pass=$_POST['pass'];
    $newpass=md5($pass);
    $cpass=$_POST['cpass'];
    $cnfpass=md5($cpass);
    $email= $_POST['email'];
    $gender= $_POST['gen'];
    $type="Learner";
    $sub="VERIFICATION";
    $otp=rand(1000,99999);
    if($newpass==$cnfpass){
    $success = $crud->insert($full,$user,$newpass,$email,$gender,$otp,$type);
  //echo $otp;
    if($success) {
      sendemail ::sendmail($email,$full,$sub,$otp);
       //echo '<h1>sccs</h1>';
      // $success = $crud->num();
    //  header("Location: homepage.php");
    $_SESSION['user'] = $user;
    $_SESSION['full'] = $full;
    $_SESSION['email'] = $email;
    header("Location: lrnrsccs.php");
       
    }
    else{
        echo '<div class="alert alert-danger" id= "alert">Username already exist! </div>';
    }
}
else{
    echo '<div class="alert alert-danger" id= "alert">Password does not match </div>';
    }
}
else if(isset($_POST['subt'])){
    
    $full= $_POST['full'];
    $user= $_POST['user'];
    $pass=$_POST['pass'];
    $newpass=md5($pass);
    $cpass=$_POST['cpass'];
    $cnfpass=md5($cpass);
    $email= $_POST['email'];
    $gender= $_POST['gen'];
    $sub="VERIFICATION";
    $otp=rand(1000,99999);
    $type="Teacher";
    if($newpass==$cnfpass){
    
    $success = $crud->insert($full,$user,$newpass,$email,$gender,$otp,$type);
  //echo $otp;
    if($success) {
      sendemail ::sendmail($email,$full,$sub,$otp);
       //echo '<h1>sccs</h1>';
      // $success = $crud->num();
    //  header("Location: homepage.php");
    $_SESSION['user'] = $user;
    $_SESSION['full'] = $full;
    $_SESSION['email'] = $email;
    header("Location: success.php");
       
    }
    else{
        echo '<div class="alert alert-danger" id= "alert">Username already exist! </div>';
    }
}
else{
    echo '<div class="alert alert-danger" id= "alert">Password does not match </div>';
    }
}
if(isset($_POST['submit'])){
    $duser= $_POST['user'];
    $pass=$_POST['pass'];
    $newpass=md5($pass);
$result=$login->getuser($duser,$newpass);
if($result) {
    $_SESSION['user']=$duser;
    $_SESSION['userid']=$result['user_id'];
    $_SESSION['fname'] = $result['fullname'];
    header("Location: lrnrhome.php");
    //require_once 'homepage.php';
}
else{
    echo '<div class ="alert alert-danger" id= "alert">Username or Password is Incorrect! Please try again</div>';
   //echo 'failllll';
}
}
if(isset($_POST['tsubmit'])){
    $duser= $_POST['user'];
    $pass=$_POST['pass'];
    $newpass=md5($pass);
    $typ="Teacher";
$result=$login->gettchr($duser,$newpass,$typ);
if($result) {
    $_SESSION['user']=$duser;
    
    $_SESSION['tcrid']=$result['user_id'];
    header("Location: home.php");
    //require_once 'homepage.php';
}
else{
   // echo '<div class ="alert alert-danger"Username or Password is Incorrect! Please try again</div>';
   echo 'failllll';
}
}
?>


<div class="inup">

        <div class="side">
            <h4 class="lernen">Lernen</h4>
            
            <h6 class="tag">Learn at the comfort of your own home.The best online courses you'll find.</h6>
        </div>
        <div class="ntrans">
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" class="login">
            
                <div class="lf">
                <input type="text" class="field" name = "user" placeholder="username" >
                <input type="password" class="field" name="pass" placeholder="password" >
                <h6><u>Sign in as</u></h6>
                <input type="submit" name="tsubmit" class="btn in" value=" Teacher">
                <input type="submit" name="submit" class="btn in lrn" value=" Learner">
               <hr>
            
            </div>
            
            </form>
            <button onclick="togglePopup()" class="showsignup">Create New Account</button>
        </div>
        
        <div class="trans" > 

</div>
    <div class="trans" id="pop"></div> 
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"  method="post" class="signup">
            <div class="sf" id="popup">
           
                <div class="close-btn" onclick="togglePopup()">
                <i class="fas fa-times"></i></div>
                <input type="text" class="field sg" name="full" placeholder="Fullname" >
                <input type="text" class="field sg"name="user" placeholder="username" >
                <input type="password" class="field sg" name="pass" placeholder="password" >
                <input type="password" class="field sg" name="cpass" placeholder="Confirm password" >
                <input type="email" class="field sg" name="email"placeholder="email" >
                <div class="gender">
                    <div class="male">
                    <input type="radio" id="gen" name="gen" value="male">
                    <label for="gen" class="malee">Male</label></div>
                    <div class="male">
                    <input type="radio" id="gen" name="gen" value="female">
                    <label for="gen" class="malee">Female</label></div>
                    <div class="male">
                    <input type="radio" id="gen" name="gen" value="other">                            
                    <label for="gen" class="malee">Other</label></div>
                </div>
                <h5><u>Sign up as</u></h5>
               
                <input type="submit" name="subt" class="btn up" value="Teacher">
                
                <input type="submit" name="sub" class="btn up lrnr" value="Learner"></div>
            
                    
                </form>
            
       
    </div>
    <script src="alert.js" type="text/javascript"></script>
    <script src="alert_copy.js" type="text/javascript"></script>
</body>
</html>