<?php 
$title ='Homepage';
require_once 'db/conn.php';
include_once 'includes/session.php';

$tp = $_SESSION['type'];
if($tp=="Learner"){
include 'lrnrpagehdr.php';}
else
include 'pageheader.php';

                
                 
$uid = $_GET['us'];
$hstry = $crud->hstry($uid); 
?><br><br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  
   <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
   
    <link rel="stylesheet" href="cart.css" />
    <link rel="stylesheet" href="history.css" />
</head>
<body>


    <div class="shpngcrt">
        <h1>Purchase History</h1>
    </div>
    <div class="hstry">
    <table class="table">
        <thead>
          <tr>
           
            <th scope="col">Title</th>
            <th scope="col">Date</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          
      <?php while($r = $hstry->fetch(PDO::FETCH_ASSOC)) { ?>
          <tr>
            <td><?php echo $r['cors_name'] ?></td>
            <td><?php echo $r['register_date'] ?></td>
            <td><?php echo $r['status'] ?></td>
          </tr>
         
          <?php }?>
        </tbody>
      </table>
    </div>
</body>
</html>