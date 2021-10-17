<?php 
$title ='Homepage';
require_once 'includes/upldheader.php';
require_once 'db/conn.php';
$results = $crud->catgry();
if(isset($_POST['upload'])){
    $title= $_POST['crsname'];
    $descrip= $_POST['crsdescrip'];
   
    $success = $crud->insertcrs( $title,$descrip);

    if($success) {
     //  sendemail ::sendmail($email,$full,$sub,$otp);
       //echo '<h1>sccs</h1>';
      // $success = $crud->num();
    //  header("Location: homepage.php");
   // $_SESSION['user'] = $user;
   // $_SESSION['full'] = $full;
  //  $_SESSION['email'] = $email;
    header("Location: test.php");
       
    }
    else{
        echo '<div class="alert alert-danger" id= "alert">Username or Password is incorrect! Please try again. </div>';
    }
   
}
?> 
    <div class="crsside">
        <div class="hdr">
            Upload Your Content
        </div>
        <div class="sdcntnton sdcntnt">
        <a href="#">Course</a></div>
        <div class="sdcntnttwo sdcntnt">
        <a href="#">Book</a></div>
        <div class="sdcntntthre sdcntnt">
        <a href="#">Status</a></div>
        <div class="sdcntntthre sdcntnt">
        <a href="#">Update Content</a></div>
        <div class="sdcntntthre sdcntnt">
        <a href="test.php">Exit</a></div>
    </div>
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
        </div>
        
        <div class="crmid">
            
            <div  class="vdbx">
                <img src="images.png" alt="img" height="100" width="150" class="img">
                <input type="file" class="crvdo" name="crsvdo" placeholder="Select">
            </div>
            
            <textarea  class="crsdes" name="crsdescrip" rows="1" cols="30"></textarea>
            <div  class="crsde crsdes">
                <img src="images (2).png" alt="img" height="100" width="150" class="img">
                <input type="file" class="crvdo" name="crsthmb" placeholder="Select">
            </div>
            
        </div>
    </div>
    <input type="submit" class="btn in" value=" Upload" name="upload">
</form>
    </div>
</body>
</html>