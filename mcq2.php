<?php 
$title ='Homepage';
require_once 'includes/h3.php';
require_once 'db/conn.php';
if(isset($_POST['submit'])){
    if(!empty($_POST['q'])){
        $count = count($_POST['q']);
       // echo "Out of 3, you have selected".$count."questions";
        $i=1;
        $c=0;
        $selected =$_POST['q'];
     //print_r($selected);
     
    }
   
    if(empty($_POST['q'])){
        
        echo ' <div class="rslt"><table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
              <th colspan="2" class="text-center"scope="col">Results</th>
             
            </tr>
          </thead>
          <tbody>
         
            
            <tr>
              
             
              <td class="text-center">Please try the questions</td>

            </tr>
           
          </tbody>
        </table></div>';
         } 
}
$results = $quiz->getans();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        p{
            font-weight: bold;
            font-size: 25px;
            margin-left: 500px;
        }
        .rslt{
            width:80%;
            position: relative;
            left: 150px;
            top: 150px;
        }
    </style>
</head>
<body>
    <div class="rslt">
<table class="table table-striped table-bordered">
<thead class="table-dark">
    <tr>
      <th colspan="2" class="text-center"scope="col">Results</th>
     
    </tr>
  </thead>
  <tbody>
  <?php if(empty($selected[$i])){ 
       
       echo "Please try to answer all questions";
    }?>
  <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
    <?php //echo $r['crct_ans'] ?>
    <?php 
    
    
   
    if(!empty($selected[$i])){ 
      $checked = $r['crct_ans']==$selected[$i];
    if($checked){
    $c++;
    } 
  
  
}
$i++;
    ?>
     <?php }?> 
    
    <tr>
      
      <td>Questions Attempted</td>
      <td> Out of&nbsp;<?php $quiz->getrow($_SESSION['qz']);?>&nbsp;<?php echo "you have selected  ".$count."  questions";?></td>
     
     
    </tr>
    <tr>
      
      <td>Total Score</td>
      <td> <?php echo "Score : ".$c."";?></td>
    </tr>
    
  </tbody>
</table>

     
</div>
</body>
</html>