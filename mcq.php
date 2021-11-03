<?php 
$title ='Homepage';
require_once 'includes/h3.php';
require_once 'db/conn.php';
$id = $_GET['sec'];
$_SESSION['qz'] = $id;
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCQ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
     h1{
         background-color:teal;
         text-align:center;
         color:white;
         padding:10px;
         font-size:50px;
     }
     input[type="radio"]{
         padding-right: 15px;
     }
     div{
         margin-left:450px;
     }
     p{
         font-weight:bold;
         font-size:22px;
     }
     .butn{
         position:relative;
         left:250px;
     }
     .qustn{
         position:relative;
         left:-450px;
         width:80%;
     }
    </style>
</head>
<body>
<h1>Prove yourself to yourself</h1>
<div>
<form action="mcq2.php" method="post">
    
<?php for($i=1;$i<8;$i++){ 
$results = $quiz->questn($i,$id);
$ans = $quiz->ansr($i);?>
<div class="qustn">
<?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
     <p><?php echo $r['qustn'] ?></p>
     
      <?php while($r = $ans->fetch(PDO::FETCH_ASSOC)) { ?>
      <input type="radio" name="q[<?php echo $r['qid'] ?>]" value="<?php echo $r['aid'] ?>"> <?php echo $r['ansr'] ?><br>
      <?php }?> <br><br><br>
     <?php }?>  </div>
     <?php }?> 
     <br>
     <input type="submit" class="btn btn-primary butn" name="submit" value="Submit"><br><br><br>
</form>
</div>
    
</body>
</html>