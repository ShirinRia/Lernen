<?php 
$title ='Homepage';
require_once 'includes/upldheader.php';
require_once 'db/conn.php';
$results = $crud->catgry();
if(isset($_POST['upload'])){
    $title= $_POST['crsname'];
    $descrip= $_POST['crsdescrip'];
    $sec= $_POST['crssec'];
    $cat=$_POST['catgry'];
    $_SESSION['catid'] = $cat;
   // $orig_file = $_FILES["avatar"]["tmp_name"];
   // $target_dir = 'uploads/';
   // $destination =$target_dir . basename($_FILES["avatar"]["name"]);
  //  move_uploaded_file($orig_file,$destination);
    $orig_file = $_FILES["avatar"]["tmp_name"];
        $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
        $target_dir = 'uploads/';
        $destination = "$target_dir$title.$ext";
        move_uploaded_file($orig_file,$destination);
    //exit();
    $success = $crud->insertcrs( $title,$descrip,$sec,$destination,$cat);

    if($success) {
     //  sendemail ::sendmail($email,$full,$sub,$otp);
       //echo '<h1>sccs</h1>';
      // $success = $crud->num();
    //  header("Location: homepage.php");
    $id = $_GET['crsname'];
    $result = $crud->getcrsid($title);
    $_SESSION['fullname'] = $result['fullname'];
    $_SESSION['id'] = $result['c_id'];
    $_SESSION['sec'] = $result['sectn'];
   // $_SESSION['full'] = $full;
  //  $_SESSION['email'] = $email;
    header("Location:sctn.php");
       
    }
    else{
        echo '<div class="alert alert-danger" id= "alert">Fail To Upload! Please try again. </div>';
    }
   
}
?> 
    <?php require_once 'upside.php'; ?>

    <div class="crsmid">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
        <div class="brdr">
        <div class="crupper">
        <input type="text" class="name form-select" name="crsname" placeholder="Enter Your Course Name">
        
        <select class="form-select cat" name="catgry" >
        <option selected>Select Category</option>
        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
           
            <option value="<?php echo $r['cat_id'] ?>"><?php echo $r['Category'] ?></option>
           
            <?php }?>  
          </select>
          <input type="text" class="name form-select" name="crssec" placeholder="How much section?">
        </div>
        
        <div class="crmid">
            
           
            <div  class="crsde crsdes">
                <img src="images (2).png" alt="img" height="100" width="150" class="img">
               <!-- <input type="file" class="crvdo" name="crsthmb" placeholder="Select">-->
                <input type="file" accept="image/*" class="custom-file-input crvdo" id="avatar" name="avatar" >
            </div>
            <textarea  class="crsdes" name="crsdescrip" rows="1" cols="30"></textarea>
        </div>
    </div>
    
    <input type="submit" class="btn in" value="Next" name="upload">
</form>
    </div>
</body>
</html>