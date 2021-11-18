<?php 
$title ='Homepage';
require_once 'includes/upldheader.php';
require_once 'db/conn.php';
$results = $crud->catgry();
if(isset($_POST['upload'])){
    $title= $_POST['crsname'];
    $descrip= $_POST['overview'];
    $lrn= $_POST['learn'];
    $cdes= $_POST['crsdescrip'];
    $cat=$_POST['catgry'];
    $_SESSION['catid'] = $cat;
   $tname= $_SESSION['fname'];
    $tid=$_SESSION['userid'];
    $orig_file = $_FILES["avatar"]["tmp_name"];
        $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
        $target_dir = 'uploads/';
        $destination = "$target_dir$title.$ext";
        move_uploaded_file($orig_file,$destination);
    $success = $crud->insertcrs( $title,$descrip,$destination,$cat,$tname,$tid,$lrn,$cdes);
    if($success) {
    $id = $success;
    $result = $crud->getcrsid($id );
    $_SESSION['fullname'] = $result['fullname'];
    $_SESSION['id'] = $result['c_id'];
    $_SESSION['sec'] = $result['sectn'];
    $rate = $crud->insertstr( $_SESSION['id']);
    header("Location:sctn.php");   
    }
    else
        echo '<div class="alert alert-danger" id= "alert">Fail To Upload! Please try again. </div>'; 
}
?> 
    <?php require_once 'upside.php'; ?>
    <script src='https://cdn.tiny.cloud/1/fkrd0r3n731w7mfc23kaaldls1z1msifaezn9lr1bufammwb/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
  <script>
  tinymce.init({
    selector: '#mytextarea'

  });
  </script>
   <script>
    tinymce.init({
      selector: '#mytxtarea'
      
    });
    </script>
    <script>
        tinymce.init({
          selector: '#mtxtarea'
          
        });
        </script>
  <style>
      .tox-statusbar__text-container{
          visibility: hidden;
      }
  </style>
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
         
        </div>
        
        <div class="crmid">
            
           
           
               <span class="crthtxt">Select Your Course thumbnail</span>
               <!-- <input type="file" class="crvdo" name="crsthmb" placeholder="Select">-->
                <input type="file" accept="image/*" class="custom-file-input crvdo" id="avatar" name="avatar" >
                <span class="crthtxt ovr"><b>Write Course Overview</b></span>
            <!--<input type="text" class="irvw" name="overview" placeholder="Write an overview of your course">-->
           
            <div class="irvw">
            <textarea id="mytxtarea" name="overview" ></textarea>
        </div>
            <span class="crthtxt updes"><b>Write Course desciption</b></span>
          
            <div class="irvw updestxt">
            <textarea id="mytextarea" name="crsdescrip" ></textarea>
        </div>
            <!--<input type="text" class="irvw updestxt" name="crsdescrip">-->
            
            <span class="crthtxt lrnn" style="top: 750px;"><b>What will students learn from your course</b></span>
       <!--<input type="text" class="irvw uplrn" name="learn">-->
           
            <div class="irvw uplrn">
            <textarea id="mtxtarea" name="learn" ></textarea>
        </div>
           
        </div>
    </div>
    
    <input type="submit" class="btn in" value="Next" name="upload">
</form>
    </div>
    
</body>
</html>