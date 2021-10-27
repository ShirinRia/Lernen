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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css\signin.css" />
    <link rel="stylesheet" href="sec.css" />
</head>
<body>
<div class="crsside">
        <div class="hdr">
            Upload Your Content
        </div>
        <div class="sdcntnton sdcntnt">
        <a href="upload.php">Course</a></div>
        <div class="sdcntnttwo sdcntnt">
        <a href="#">Book</a></div>
        <div class="sdcntntthre sdcntnt">
        <a href="#">Status</a></div>
        <div class="sdcntntthre sdcntnt">
        <a href="#">Update Content</a></div>
        <div class="sdcntntthre sdcntnt">
        <a href="home.php">Exit</a></div>
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
                
                <input type="text" class="crnm" name="crsnm" placeholder="Section name" >
                <input type="file" class="crvdo" name="crsvdo" placeholder="Select">
                <input type="submit" class="btn in" value="Upload" name="up">
                </form>
            </div>
            </div>
            <?php 
            $x++; ?>
            
            <?php }?>  
        </div>
        </div>
    </div>
    
</form>
    </div>
</body>
</html>