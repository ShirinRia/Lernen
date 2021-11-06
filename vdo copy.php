<?php 
$title ='Homepage';
require_once 'db/conn.php';
include_once 'includes/session.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <link rel = "stylesheet" href="css\jquery.bxslider.css.css">
    <script type="text/javascript" src="js\jquery.bxslider.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <style>
      .slider{
        border: 1px solid red;
      }
    </style>
   
  <script>
  $(document).ready(function(){
    $('.slider').bxSlider();
  });
</script>
</head>
<body>
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
<div class="slider">
  <div><img src="images\images.jpg" width="100%" height="300px"></div>
  </div>
</div>

</div>
</body>
</html>