<?php 
$title ='Homepage';
require_once 'includes/header_2.php';
require_once 'db/conn.php';
?> 
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
        <div class="sidebar">
        <?php require_once 'side.php'; ?>
        </div>
        <div class="midle">
            <div class="add">
                <label for="">Close Account</label>
                
            </div>
            <div class="clscnt">
            <h5 style="font-weight: 100; font-size: 20px; line-height: 40px;">
            <span style="color:red; font-weight: 700;">WARNING : </span>
            If you close your account, you will be unsubscribed from all your courses, and will lose access forever.</h5>
            <div class="svbtn">
            <a onclick="return confirm('Are you sure you want to delete your account?');" href="delete.php?us=<?php echo $_SESSION['user'];?>" class="p_btn u_btn" style="background-color:#B7264D;">Close Account</a>
        </div>
        </div>
    </div>  
    </div>
</body>
</html>