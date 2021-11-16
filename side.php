<?php 
$title ='Index';
require_once 'includes/header_2.php';
require_once 'db/conn.php';?>
<div class="sidebar">
<div class="image" style=" height: 400px;padding-top:50px;">

            <img src="<?php echo ($_SESSION['pimg']);?>" alt="book" width=100% height=80% style="position:relative; left: -50px;">
        </div>
                
            <div class="sidecontent">
               
            <a href="profile.php?us=<?php echo $_SESSION['user'];?>">
                <input type="submit" name="profile" class="p_btn" value="Profile"></a>
                <a href="mycourses.php?us=<?php echo $_SESSION['user'];?>">
                <input type="submit" name="Courses" class="p_btn" value="My Courses"></a>
                <a href="update.php">
                <input type="submit" name="Update" class="p_btn" value="Profile Update">
                <a href="dashboard.php?us=<?php echo $_SESSION['userid'];?>">
                <input type="submit" name="Dashboard" class="p_btn" value="Dashboard"></a>
                <a href="close.php">
                <input type="submit" name="close" class="p_btn" value="Close Account"></a>
            </div>
        </div>
</body>
<html>