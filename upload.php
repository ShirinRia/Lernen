<?php 
$title ='Homepage';
require_once 'includes/upldheader.php';
require_once 'db/conn.php';
$results = $crud->catgry();
if(isset($_POST['upload'])){
    $title= $_POST['crsname'];
    $descrip= $_POST['crsdescrip'];
    $sec= $_POST['crssec'];
    $success = $crud->insertcrs( $title,$descrip,$sec);

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
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="brdr">
        <div class="crupper">
        <input type="text" class="name form-select" name="crsname" placeholder="Enter Your Course Name">
        
        <select class="form-select cat" >
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
                <input type="file" class="crvdo" name="crsthmb" placeholder="Select">
            </div>
            <textarea  class="crsdes" name="crsdescrip" rows="1" cols="30"></textarea>
        </div>
    </div>
    
    <input type="submit" class="btn in" value="Next" name="upload">
</form>
    </div>
</body>
</html>