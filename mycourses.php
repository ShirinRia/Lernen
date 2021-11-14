<?php 
$title ='Homepage';
include_once 'includes/session.php';

require_once 'db/conn.php';

$uid=$_SESSION['userid'];

$results = $crud->mycrs($uid);

$archv = $crud->myarchv($uid);

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
    
    <link rel = "stylesheet" href="card_my.css">
    <link rel = "stylesheet" href="mycourse.css">
</head>
<body>

    <div class="corse_container">
       <div class="mycourses">
           <h3 class="crstitl">My Courses</h3><br>
           <div class="my_menu">
                <nav class="my_main_menu">
                    <ul class="my_mainmenu">
                        <li class="my_mainmenu">
                            <button class="anchor" onclick="togglePanel2()" >All Courses</button>
                        </li>
                        
                        <li class="my_mainmenu">
                            <button class="anchor" onclick="togglePanel()">
                               Archived
                            </button>
                        </li>
                    
                    </ul>
                </nav>
            </div>
       </div>
       <div class="mid_cntnt">
       
    <div class="newlylaunched" id="all">
        <div class="card-group">
        
        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
            <a href="vdo.php?sec=<?php echo $r['c_id']?>&tcr=<?php echo $r['tcr_name'];?>">  
              <div class="testng">
              <div class="crd crdth">
                <img src="<?php echo empty($r['img_path']) ? "uploads/images (1).png" : $r['img_path'] ; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $r['cors_name'] ?></h5>
                  <p class="card-text">Create&nbsp;by&nbsp;<b><?php echo $r['tcr_name'] ?></b></p>
                </div>
                <a href="archv.php?arc=<?php echo $r['c_id'];?>">
                <div class="card-footer">
                <button name="archive" class="archv">Archive</button>
              </div></a>
               </div>
              </div>
              </a>
          <?php }?> 
      
            
    </div>
</div>
<div class="newlylaunched archived invisible" id="archvd">
    <div class="card-group">
    <?php while($r = $archv->fetch(PDO::FETCH_ASSOC)) { ?>
              <div class="testng">
              <div class="crd crdth">
                <img src="<?php echo ($r['img_path'])?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $r['c_name'] ?></h5>
                  <p class="card-text">Create&nbsp;by&nbsp;<b><?php echo $r['tchr'] ?></b></p>
                </div>
               </div>
              </div>
                 
          <?php }?> 
          
</div>
</div>
</div>
</div>
<script>
    function togglePanel() {
    document.getElementById("archvd").classList.remove("invisible");
    document.getElementById("all").classList.add("invisible");
    
   }
   function togglePanel2() {
    document.getElementById("all").classList.remove("invisible");
    document.getElementById("archvd").classList.add("invisible");
   }
   
</script>

</body>
</html>