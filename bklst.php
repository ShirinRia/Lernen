<?php 
$title ='Homepage';
require_once 'db/conn.php';
include 'lrnrpagehdr.php';
$best = $crud->best();  
$dev= $crud->devlpmnt();  
$gk = $crud->genknw();  
$ielts = $crud->ilts();   
$ib = $crud->islamic();  
$dsgn= $crud->design();  
$as = $crud->school();  
$ac = $crud->college();  
$el = $crud->english();    
?>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Owl-carousel Cards Slider</title>
      <link rel="stylesheet" href="bklst.css">
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <style>
            body{
                background-color:whitesmoke;
            }
        </style>
    </head>
   <body>
  
    <div class="bkhdr">
      <span> Best&nbsp;&nbsp;Sell</span>
    </div>
  
      <div class="slider owl-carousel">
      <?php while($r = $best->fetch(PDO::FETCH_ASSOC)) { ?>
          <div class="card">
            <img src="images\Bannr (1).jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php echo $r['bname'] ?></h5>
              <p class="card-text"><?php echo $r['bdes'] ?></p>
            </div>
            
          </div>
          <?php }?>  
      </div>
    
      <div class="bkhdr acsghl">
        <span>Development</span>
      </div>
      <div class="slider owl-carousel">
      <?php while($r = $dev->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="card">
          <img src="images\Bannr (1).jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $r['bname'] ?></h5>
            <p class="card-text"><?php echo $r['bdes'] ?></p>
          </div>
        </div>
        
        <?php }?> 
    
</div>

<div class="bkhdr acsghl">
    <span>General&nbsp;&nbsp;Knowledge</span>
  </div>
  <div class="slider owl-carousel">
     
  <?php while($r = $gk ->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="card">
          <img src="images\Bannr (1).jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $r['bname'] ?></h5>
            <p class="card-text"><?php echo $r['bdes'] ?></p>
          </div>
        </div>
        
        <?php }?> 
    
</div>


<div class="bkhdr acsghl">
    <span> IELTS</span>
  </div>
  <div class="slider owl-carousel">
     
  <?php while($r = $ielts->fetch(PDO::FETCH_ASSOC)) { ?>
    <a href="#">
        <div class="card">
          <img src="images\Bannr (1).jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $r['bname'] ?></h5>
            <p class="card-text"><?php echo $r['bdes'] ?></p>
          </div>
        </div>
       </a>
        <?php }?> 
    
</div>


<div class="bkhdr acsghl">
    <span>Islamic&nbsp;&nbsp;Books</span>
  </div>
  <div class="slider owl-carousel">
     
  <?php while($r = $ib->fetch(PDO::FETCH_ASSOC)) { ?>
    <a href="#">
        <div class="card">
          <img src="images\Bannr (1).jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $r['bname'] ?></h5>
            <p class="card-text"><?php echo $r['bdes'] ?></p>
          </div>
        </div>
    </a>
        <?php }?> 
   
</div>


<div class="bkhdr acsghl">
    <span>Design</span>
  </div>
  <div class="slider owl-carousel">
     
  <?php while($r = $dsgn->fetch(PDO::FETCH_ASSOC)) { ?>
    <a href="#">
        <div class="card">
          <img src="images\Bannr (1).jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $r['bname'] ?></h5>
            <p class="card-text"><?php echo $r['bdes'] ?></p>
          </div>
        </div>
    </a>
        <?php }?> 
</div>

<div class="bkhdr acsghl">
    <span>Academic&nbsp;&nbsp;(School)</span>
  </div>
  <div class="slider owl-carousel">
     
  <?php while($r = $as->fetch(PDO::FETCH_ASSOC)) { ?>
    <a href="#">
        <div class="card">
          <img src="images\Bannr (1).jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $r['bname'] ?></h5>
            <p class="card-text"><?php echo $r['bdes'] ?></p>
          </div>
        </div>
    </a>
        <?php }?> 
   
</div>


<div class="bkhdr acsghl">
    <span>Academic&nbsp;&nbsp;(College)</span>
  </div>
  <div class="slider owl-carousel">
     
  <?php while($r = $ac->fetch(PDO::FETCH_ASSOC)) { ?>
    <a href="#">
        <div class="card">
          <img src="images\Bannr (1).jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $r['bname'] ?></h5>
            <p class="card-text"><?php echo $r['bdes'] ?></p>
          </div>
        </div>
        </a>
        <?php }?> 
    
</div>


<div class="bkhdr acsghl">
    <span>English&nbsp;&nbsp;Learning</span>
  </div>
  <div class="slider owl-carousel">
     
  <?php while($r = $el->fetch(PDO::FETCH_ASSOC)) { ?>
    <a href="#">
        <div class="card">
          
          <img src="images\Bannr (1).jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $r['bname'] ?></h5>
            <p class="card-text"><?php echo $r['bdes'] ?></p>
          </div>
        </div>
    </a>
        <?php }?> 
</div>

      <script>
         $(".slider").owlCarousel({
           loop: false,
           autoplay: true,
           autoplayTimeout: 2000, //2000ms = 2s;
           autoplayHoverPause: true,
         });
      </script>
   </body>
</html>