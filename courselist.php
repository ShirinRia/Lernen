<?php 
$title ='Homepage';
require_once 'includes/header_2.php';
require_once 'db/conn.php';
$results = $crud->crslst();

?> 
<?php 
                
                include 'pageheader.php';
                ?> 
<style>
    body{
    background-color:whitesmoke;}
    

    </style>

    <div class="crslist">
    
 <div class="lsthead">
        <h2><span>&nbsp;</span>Courses</h2>
    </div>
    <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
      <div class="lstbdy">
      <div class="crsthumb">
          <img src="images (1).png" alt="img" class="thumb">
       </div>

       <div class="crsdetail">
           <div class="acname">
            <h4><span>Shirin Sultana</span></h4>
            <h4><span><?php echo $r['c_name'] ?></span></h4>
           </div>
           <div class="ovrvw">
               <h5><?php echo $r['des'] ?>
            </div>
       </div>
    </div>
    <?php }?>  
</div>
</body>
</html>