<?php 
$title ='Homepage';
require_once 'db/conn.php';
$results = $crud->crd();
?>  

<?php 
                
                include 'pageheader.php';
                ?> 
  <?php 
                
                include 'test.php';
                ?> 
  
</body>
</html>