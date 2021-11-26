<?php 
$title ='Homepage';
require_once 'includes/header_2.php';
require_once 'db/conn.php';

if(isset($_POST['save'])){
    $n= $_POST['name'];
    $em= $_POST['email'];
    $mb= $_POST['mobile'];
    $bd=$_POST['bdate'];
    $cn= $_POST['cntry'];
    $ides= $_POST['ides'];
    $orig_file = $_FILES["avatar"]["tmp_name"];
    $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
    $target_dir = 'uploads/';
    $destination = "$target_dir$em.$ext";
    move_uploaded_file($orig_file,$destination);
    $result=$crud->updtusrdata($n,$em,$mb,$bd,$cn,$destination,$ides);
    if($result) {
      
    $_SESSION['name'] = $n;
    $_SESSION['mobile'] = $mb;
    $_SESSION['bdate'] = $bd;
    $_SESSION['cntry'] = $cn;
    header("Location: update.php");
       
    }
    else{
        echo '<div class="alert alert-danger" id= "alert">Username or Password is incorrect! Please try again. </div>';
    }
   
}
?> 
 <script src='https://cdn.tiny.cloud/1/fkrd0r3n731w7mfc23kaaldls1z1msifaezn9lr1bufammwb/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
  <script>
  tinymce.init({
    selector: '#mytextarea'

  });
  </script>
<style>
    .udate{
        height: 80px;
   position:relative;
   padding-left: 100px;
   padding-bottom:120px;
   font-weight: bold;
    }
    
.tox-statusbar__text-container{
          visibility: hidden;
      }
    </style>
    <?php 
                
                $tp = $_SESSION['type'];
                if($tp=="Learner"){
               include 'lrnrpagehdr.php';}
               else if($tp=="Teacher")
               include 'pageheader.php';
               else{
               
                   include 'guestpagehdr.php';}
                ?> 
    <div class="full">
    <?php require_once 'side.php'; ?>

        

        <div class="midle">
            <div class="up">
                <div class="add">
                    <label for="">Update Your Information</label>
                    
                </div>
        </div>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data" class="fprfl">
                <div class="udate" style="padding-top:10px;">
                    <label for="" >Full Name</label><br><br>
                    <input type="text" name="name" class="text" value= "<?php echo $_SESSION['fname'];?>">
                </div>

                <div class="udate">
                    <label for="">Email</label><br><br>
                    <input type="text" name="email" class="text" value= "<?php echo $_SESSION['email'];?>">
                </div>

                <div class="udate">
                    <label for="">Mobile No.</label><br><br>
                    <input type="text" name="mobile" class="text" >
                </div>

                <div class="udate">
                    <label for="" >Birth Date</label><br><br>
                    <input type="date" name="bdate" class="text" >
                 </div>

                <div class="udate">
                    <label for="">Country</label><br><br>
                    <input type="text" name="cntry" class="text" value= "<?php echo $_SESSION['cntry'];?>">
                </div>

                <div class="udate">
                    <label for="">Change Your Photo</label><br><br>
                    <input type="file" name="avatar" class="text" style="border:none;">
                </div>
                <div class="udate">
                    <label for="">Write Something about yourself</label><br><br>
                   <div>
            <textarea id="mytextarea" name="ides" ></textarea>
        </div>
                  <!--   <input type="text" name="ides" class="text" >-->
                </div>
                <div class="svbtn">
                <input type="submit" name="save" class="p_btn s_btn" value="SAVE"style="position: relative;top: 150px;"></div>
            </form><br><br><br>
        </div>
    </div>
   
</body>
</html>