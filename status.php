<?php 
$title ='Homepage';

include_once 'includes/session.php';
require_once 'db/conn.php';

$results = $crud->status($_SESSION['userid']);
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

<div class="crsside">
        <div class="hdr">
            Upload Your Content
        </div>
        <div class="sdcntnton sdcntnt">
        <a href="upload.php">Course</a></div>
        <div class="sdcntnttwo sdcntnt">
        <a href="bupload.php">Book</a></div>
        <div class="sdcntntthre sdcntnt">
        <a href="status.php">Status</a></div>
        <div class="sdcntntthre sdcntnt">
        <a href="index.php">Exit</a></div>
    </div>
    <div class="crsmid" style="height: 1600px;">
       <div class="sttsbar">
           
           <div class="enrll">
            <a href="#">Total Enrollment</a>
            <h4 class="ennum"><?php $crud->ttlstdntnum($_SESSION['userid']);?></h4>
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
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
            <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
              <form action="chng.php?courseid=<?php echo $r['c_id']?>" method="post">
              <tr>
                <td><?php echo $r['c_id'] ?></td>
                <td><?php echo $r['c_name'] ?></td>
                <td><?php echo $r['Date'] ?></td>
                <td><?php $crud->stdntnum($r['c_id']);?></td>
                <td align="center">
                  
                        <input type=submit class="btn" name="cdelete" value="Delete" style="background: gray;">
                        <?php $_SESSION['cid']= $r['c_id'] ?>
                        <a href="view.php?courseid=<?php echo $_SESSION['cid']?>" target="_blank"class="btn" style="background-color:#B7264D;"> View</a>
                    </td>
              </tr>
              </form>
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