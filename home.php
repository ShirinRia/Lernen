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
                else
                include 'pageheader.php';
                ?> 
  <?php 
                
                include 'test.php';
                ?> 
  
</body>
</html>