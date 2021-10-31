<?php 
$title ='Homepage';
require_once 'includes/header_2.php';
require_once 'db/conn.php';

?> 
<?php 
                
                include 'pageheader.php';
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
                    <input type="text" name="profile" class="text" value="<?php $crud->total_course($_SESSION['user']);?>">
                </div>

                <div class="completed dash">
                    <label for="">Completed Course</label><br><br>
                    <input type="text" name="Courses" class="text" >
                </div>

                <div class="in_progress dash">
                    <label for="">In progress</label><br><br>
                    <input type="text" name="Update" class="text" >
                </div>
            </div>
    </div>
</body>
</html>