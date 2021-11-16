<?php 

include_once 'includes/session.php';
require_once 'db/conn.php';
require_once 'sendmail.php';
if(isset($_POST['forgtpass'])){
    
  
    $email= $_POST['email'];
   
    $sub="VERIFICATION";
    $otp=rand(1000,99999);
    $res=$login->getemail($email,$otp);
    if($res){
      sendemail ::sendmail($email,$full,$sub,$otp);
       //echo '<h1>sccs</h1>';
      // $success = $crud->num();
    //  header("Location: homepage.php");
    $usr = $res['username'];
    $_SESSION['user'] = $usr;
    $_SESSION['email'] = $email;
    header("Location: forgtsuccss.php?usr=$usr&eml=$email");
    } 
     else{
        echo '<div class ="alert alert-danger" id= "alert">This email is not registered</div>';
   
     }
}
if(isset($_POST['cncl'])){
    
  
    header("Location: index1.php");
   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            background-color: whitesmoke;
        }
        .forgt{
            background-color:white;
            position: absolute;
            padding: 20px;
            width: 500px;
            height: 310px;
            top: 150px;
            left: 450px;
        }
        .butn{
            display:flex;
            justify-content:right;
            
        }
        
    </style>
</head>
<body>
    <div class="forgt shadow-sm p-3 mb-5 bg-body rounded">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
           
              <h2><span>Reset Your Password</span></h2>
              <hr>
              <h5 style="font-weight: normal;">Please enter your registered email address to get otp.</h5 ><br>
              <div class="input-group mb-3">
                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" name="email">
                <span class="input-group-text" id="basic-addon2">@example.com</span>
              </div>
              <hr>
              <div class="butn">
             <span style="padding-right: 10px;"> <input type="submit" name="forgtpass" class="btn btn-primary"value="Submit"></span>
             <span> <input type="submit" name="cncl" class="btn btn-secondary" value="Cancel"></span>
            </div>
        </form>
    </div>
    
    <script src="alert_copy.js" type="text/javascript"></script>
</body>
</html>