<?php 
$title ='Homepage';
require_once 'includes/h3.php';
require_once 'db/conn.php';
$results = $crud->crd();
?>  
      <div class="slider owl-carousel">
       
      
      <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
          <div class="card">
            <img src="images\img1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php echo $r['c_name'] ?></h5>
              <p class="card-text"><?php echo $r['des'] ?></p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Teacher</small>
            </div>
          </div>
          <?php }?>  
      </div>
      <script>
         $(".slider").owlCarousel({
           loop: true,
           autoplay: true,
           autoplayTimeout: 2000, //2000ms = 2s;
           autoplayHoverPause: true,
         });
      </script>
   </body>
</html>