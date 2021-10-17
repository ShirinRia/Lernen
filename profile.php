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

<?php 
                
                include 'pageheader.php';
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
                <div class="name ">
                    <label for="">Full Name</label><br><br>
                    <input type="text" name="profile" class="text" value=" <?php echo $_SESSION['fullname']  ?>">
                </div>

                <div class="email">
                    <label for="">Email</label><br><br>
                    <input type="text" name="Courses" class="text" value=" <?php echo $_SESSION['email'] ;  ?>">
                </div>

                <div class="mobile ">
                    <label for="">Mobile No.</label><br><br>
                    <input type="text" name="Update" class="text" value=" <?php echo $_SESSION['mobil'] ;  ?>">
                </div>

                <div class="birth ">
                    <label for="" >Birth Date</label><br><br>
                    <input type="text" name="Dashboard" class="text" value=" <?php echo $_SESSION['bddate'] ;  ?>">
                 </div>

                <div class="district ">
                    <label for="">Country</label><br><br>
                    <input type="text" name="cntry" class="text" value=" <?php echo $_SESSION['cntry'] ;  ?>">
                </div>

                
            </form>
        </div>
    </div>
</body>
</html>