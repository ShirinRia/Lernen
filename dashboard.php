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
            <div class="up">
           

                <div class="add">
                    <label for="">Dashboard</label>
                    
                </div>

        </div>
            <div class="c_dash">
                <div class="total dash">
                    <label for="">Total Course</label><br><br>
                    <input type="text" name="profile" class="text" value="<?php $crud->total_course($_SESSION['user']);?>" style="text-align:center;">
                </div>

                <div class="completed dash">
                    <label for="">Completed Course</label><br><br>
                    <input   type="text" name="Courses" class="text" value="<?php $crud->completed_course($_SESSION['user']);?> " style="text-align:center;">
                </div>

                <div class="in_progress dash">
                    <label for="">In progress</label><br><br>
                    <input type="text" name="Update" class="text" value="<?php $crud->in_progress_course($_SESSION['user']);?>" style="text-align:center;">
                </div>
            </div>
    </div>
</body>
</html>