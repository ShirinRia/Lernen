<?php 
$title ='Homepage';
require_once 'db/conn.php';
$best = $crud->section();  
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
                <a class="navbar-brand" href="#scrollspyHeading1">Overview</a>
              </li>
              <li class="nav-item">
                <a class="navbar-brand" href="#scrollspyHeading2">Review</a>
              </li>
              <li class="nav-item">
                <a class="navbar-brand" href="#scrollspyHeading2">Q&A</a>
              </li>
            </ul>
          </nav>
          <div class="dcntnt">
            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
                <h4 id="scrollspyHeading1">First heading</h4>
                <p>...</p>
                <h4 id="scrollspyHeading2">Second heading</h4>
                <p>...</p>
                <h4 id="scrollspyHeading3">Third heading</h4>
                <p>...</p>
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
        </div>
      </div>
     
</body>
</html>