<?php 
$title ='Homepage';
require_once 'db/conn.php';
include_once 'includes/session.php';

if(isset($_GET['sec'])){
   $id = $_GET['sec'];
   $best = $crud->section($id);  
   
}
if(isset($_POST['reg'])){
  $user=  $_SESSION['user'] ;
  $crsid=  $_SESSION['sec'];
  $success = $crud->insertreg($user,$crsid);
  
}
if(isset($_POST['review'])){
  $user=  $_SESSION['user'] ;
  $crsid=  $_SESSION['sec'];
  $rvw= $_POST['rev'];
  $success = $crud->insertrvw($user,$crsid,$rvw);
  if($success){
    $best = $crud->section($crsid); 
  }

}
if(isset($_POST['qustn'])){
  $user=  $_SESSION['user'] ;
 $cid=$_SESSION['sec'];
  $qs= $_POST['qus'];
  $success = $crud->insertqus($user,$qs);
  if($success){
    $best = $crud->section($cid); 
  }

}
 
$quz = $crud->quiz($_SESSION['sec']); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <link rel = "stylesheet" href="vdo.css">
    <link rel = "stylesheet" href="review.css">
</head>
<body>
 <div class="sec1">
  <div class="vdo_cntnr">
        <video class="vdo"  height="240" width="1320" controls>
            <source src="" type="video/mp4">
            Your browser does not support the video tag.
          </video>
          
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
              <span class="txt maiin">Give Feedback</span>
              <div class="rating">
                  <h5 class="txt"><span>Rating</span></h5>
                  <span>&#11088;</span>
                  <span>&#11088;</span>
                  <span>&#11088;</span>
                  <span>&#11088;</span>
                  <span>&#11088;</span>
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
      
  </div>

  <div class="ovrvw" id="ovrviw">
    <span class="txt maiin">About The Course</span><br><br>
    <span>Students: 1000</span><br><br>
    <span>Section: 4</span>
    <div class="rating">
        <h5 class="txt"><span>Description</span></h5>
        <span>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste amet, voluptates ex odio voluptas, beatae omnis unde esse sunt placeat doloribus nesciunt, eligendi voluptatum quaerat dolores! Cupiditate, porro ullam minus sit asperiores similique veritatis nemo suscipit culpa commodi nobis possimus optio sapiente magnam vitae maxime, error a fugiat ratione, soluta aperiam consequuntur. Itaque, neque numquam. Repudiandae, quo? Maiores a, tenetur animi excepturi perspiciatis maxime sunt sint iure optio, laudantium dignissimos tempore aliquam quo aspernatur eligendi placeat dolorem minima ea quod? Nostrum numquam dolore sequi odio at ullam, ad obcaecati unde rerum, perferendis aliquid natus maxime a maiores explicabo sit fugiat.</span>
    </div>
    <div class="wrtrvw">
       <h5 class="txt"><span>Instructor</span></h5> 
       <span> <img src="images\images.jpg"></span>
      <span>Shirin Sultana</span><br>
       <span>I am a Software Engineer and part time lecturer. 

        With a Master's Degree in Computer Science, I have spent over a decade teaching Web, Software and Database Development Courses. I also have as much industry experience in Web Application Development and Azure Cloud System and Server Administration.
        
        I enjoy teaching IT and Development courses and hope to impart the latest in industry standards and knowledge to my students.</span>
    </div>
</div>
      </div>
    </div>
    
      <div class="container">
        <div class="accordion" id="accordionExample">
      <?php while($r = $best->fetch(PDO::FETCH_ASSOC)) { ?>
          
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              <?php echo $r['name'] ?>
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
              </div>
            </div>
          </div>
          <?php }?>  
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
            <?php while($r = $quz->fetch(PDO::FETCH_ASSOC)) { ?>
              <a href="<?php echo $r['link'] ?>" target="_blank" class="accordion-button" style="text-decoration: none; color:black;"><span>Quiz</span></a></h4>
           </div>
              <?php }?>
            </h2>
            
          </div>
        </div>
      </div>
      <script>
        function togglePanel() {
        document.getElementById("rvw").classList.add("visible");
        document.getElementById("qus").classList.remove("visible");
        
        document.getElementById("ovrviw").classList.remove("visible");
       }
       function togglePanel2() {
        document.getElementById("rvw").classList.remove("visible");
        document.getElementById("qus").classList.add("visible");
        
        document.getElementById("ovrviw").classList.remove("visible");
       }
       function togglePanel3() {
        document.getElementById("rvw").classList.remove("visible");
        document.getElementById("qus").classList.remove("visible");
        document.getElementById("ovrviw").classList.add("visible");
       }
    </script>
</body>
</html>