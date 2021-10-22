<?php 
$title ='Homepage';
require_once 'includes/upldheader.php';
require_once 'db/conn.php';
$results = $crud->catgry();
if(isset($_POST['upload'])){
    $title= $_POST['bkname'];
    $descrip= $_POST['crsdescrip'];
   $price=$_POST['bprice'];
   $author=$_POST['auname'];
   $cat=$_POST['catgry'];
   $success = $crud->insertbooks( $title,$descrip,$price,$author,$cat);

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
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="brdr">
        <div class="crupper">
        <input type="text" class="name form-select" name="bkname" placeholder="Enter Your Book Name">
        <select class="form-select cat" name="catgry" >
            <option selected>Select Category</option>
            <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
           
           <option value="<?php echo $r['Category'] ?>"><?php echo $r['Category'] ?></option>
          
           <?php }?>  
          </select>
          <input type="text" class="aname form-select" name="auname" placeholder="Enter Author Name">
          <input type="text" class="price form-select" name="bprice" placeholder="Enter Price">
          <input type="text" class="TK form-select" Value="TK">
        </div>
        
        <div class="crmid">
            
            <div  class="vdbx">
                <img src="images (2).png" alt="img" height="100" width="150" class="img">
                <input type="file" class="crvdo" name="crsvdo" placeholder="Select">
            </div>
            
            <textarea  class="crsdes" name="crsdescrip" rows="1" cols="30"></textarea>
            <div  class="crsde crsdes">
                <img src="download (1).png" alt="img" height="100" width="150" class="img">
                <input type="file" class="crvdo" name="crsthmb" placeholder="Select">
            </div>
            
        </div>
    </div>
    <input type="submit" class="btn in" name="upload" value=" Upload">
</form>
    </div>
</body>
</html>