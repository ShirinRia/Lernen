<?php 
$title ='Homepage';

include_once 'includes/session.php';
require_once 'db/conn.php';
$id = $_GET['courseid'];
$_SESSION['cid'] =$id;
$results = $crud->viewvdo($_SESSION['cid']);
if($results){
    $vdo_path=$results['video'];
}
$slide = $crud->viewimg($_SESSION['cid']);
$qus = $crud->viewqus($_SESSION['cid']);
//$ops = $crud->viewops($id);

 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="view.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .quiz{
            position: relative;
            width:80%;
            left: 150px;
            top: 400px;
            padding-bottom: 50px;
        }
        .vdo{
            top: 20px;
        }
        .title{
            background-color: #9b2f4c; 
            color:white; 
            width: 100%; 
            height: 50px; 
            display:flex; 
            justify-content:center; 
            align-items: center;
            border-top-right-radius: 25px;
            border-top-left-radius: 25px;
        }
        .vdo_cntnr,.vido{
            width: 100%;
            height: 400px;
        }
      .cng{
          position: relative;
          top: 50px;
      }
      .img{
        position: relative;
          top: 100px;
      }
      .ttl{
          position: relative;
          top: -50px;
      }
      .mb-3{
        position: relative;
          top: 10px;
      }
      .slid{
          top: 200px;
      }
      .sldmg{
          width: 170px;
          height: 150px;
      }
      .dlt{
          display:flex;
      }
    </style>
</head>
<body>
    <div class="quiz vdo">
        <div class="title">Video</div>
        <div class="vdo_cntnr">
            <video  class="vido" height="240" width="1320" controls>
                <source src="<?php echo $vdo_path?>" type="video/mp4">
                Your browser does not support the video tag.
              </video>
          </div>
          <div class="cng"> 
              <span  style="width: 10rem; height:1.9rem; font-weight: bolder; font-size : 20px;">Change Video</span>
              <form action="chng.php?courseid=<?php echo $_SESSION['cid']?>" method="post" enctype="multipart/form-data">
                 <div class="input-group mb-3">
                <input type="file" class="form-control" id="inputGroupFile02"name="crsvdo">
                <input class="btn btn-secondary" type="submit" id="inputGroupFileAddon04" name="change" value="Change">
              </div>
              </form>
          </div>
    </div>
    <div class="quiz slid">
        
        <div class="title">Slide Image</div>
        
        <div class="dlt">
        <?php while($r = $slide->fetch(PDO::FETCH_ASSOC)) { ?>
            <form action="chng.php?courseid=<?php echo $_SESSION['cid']?>&img=<?php echo ($r['ansr']) ?>" method="post" enctype="multipart/form-data">
            <div class="sldmg" >
        <img src="<?php echo ($r['ansr']) ?>" class="rounded float-start" alt="img" width="170px" style="padding: 15px;" >
      
        <div class="bk"></div>
        <div class="addtocrt">
          <input type="submit" value="Delete" name="delete" class="addcrt">
        </div>
    </div>
    </form>
    <?php }?> 
    </div>
        
    <form action="chng.php?courseid=<?php echo $_SESSION['cid']?>" method="post" enctype="multipart/form-data">
        <div class="img"> 
            <div  class="ttl" style="width: 10rem; height:1.9rem; font-weight: bolder; font-size : 20px;">Add Image</div>
          <div class="input-group mb-3">
              <input type="file" class="form-control" name="img">
              <input class="btn btn-secondary" type="submit"  name="upload" value="Upload">
            </div>
        </div>
    </form>
    </div>
    
    <div class="quiz">
        <div class="title">Quiz Questions</div>
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Level</th>
                <th scope="col">Question</th>
                <th scope="col">Options</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
            <?php while($r = $qus->fetch(PDO::FETCH_ASSOC)) { ?>
                <form action="chng.php?courseid=<?php echo $_SESSION['cid']?>&qus=<?php echo $r['question_number']?>" method="post">
                <tr>
                    <th ><?php echo ($r['level']) ?></th>
                    <td><?php echo ($r['question_text']) ?></td>
                    <?php $ops = $crud->viewops($id,$r['question_number'],$r['level']);?>
                    <?php $crctans = $crud->viewcrct($id,$r['question_number'],$r['level']);?>
                    <td>
                        <ul>
                        <?php while($r = $ops->fetch(PDO::FETCH_ASSOC)) { ?>
                            <li><?php echo ($r['coption']) ?></li>
                            <?php }?> 
                        </ul>
                        
                       <b> Correct Answer: </b><?php echo $crctans['coption'] ?>
                    </td>
                    <td align="center">
                        <input type=submit class="btn btn-secondary" value="Delete" name="qusdlt">
                    </td>
                  </tr>
                </form>
                  <?php }?> 
                  <tr>
                   
                    <td colspan="4" align="center">
                        <a href="add2.php?courseid=<?php echo $_SESSION['cid']?>" target="_blank"class="btn" style=" background: linear-gradient(
        45deg, #842E62, #B7264D); color:white;"> ADD Questions</a>
                       
                    </td>
                  </tr>
            </tbody>
          </table>
    </div>
</body>
</html>