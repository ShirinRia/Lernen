<?php 
$title ='Homepage';
include_once 'includes/session.php';
require_once 'db/conn.php';
$results = $crud->crd();
?>  

<?php 
                 $tp = $_SESSION['type'];
                 if($tp=="Learner"){
                include 'lrnrpagehdr.php';}
                else if($tp=="Teacher")
                include 'pageheader.php';
               
                ?> 
  <?php 
                
                include 'test.php';
                ?> 
  
</body>
</html>