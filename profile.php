<?php 
$title ='Homepage';
require_once 'includes/header_2.php';
require_once 'db/conn.php';
if(!isset($_GET['us'])){
   echo 'not found';
    
} 
else{
    $id = $_GET['us'];
    
    $result = $crud->data($id);
    $_SESSION['fullname'] = $result['fullname'];
    $_SESSION['email'] = $result['email'];
    $_SESSION['mobil'] = $result['mobile'];
    $_SESSION['bddate'] = $result['bdate'];
    $_SESSION['cntry'] = $result['country'];
    
}
?> 
<style>
    .udate{
        height: 80px;
   position:relative;
   padding-left: 100px;
   padding-bottom:120px;
   font-weight: bold;
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
                    <label for="">Add Information About Yourself</label>
                    
                </div>
        </div>
            <form class="fprfl">
                <div class="name  udate">
                    <label for="">Full Name</label><br><br>
                    <input type="text" name="profile" class="text" value=" <?php echo $_SESSION['fullname']  ?>">
                </div>

                <div class="email udate">
                    <label for="">Email</label><br><br>
                    <input type="text" name="Courses" class="text" value=" <?php echo $_SESSION['email'] ;  ?>">
                </div>

                <div class="mobile udate">
                    <label for="">Mobile No.</label><br><br>
                    <input type="text" name="Update" class="text" value=" <?php echo $_SESSION['mobil'] ;  ?>">
                </div>

                <div class="birth udate ">
                    <label for="" >Birth Date</label><br><br>
                    <input type="text" name="Dashboard" class="text" value=" <?php echo $_SESSION['bddate'] ;  ?>">
                 </div>

                <div class="district udate ">
                    <label for="">Country</label><br><br>
                    <input type="text" name="cntry" class="text" value=" <?php echo $_SESSION['cntry'] ;  ?>">
                </div>

                
            </form>
        </div>
    </div>
</body>
</html>