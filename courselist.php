<?php 
$title ='Homepage';
require_once 'includes/header_2.php';
require_once 'db/conn.php';


     $id = $_GET['cat'];
     $res = $crud->crslst($id);
    

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
    
    <?php while($r = $res->fetch(PDO::FETCH_ASSOC)) { ?>
        <a href="enroll.php?cat=<?php echo $r['c_id'];?>">
      <div class="lstbdy">
      <div class="crsthumb">
          <img src="<?php echo empty($r['img_path']) ? "uploads/images (1).png" : $r['img_path'] ; ?>" class="thumb" style="width: 100%; height: 100%" />
       </div>

       <div class="crsdetail">
           <div class="acname">
            <h4><span><?php echo $r['tname'] ?></span></h4>
            <h4><span><?php echo $r['c_name'] ?></span></h4>
           </div>
           <div class="ovrvw">
               <h5><?php echo $r['des'] ?>
            </div>
            <div class="addtocrt">
            <div class="incld">
                <span>This Course Includes</span>
                <ul style="list-style-type: circle;">
                    <li>one</li>
                    <li>two</li>
                    <li>three</li>
                </ul>
               
                
            </div>
            <a href="cart.php" >
               <input type="submit" value="ADD TO CART" name="addcrt" class="addcrt"></a>
           </div>  
       </div>
    </div>
    </a> 
    
    <?php }?>
</div>
</body>
</html>