<?php 
$title ='Homepage';
require_once 'db/conn.php';  
include_once 'includes/session.php';

if(isset($_POST['up'])){
    $title= $_POST['crsnm'];
  //  $descrip= $_POST['crsdescrip'];
    $id= $_SESSION['id'];

    $orig_file = $_FILES["crsvdo"]["tmp_name"];
    $ext = pathinfo($_FILES["crsvdo"]["name"], PATHINFO_EXTENSION);
    $target_dir = 'uploads/';
    $destination = "$target_dir$title$id.$ext";
    move_uploaded_file($orig_file,$destination);

   $success = $crud->insertsec($title,$id,$destination);
  
} 

if(isset($_POST['qup'])){
    $q= $_POST['quiz'];
  //  $descrip= $_POST['crsdescrip'];
    $id= $_SESSION['id'];

   $success = $crud->insertqz($q,$id);
  
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
    <link rel="stylesheet" href="slide.css" />
   
    <link rel="stylesheet" href="sec.css" />
    <style>
        .menu{
	width:400px;
	height: 400px;
	margin: 20px auto;
}
        .button {
  background-color: #4CAF50; /* Green */
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
        <a href="#" class="sd">Book</a></div>
        <div class="sdcntntthre sdcntnt">
        <a href="#" class="sd">Status</a></div>
        <div class="sdcntntthre sdcntnt">
        <a href="#" class="sd">Update Content</a></div>
        <div class="sdcntntthre sdcntnt">
        <a href="home.php" class="sd">Exit</a></div>
    </div>
    <div class="crsmid">
        <form class="frmmid" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
        <div class="brdr">
        
        <div class="crmid">
            <div class="vdo">
            <?php 
            $x = 1;
            while($x <= $_SESSION['sec']) { ?>
            <div  class="bx">
            <div  class="vdbx">
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                
                <input type="text" class="crnm form-control" name="crsnm" placeholder="Section name" ><br><br><br>
                <input type="file" class="crvdo form-control" name="crsvdo" placeholder="Select">
                <input type="submit" class="in btn btn-outline-secondary" value="Upload" name="up">
                </form>
            </div>
            </div>
            <?php 
            $x++; ?>
            
            <?php }?>  <br>
            <div  class="bx">
            <div class = "menu">
        <a href="slide.php" target="_blank" class="button">Add Slide</a>
        </div>
           
            </div>
            <div  class="bx">
       
            <div class = "menu">
        <a href="add.php" target="_blank" class="button">Add questions</a>
</div>
            </div>
            
        </div>
        </div>
    </div>
    
</form>
    </div>
</body>
</html>