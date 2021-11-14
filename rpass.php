<?php 
$title ='Index';
include_once 'includes/session.php';
require_once 'db/conn.php';
$usser = $_SESSION['user'];

if(isset($_POST['submit'])){
  
    $pass=$_POST['newpass'];
    $newpass=md5($pass);
   
   
    $success = $login->updtpass($usser,$newpass);
  
    if($success) {
    
    $_SESSION['user'] = $user;
    $_SESSION['full'] = $full;
    $_SESSION['email'] = $email;
    $_SESSION['tp'] = $type;
    $_SESSION['gn'] = $gender;
    $_SESSION['pass'] = $newpass;
    header("Location: index.php");
       
    }
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
           
              <h2><span>Choose a new Password</span></h2>
              <hr>
              <h5 style="font-weight: normal;">A strong password has a combination of letters, digits and punctuation marks.</h5 ><br>
              <div class="input-group mb-3">
                <input type="text" name="newpass" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" placeholder="New Password">
               <!--123ri@2018016-->
               
              </div>
              <hr>
              <div class="butn">
             <span style="padding-right: 10px;"> <input type="submit" name="submit" class="btn btn-primary"value="Continue"></span>
             <span> <input type="submit" name="cncl" class="btn btn-secondary" value="Skip"></span>
            </div>
           
        </form>
        
    </div>
    
</body>
</html>