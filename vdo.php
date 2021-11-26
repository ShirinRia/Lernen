<?php 
$title ='Homepage';
require_once 'db/conn.php';
include_once 'includes/session.php';

$tcrname = $_GET['tcr'];
$_SESSION['tcr']=$tcrname;
if(isset($_GET['sec'])){
   $id = $_GET['sec'];
   
   $_SESSION['sec']=$id;
  // $rate = $crud->updtstr( $_SESSION['sec'],$_SESSION['userid']);
   $best = $crud->section($id);  
   $fvdo = $crud->section($id); 
   $slide = $crud->vdo($id);
   $descrip = $crud->descrption($id); 
   if($descrip){
    $_SESSION['cdes'] = $descrip['cdes'];
    $_SESSION['tcrid'] = $descrip['tid'];
   }
}
if(isset($_POST['reg'])){
  if($_SESSION['user']=='NULL'){
    header("Location: index1.php");
  }
  else{
  $user=  $_SESSION['user'] ;
  $tcr=  $_SESSION['tcrid'] ;
  $crsid=  $_SESSION['sec'];
  $corsname= $_SESSION['crsname'] ;
  $teacrname=$_SESSION['tcr'];
  $uid=$_SESSION['userid'];
  $success = $crud->insertreg($user,$crsid,$corsname,$teacrname,$uid,$tcr);
  if(!$success){  
    echo '<div class ="alert alert-danger" id= "alert">Already Enrolled</div>';
   //echo 'failllll';
}
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
  $ans= $_POST['ansr'];
  $success = $crud->insertans($id,$ans,$cid);
  if($success){
    header("Location: vdo.php?sec=$cid&tcr=$tcrname");
  }
 
}
$ides = $crud->ides($_SESSION['tcrid']); 

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
   
   
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    


  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <link rel = "stylesheet" href="vdo.css">
    <link rel = "stylesheet" href="review.css">
   
    <script src='https://cdn.tiny.cloud/1/fkrd0r3n731w7mfc23kaaldls1z1msifaezn9lr1bufammwb/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
  <script>
  tinymce.init({
    selector: '#mytextarea'

  });
  </script>
 <script>
    tinymce.init({
      selector: '#mytxtarea'
      
    });
    </script>
     
        </script>
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
.tox-statusbar__text-container{
          visibility: hidden;
      }
      .color{
        background-color: gray;
      }
      .clr{
       
        color: white;
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
      <?php while($r = $slide->fetch(PDO::FETCH_ASSOC)) { ?>
  <div>
    <!--<img src="<?php echo ($r['ansr']) ?>" width="100%" height="450px">-->
    <iframe src="<?php echo ($r['ansr']) ?>" width="100%" height="450px" ></iframe></div>
  <?php }?> 


      </div>
    </div>
     
      <div class="dbar">
        <nav id="navbar-example2" class="navbar navbar-light bg-light px-3">
           
        <ul class="nav nav-pills " style="  background: linear-gradient(
        45deg, #842E62, #B7264D); ">
              <li class="nav-item" id="ovr" style="border-bottom:none; border-top:none;  "> 
                <button   onclick="togglePanel3()" class="navbar-brand" style="background-color:transparent; color:white">Overview</button>
              </li>
              <li class="nav-item" id="ovr2" style="border-bottom:none; border-top:none;  ">
                <button onclick="togglePanel2()" class="navbar-brand" style="background-color:transparent; color:white">Q&A</button>
              </li>
              <li class="nav-item" id="ovr3" style="   border-bottom:none; border-top:none; ">
                <button onclick="togglePanel()" class="navbar-brand" style="background-color:transparent; color:white">Review</button>
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
                 <div class="irvw updestxt">
            <textarea id="mytxtarea" name="rev" ></textarea>
        </div>
                  <!--<input type="text" class="irvw" name="rev" placeholder="Write your review here">-->
                  <input type="submit" class="rbtn" name="review" value="Submit Review" style="top:70px;background: linear-gradient(
        45deg, #842E62, #B7264D);"></form>
              </div>
       
        </div>

        <div class="rvwx" id="qus">
        
      <div class="wrtrvw">
         <h5 class="txt"><span>Ask Your Question</span></h5> 
         <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
         <div class="irvw updestxt">
            <textarea id="mytextarea" name="qus" ></textarea>
        </div>
         <!-- <input type="text" class="irvw" name="qus" placeholder="I didn't understand this part">-->
          <input type="submit" class="rbtn" name="qustn" value="ASK" style="top: 70px;background: linear-gradient(
        45deg, #842E62, #B7264D);"></form>
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
    
      <div class="posi rplybx" id="ans" style="border:none;">
      
            <textarea  col="30" name="ansr" style="height: 100%;width: 100%;" >Add Your Answer </textarea>
      
     <!-- <input type="text"  class="btn" name="ansr" placeholder="Write Your Answer">-->
      <input type="text"  class="no" name="tstis" value="<?php echo $r['id'] ?>">
        
        
        <input type="Submit"  class="btn posia"  name="answer" value="Answer" style="left: 500px;background: linear-gradient(
        45deg, #842E62, #B7264D);">
           
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
        document.getElementById("ovr3").classList.add("color");
        document.getElementById("ovr").classList.remove("color");
        document.getElementById("ovr2").classList.remove("color");
       }
       function togglePanel2() {
        document.getElementById("rvw").classList.remove("visible");
        document.getElementById("qus").classList.add("visible");
        
        document.getElementById("ovrviw").classList.add("invisible");
        document.getElementById("ovr2").classList.add("color");
        document.getElementById("ovr3").classList.remove("color");
        document.getElementById("ovr").classList.remove("color");
       }
       function togglePanel3() {
        document.getElementById("rvw").classList.remove("visible");
        document.getElementById("qus").classList.remove("visible");
        document.getElementById("ovrviw").classList.remove("invisible");
        document.getElementById("ovr").classList.add("color");
        document.getElementById("ovr2").classList.remove("color");
        document.getElementById("ovr3").classList.remove("color");
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