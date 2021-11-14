<?php 
$title ='Homepage';
require_once 'db/conn.php';  
include_once 'includes/session.php';

if(isset($_POST['upld'])){
    
    $id= $_SESSION['id'];

    $orig_file = $_FILES["avatar"]["tmp_name"];
    $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
    $target_dir = 'uploads/';
    $destination = $target_dir . basename($_FILES["avatar"]["name"]);
    move_uploaded_file($orig_file,$destination);

   $success = $crud->insertsld($destination, $id);

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
    
    <link rel = "stylesheet" href="slide.css">
</head>
<body>
    <div class="slidbx">
    <h4>Upload your slide image</h4>
<hr>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
         
       
    <div class="input-group">
      
        <input type="file" class="form-control" id="inputGroupFile04" name="avatar" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        <input class="btn btn-secondary" type="submit" id="inputGroupFileAddon04" name="upld" value="Upload">
  
         </form>
    </div>
    </div>
</body>
</html>