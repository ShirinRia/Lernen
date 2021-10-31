<?php 
$title ='Homepage';

include_once 'includes/session.php';
require_once 'db/conn.php';

$results = $crud->status($_SESSION['tcrid']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css\signin.css" />
    <link rel="stylesheet" href="status.css" />  
</head>
<body>
    <div class="crsmid">
       <div class="sttsbar">
           
           <div class="enrll">
            <a href="#">Total Enrollment</a>
            <h4 class="ennum"><?php $crud->ttlstdntnum($_SESSION['tcrid']);?></h4>
           </div>
           
       </div>
       <div class="crstbl">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Created Date</th>
                <th scope="col">Total Students</th>
              </tr>
            </thead>
            <tbody>
            <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
              <tr>
                <td><?php echo $r['c_id'] ?></td>
                <td><?php echo $r['c_name'] ?></td>
                <td><?php echo $r['Date'] ?></td>
                <td><?php $crud->stdntnum($r['c_id']);?></td>
              </tr>
              <?php }?> 
             
            </tbody>
          </table>
       </div>
    
    </div>
</body>
</html>
<body>
    
</body>
</html>