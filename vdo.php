<?php 
$title ='Homepage';
require_once 'db/conn.php';
include_once 'includes/session.php';

$tcrname = $_GET['tcr'];
$_SESSION['tcr']=$tcrname;
if(isset($_GET['sec'])){
   $id = $_GET['sec'];
   $_SESSION['sec']=$id;
   $best = $crud->section($id);  
   $fvdo = $crud->section($id); 
   $vdo = $crud->vdo($id);
   $descrip = $crud->descrption($id); 
   if($descrip){
    $_SESSION['cdes'] = $descrip['cdes'];

   }
}
if(isset($_POST['reg'])){
  $user=  $_SESSION['user'] ;
  $tcr=  $_SESSION['tcrid'] ;
  $crsid=  $_SESSION['sec'];
  $corsname= $_SESSION['crsname'] ;
  $teacrname=$_SESSION['tcrname'];
  $uid=$_SESSION['userid'];
  $success = $crud->insertreg($user,$crsid,$corsname,$teacrname,$uid,$tcr);
  if(!$success){
    echo '<div class ="alert alert-danger" id= "alert">Already Enrolled</div>';
   //echo 'failllll';
}
}

if(isset($_POST['review'])){
  
  $user=  $_SESSION['user'] ;
  $crsid=  $_SESSION['sec'];
  $tcrname=  $_SESSION['tcrname'];
  $rvw= $_POST['rev'];
  $success = $crud->insertrvw($user,$crsid,$rvw);
  if($success){
    header("Location: vdo.php?sec=$crsid&tcr=$tcrname");
  }

}
if(isset($_POST['qustn'])){
  $user=  $_SESSION['user'] ;
 $cid=$_SESSION['sec'];
  $qs= $_POST['qus'];
  
  $tcrname=  $_SESSION['tcrname'];
  $success = $crud->insertqus($user,$qs,$cid);
  if($success){
    header("Location: vdo.php?sec=$cid");
  }

}
if(isset($_POST['answer'])){
  $user=  $_SESSION['user'] ;
  $cid=$_SESSION['sec'];
  $id= $_POST['tstis'];
 // print_r($id);
  //$id=20;
  $ans= $_POST['ansr'];
  $success = $crud->insertans($id,$ans,$cid);
  if($success){
    header("Location: vdo.php?sec=$cid&tcr=$tcrname");
  }
 
}
$ides = $crud->ides(2); 

$qutn = $crud->qustn($_SESSION['sec']); 
$qustn = $crud->questn($_SESSION['sec']); 
//$quz = $crud->quiz($_SESSION['sec']); 

if(isset($_POST['qstatus'])){
  $qb= $_POST['qbstatus'];
  $qm= $_POST['qmstatus'];
  $vd= $_POST['vstatus'];
  $slde= $_POST['vstatus'];
  
  $tcrname=  $_SESSION['tcrname'];
  $cid=$_SESSION['sec'];
  $user=  $_SESSION['user'] ;
  if($vd=="done" && $slde=="done" && $qb=="done" && $qm=="done"){
     
      
      
      $status = $crud->updtstts($user,$cid);
      header("Location: vdo.php?sec=$cid&tcr=$tcrname");
      
  }
    else{
      header("Location: vdo.php?sec=$cid&tcr=$tcrname");
    }
   
  }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" 
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
   
    <link rel = "stylesheet" href="css\jquery.bxslider.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
  <script type="text/javascript" src="js\jquery.bxslider.js"></script>

  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <link rel = "stylesheet" href="vdo.css">
    <link rel = "stylesheet" href="review.css">
   
  
 
    <style>
       .spce{
        padding-left: 10px;
      }
      .tst{
        color: white;
        background-color:white;
        height: 13px;
        width: 13px;
       border-radius: 3px;
        border: 1px solid gray;
      }
      .mfp-hide{
          
          display: none;
      }
      .mfp-close,.mfp-preloader{
         display: none;
      }
      .vdocntnt{
          width: 10%;
          height: 40px;
      }
      .vs{
        visibility: hidden;
        
      }
    .vdosld{
      visibility: hidden;
}
  </style>
    
</head>
<body>
 <div class="sec1">
  <div class="vdo_cntnr " id="vdo">
  <?php while($r = $fvdo->fetch(PDO::FETCH_ASSOC)) { ?>
  <video class="vdo"  height="240" width="1320" controls>
            <source src="<?php echo ($r['video']) ?>" type="video/mp4">
            Your browser does not support the video tag.
          </video>
          <?php }?> 
      </div>
      <div class="vdo_cntnr vs">
      <div class="slider" id="ppt">
      <?php while($r = $vdo->fetch(PDO::FETCH_ASSOC)) { ?>
  <div><img src="<?php echo ($r['ansr']) ?>" width="100%" height="450px"></div>
  <?php }?> 


      </div>
    </div>
     
      <div class="dbar">
        <nav id="navbar-example2" class="navbar navbar-light bg-light px-3">
           
        <ul class="nav nav-pills ">
              <li class="nav-item">
                <button onclick="togglePanel3()" class="navbar-brand" >Overview</button>
              </li>
              <li class="nav-item">
                <button onclick="togglePanel2()" class="navbar-brand" >Q&A</button>
              </li>
              <li class="nav-item">
                <button onclick="togglePanel()" class="navbar-brand" >Review</button>
              </li>
            </ul>
          </nav>
          <div class="rvwbx" id="rvw">
              <span class="txt maiin">Give Feedback</span><br><br>
             <div class="rating">
             <br><br> <h5 class="txt"><span>Rating</span></h5><br><br>
                  
                  <?php include 'star.php'; ?><br><br>
              </div>
              <div class="wrtrvw">
                 <h5 class="txt"><span>Write a Review</span></h5> 
                 <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                  <input type="text" class="irvw" name="rev" placeholder="Write your review here"><br><br>
                  <input type="submit" class="rbtn" name="review" value="Submit Review"></form>
              </div>
       
        </div>

        <div class="rvwx" id="qus">
        
      <div class="wrtrvw">
         <h5 class="txt"><span>Ask Your Question</span></h5> 
         <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
          <input type="text" class="irvw" name="qus" placeholder="I didn't understand this part"><br><br>
          <input type="submit" class="rbtn" name="qustn" value="ASK"></form>
      </div>
      <div class="askd">
        <h2> <span class="bordr">Already Asked</span></h2>
         
       
     <?php while($r = $qustn->fetch(PDO::FETCH_ASSOC)) { ?>
      <div class="bx">
      <div  class="vdbx">
         <h3 class="txtcntnt"><?php echo $r['user'] ?></h3>
         <h5 class="txtcntnt"><b>QUESTION&nbsp;:&nbsp;&nbsp;</b><?php echo $r['ques'] ?></h5>
        <h5 class="txtcntnt"><b>ANSWER&nbsp;:&nbsp;&nbsp;</b><?php echo $r['ans'] ?></h5>
      </div>
      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"  method="post">
      <div class="rply" id="<?php echo $r['id'] ?>">
      </div>
    
      <div class="posi rplybx" id="ans">
      <input type="text"  class="btn" name="ansr" placeholder="Write Your Answer"><br>
      <input type="text"  class="no" name="tstis" value="<?php echo $r['id'] ?>">
        
        
        <input type="Submit"  class="btn posia"  name="answer" placeholder="Answer">
           
      </div>
    </form>
  </div>
  
  <?php }?>  
     </div>
      
  </div>

  <div class="ovrvw" id="ovrviw">
    <span class="txt maiin">About The Course</span><br><br>
    <span>Students: <?php $crud->snum($_SESSION['sec']);?></span><br><br>
    <!--<span>Section: 4</span>-->
    <div class="rating">
        <h5 class="txt"><span>Description</span></h5>
        <span><?php echo $_SESSION['cdes']?></span>
    </div>
    <div class="wrtrvw">
       <h5 class="txt"><span>Instructor</span></h5> 
       <span> <img src="images\images.jpg" height="80px" width="100px" style="border-radius: 50px;"></span>
      <span>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tcrname ?></span><br><br><br>
       <span><?php echo $ides['ides'] ?></span>
    </div>
</div>
      </div>
    </div>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
      <div class="container">
        <div class="accordion" id="accordionExample">
      <?php while($r = $best->fetch(PDO::FETCH_ASSOC)) { ?>
          
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
            <button onclick="togglePanelvdo()"   class="accordion-button"type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <input type="checkbox" id="stts"  name="vstatus" value="done"><span  class="spce"><?php echo $r['name'] ?></span></button>
             
            </h2>
            
          </div>
          <?php }?>  
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
            <button onclick="togglePanelppt()"  class="accordion-button"type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <input type="checkbox" id="stts"  name="sstatus" value="done"><span  class="spce">Slide</span></button>
               
              
            </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
           
            <a href="main.php?sec=<?php echo $_SESSION['sec'];?>&b=Basic" target="_blank" class="accordion-button" style="text-decoration: none; color:black;"><input type="checkbox" id="stts"  class="tst" name="qbstatus" value="done"><span  class="spce">Quiz&nbsp;(Basic Level)</span></a>
            <a href="main.php?sec=<?php echo $_SESSION['sec'];?>&b=Medium" target="_blank" class="accordion-button" style="text-decoration: none; color:black;"><input type="checkbox" id="stts"  class="tst" name="qmstatus" value="done"><span  class="spce">Quiz&nbsp;(Medium Level)</span></a>
            <a href="main.php?sec=<?php echo $_SESSION['sec'];?>&b=High" target="_blank" class="accordion-button" style="text-decoration: none; color:black;"><input type="submit" id="stts"  class="tst" name="qstatus" value="done"><span  class="spce">Quiz&nbsp;(High Level)</span></a>
            </h2>
            </div>
              
            
            
          </div>
        </div>
    </form>
      <script>
        function togglePanel() {
        document.getElementById("rvw").classList.add("visible");
        document.getElementById("qus").classList.remove("visible");
        
        document.getElementById("ovrviw").classList.add("invisible");
       }
       function togglePanel2() {
        document.getElementById("rvw").classList.remove("visible");
        document.getElementById("qus").classList.add("visible");
        
        document.getElementById("ovrviw").classList.add("invisible");
       }
       function togglePanel3() {
        document.getElementById("rvw").classList.remove("visible");
        document.getElementById("qus").classList.remove("visible");
        document.getElementById("ovrviw").classList.remove("invisible");
       }
       function togglePanelppt() {
        document.getElementById("ppt").classList.add("visible");
        
        document.getElementById("vdo").classList.add("vdosld");
       }
       function togglePanelvdo() {
        document.getElementById("vdo").classList.remove("vdosld");
        document.getElementById("ppt").classList.remove("visible");
       }
      
    </script>
   
    <script>
  $(document).ready(function(){
    $('.slider').bxSlider({
      pager: false
    });
  });
</script>

 
    <script src="alert_copy.js" type="text/javascript"></script>
</body>
</html>