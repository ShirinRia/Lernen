<?php 
$title ='Homepage';
require_once 'db/conn.php';  
include_once 'includes/session.php';
$_SESSION['B']='Basic';
$_SESSION['M']='Medium';
$_SESSION['H']='High';
if(isset($_POST['up'])){
    $title= $_POST['crsnm'];
    $id= $_SESSION['id'];
    $orig_file = $_FILES["crsvdo"]["tmp_name"];
    $ext = pathinfo($_FILES["crsvdo"]["name"], PATHINFO_EXTENSION);
    $target_dir = 'uploads/';
    $destination = "$target_dir$title$id.$ext";
    move_uploaded_file($orig_file,$destination);
   $success = $crud->insertsec($title,$id,$destination);
  
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css\signin.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link rel="stylesheet" href="sec.css" />
   
    <style>
        .menu{
	width:400px;
	height: 200px;
	margin: 20px auto;
}
        .button {
  background-color: #4CAF50; 
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
	display:block;
  font-size: 16px;
	width: 70%;
	margin: 20px 20px;
}
.btn{
    background-color: #4CAF50;
    color: white;
    position: relative;
    
    left: 255px;
    top: -48px;
}
    </style>
</head>
<body>
<div class="crsside">
        <div class="hdr">
            Upload Your Content
        </div>
        <div class="sdcntnton sdcntnt">
        <a href="upload.php" class="sd">Course</a></div>
        <div class="sdcntnttwo sdcntnt">
        <a href="bupload.php" class="sd">Book</a></div>
        <div class="sdcntntthre sdcntnt">
        <a href="status.php" class="sd">Status</a></div>
        <div class="sdcntntthre sdcntnt">
        <a href="index.php" class="sd">Exit</a></div>
    </div>
    <div class="crsmid">
        <form class="frmmid" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
        <div class="brdr">
        
        <div class="crmid">
            <div class="vdo">
            
           
            <div  class="bx">
            <div  class="vdbx">
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                
                <input type="text" class="crnm form-control" name="crsnm" placeholder="Video Title" ><br><br><br>
                <input type="file" class="crvdo form-control" name="crsvdo" placeholder="Select">
                <input type="submit" class="in btn btn-outline-secondary" value="Upload" name="up">
                </form>
            </div>
            </div>
            
           <br>
            <div  class="bx">
            <div class = "menu">
        <a href="slide.php" target="_blank" class="button" style="background: linear-gradient(
        45deg, #842E62, #B7264D);">Add Slide</a>
        </div>
           
            </div>
            <div  class="bx">
       
            <div class = "menu">
            <a href="add.php?lev=<?php echo $_SESSION['B'];?>" target="_blank" class="button" style="background: linear-gradient(
        45deg, #842E62, #B7264D);">Add Basic level questions</a>
            <a href="add.php?lev=<?php echo $_SESSION['M'];?>" target="_blank" class="button" style="background: linear-gradient(
        45deg, #842E62, #B7264D);">Add Medium level questions</a>
            <a href="add.php?lev=<?php echo $_SESSION['H'];?>" target="_blank" class="button" style="background: linear-gradient(
        45deg, #842E62, #B7264D);">Add High level questions</a><br><br><br><br>
</div>
            </div>
            
        </div>
        </div>
    </div>
    
</form>
    </div>
    
</body>
</html>