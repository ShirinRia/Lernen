
<?php 
$title ='Homepage';
require_once 'db/conn.php';
include_once 'includes/session.php';
//$best = $crud->vdo(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel = "stylesheet" href="css\jquery.bxslider.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="js\jquery.bxslider.js"></script>

  <script>
  $(document).ready(function(){
    $('.slider').bxSlider({
      pager: false
    });
  });
</script>
</head>
<body>
 
<div class="slider">
<?php while($r = $best->fetch(PDO::FETCH_ASSOC)) { ?>
  <div><img src="<?php echo ($r['ansr']) ?>" width="100%" height="300px"></div>
  <?php }?> 


</div>
</body>
</html>