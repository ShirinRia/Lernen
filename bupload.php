<?php 
$title ='Homepage';
require_once 'includes/upldheader.php';
require_once 'db/conn.php';
$results = $crud->catgry();
if(isset($_POST['upload'])){
    $title= $_POST['bkname'];
 
   $author=$_POST['auname'];
   $cat=$_POST['catgry'];
   $pub= $_POST['pubname'];
 
   $ed=$_POST['edition'];
   $lang=$_POST['lang'];
   $orig_file = $_FILES["avatar"]["tmp_name"];
   $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
   $target_dir = 'uploads/';
   $destination = "$target_dir$title.$ext";
   move_uploaded_file($orig_file,$destination);
   $pdf=$_FILES['pdf']['name'];
   $pdf_type=$_FILES['pdf']['type'];
   $pdf_size=$_FILES['pdf']['size'];
   $pdf_tmp_loc=$_FILES['pdf']['tmp_name'];
   $pdf_store='uploads/'.$pdf;
   move_uploaded_file($pdf_tmp_loc,$pdf_store);
   $success = $crud->insertbooks( $title,$author,$cat,$pdf,$pub,$ed,$lang, $destination);
  

    if($success) {
     //  sendemail ::sendmail($email,$full,$sub,$otp);
       //echo '<h1>sccs</h1>';
      // $success = $crud->num();
    //  header("Location: homepage.php");
   // $_SESSION['user'] = $user;
   // $_SESSION['full'] = $full;
  //  $_SESSION['email'] = $email;
    header("Location: home.php");
       
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
        <input type="text" class="name form-select spc" name="bkname" placeholder="Enter Your Book Name">
        <select class="form-select cat " name="catgry" >
            <option selected>Select Category</option>
            <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
           
           <option value="<?php echo $r['Category'] ?>"><?php echo $r['Category'] ?></option>
          
           <?php }?>  
          </select>
          <input type="text" class="aname form-select spc" name="auname" placeholder="Enter Author Name">
          
        </div>
        <div class="crupper low">
            <input type="text" class="aname form-select spc" name="pubname" placeholder="Enter Publisher Name">
               <input type="text" class="aname form-select spc" name="edition" placeholder="Edition, e.g: 10th edition">
               <input type="text" class="aname form-select spc" name="lang" placeholder="Language">
            
            </div>
        
        <div class="crmid">
            
            <div  class="vdbx">
                <img src="images (2).png" alt="img" height="100" width="150" class="img">
                <input type="file" class="crvdo" name="avatar" placeholder="Select">
            </div>
            
            
            <div  class="crsde crsdes">
                <img src="download (1).png" alt="img" height="100" width="150" class="img">
                <input type="file" class="crvdo" name="pdf" placeholder="Select" required>
            </div>
            
        </div>
    </div>
    <input type="submit" class="btn in" name="upload" value=" Upload">
</form>
    </div>
</body>
</html>