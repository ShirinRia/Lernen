<?php 
$title ='Index';
require_once 'includes/header.php';
require_once 'db/conn.php';
require_once 'sendmail.php';
$_SESSION['mobile']='';
$_SESSION['bdate']='';
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
    
  //  $notp=md5($otp);
    if($newpass==$cnfpass){
    $success = $crud->insert($email,$otp,$user);
    if($success) {
      sendemail ::sendmail($email,$full,$sub,$otp);
    $_SESSION['user'] = $user;
    $_SESSION['full'] = $full;
    $_SESSION['email'] = $email;
    $_SESSION['tp'] = $type;
    $_SESSION['gn'] = $gender;
    $_SESSION['pass'] = $newpass;
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
    
    $notp=md5($otp);
    $type="Teacher";
    if($newpass==$cnfpass){
    
        $success = $crud->insert($email,$notp,$user);
  //echo $otp;
    if($success) {
        sendemail ::sendmail($email,$full,$sub,$otp);
     $_SESSION['user'] = $user;
     $_SESSION['full'] = $full;
     $_SESSION['email'] = $email;
     $_SESSION['tp'] = $type;
     $_SESSION['gn'] = $gender;
     $_SESSION['pass'] = $newpass;
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
if(isset($_POST['remembrme'])){
    setcookie('usernamecookie',$duser,time()+31536000);
    setcookie('passecookie',$pass,time()+31536000);
}
if($result) {
    $_SESSION['user']=$duser;
    $_SESSION['userid']=$result['user_id'];
    $_SESSION['fname'] = $result['fullname'];
    $_SESSION['type']=$result['type'];
    $typ=$_SESSION['type'];
    header("Location: home.php");
}
else{
    $res=$login->getem($duser);
    if($res) {
        header("Location: lrnrsccs.php");
    }
    else
    echo '<div class ="alert alert-danger" id= "alert">Username or Password is Incorrect! Please try again</div>';
}
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
                <input type="text" class="field" name = "user" placeholder="username" value="<?php if(isset($_COOKIE['usernamecookie'])){echo $_COOKIE['usernamecookie'];}?>"style="background-color:whitesmoke">
                <input type="password" class="field" name="pass" placeholder="password" value="<?php if(isset($_COOKIE['passecookie'])){echo $_COOKIE['passecookie'];}?>"style="background-color:whitesmoke">
               <!-- <h6><u>Sign in as</u></h6>-->
               <!-- <input type="submit" name="tsubmit" class="btn in" value=" Teacher" style="top:245px;">-->
               <input type="checkbox" name="remembrme" style="position: fixed; top:240px; left: 900px;"> <span style="position: fixed; top:235px; left: 920px;"> Remember Me</span>
                <input type="submit" name="submit" class="in lrn" value=" Log In" style="top:280px; left: 980px;">
                <a href="forgot .php" style="text-decoration: none; position:relative; top: 30px;padding-bottom: 5px;color:#B7264D;">Forgotten Password?</a>
           
                <hr style=" position:relative; top: 25px;">
               
            </div>
            
            </form>
            <button onclick="togglePopup()" class="showsignup" style="top:380px;" >Create New Account</button>
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
               
                <input type="submit" name="subt" class="btn up " value="Teacher">
                
                <input type="submit" name="sub" class="btn up lrnr " value="Learner"></div>
            
                    
                </form>
            
       
    </div>
    <script src="alert.js" type="text/javascript"></script>
    <script src="alert_copy.js" type="text/javascript"></script>
</body>
</html>