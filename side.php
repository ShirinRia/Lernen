<?php 
$title ='Index';
require_once 'includes/header_2.php';
require_once 'db/conn.php';?>
<div class="sidebar">
            <div class="sidecontent">
            <a href="profile.php">
                <input type="submit" name="profile" class="p_btn" value="Profile"></a>
                <input type="submit" name="Courses" class="p_btn" value="My Courses">
                <a href="update.php">
                <input type="submit" name="Update" class="p_btn" value="Profile Update">
                <a href="dashboard.php">
                <input type="submit" name="Dashboard" class="p_btn" value="Dashboard"></a>
                <a href="close.php">
                <input type="submit" name="close" class="p_btn" value="Close Account"></a>
            </div>
        </div>
</body>
<html>