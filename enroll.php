<?php 
$title ='Homepage';
require_once 'db/conn.php';
include_once 'includes/session.php';
if(!isset($_GET['cat'])){
    echo 'not found';
     
 } 
 else{
     $id = $_GET['cat'];
     $result = $crud->enrl($id);
     $_SESSION['sec'] = $id;
     $_SESSION['crsname'] = $result['c_name'];
     $_SESSION['tcrname'] = $result['tname'];
     $_SESSION['tcrid'] = $result['tid'];
     $_SESSION['caname'] = $result['category'];
     $_SESSION['descrptn'] = $result['cdes'];
     $_SESSION['rtng'] = $result['rating'];
     $_SESSION['learn'] = $result['learn'];
     $ctid=$_SESSION['caname'];
     $_SESSION['crsdes'] = $result['des'];
     $_SESSION['img'] = $result['img_path'];
     $ctgry = $crud-> ecat($ctid); 
     $_SESSION['catname'] = $ctgry['Category'];
     $rvw = $crud-> revew($id); 
    // $_SESSION['us'] = $rvw['user'];
    // $_SESSION['rv'] = $rvw['review'];
 }
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="sec.css">
    <link rel="stylesheet" href="enroll.css">
</head>
<body>
    <div class="bnr">
        <h2><?php echo $_SESSION['crsname']  ?></h2>
        <div class="scnd">
        <span class="catgry"><?php echo $_SESSION['catname']?></span>
     <span><?php echo round($_SESSION['rtng'],2)?>&#11088;</span>
        <span style="position: relative; top: 3px;"><?php $crud->snum($_SESSION['sec']);?> &nbsp;&nbsp;Students</span>
        
    </div>
        <p class="thrd">Created &nbsp; By&nbsp;  <span class="authr"><u><?php echo $_SESSION['tcrname']?></u></span></p>
        <div class="logo">
                        <a href="home.php" class=anchor >Lernen</a>
                    </div>
    </div>
    <div class="enrol">
        <div class="img">
            <img src="<?php echo $_SESSION['img']  ?>" alt="images" class="imgs" style="width: 100%; height: 10%">
            
        </div>
        <div class="incld">
            <span>What you will learn from this course?</span>
            <ul>
                <li><?php echo $_SESSION['learn']?></li>
            </ul>
            
            <form action="vdo.php?sec=<?php echo $_SESSION['sec'];?>&tcr=<?php echo $_SESSION['tcrname'];?>" method="post">
            
                <button type="submit" name="reg" class="strt">
            
                     Enroll Now
                </button>
            </form>
        </div>
    </div>
    <div class="ovrvw">
        <h4>Course Overview</h4>
        <?php echo $_SESSION['crsdes']  ?>
    </div>
    <div class="rvw">
       <h2> <span>Reviews</span></h2>
       <?php while($r = $rvw->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="bx">
        <div  class="vdbx">
           <h4><?php echo ($r['user']) ?></h4>
         <!--  <span>&#11088;</span>-->
          <h5><?php echo ($r['review']) ?></h5>
        </div>
        
    </div>
    <?php }?> 
    <br><br><br><br>
    
    </div>
    <br><br><br><br>
</body>
</html>