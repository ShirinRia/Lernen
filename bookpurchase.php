<?php 
$title ='Homepage';
require_once 'db/conn.php';
include_once 'includes/session.php';
if(!isset($_GET['bookid'])){
  echo 'not found';
   
} 
else{
   $id = $_GET['bookid'];
   $result = $crud->bkdata($id);
   $_SESSION['title'] = $result['bname'];
   $_SESSION['author'] = $result['aname'];
   $_SESSION['pub'] = $result['publshr'];
   $_SESSION['ed'] = $result['edtn'];
   $_SESSION['lng'] = $result['lang'];
   $_SESSION['img'] = $result['pdf'];
   $_SESSION['size'] = $result['size'];
   
   $_SESSION['imgpath'] = $result['img_path'];
  // $_SESSION['author'] = $result['aname'];
   
}  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="bookpurchase.css">

</head>
<body style="background-color: whitesmoke;">
<?php 

$tp = $_SESSION['type'];
if($tp=="Learner"){
include 'lrnrpagehdr.php';}
else
include 'pageheader.php';
 
?>
    <div class="prchscntnt shadow-sm p-3 mb-5 bg-body rounded">
        <div class="bookimg">
            <img src="<?php echo ($_SESSION['imgpath']) ?>" alt="book" width=100%>
        </div>
        <div class="bokdetails">
            <span class = "bname"> <?php echo $_SESSION['title'] ;  ?></span><br><br>
            
           <h6 class = "aname">  By <?php echo  $_SESSION['author'] ;  ?></h6><br>
            
            <h6 class = "prc"> <?php echo $_SESSION['size'] ;  ?>&nbsp; MB</h6>
            <a href="uploads/<?php echo ( $_SESSION['img'])?>" class="by" download><span class ="bttn">Download</span></a>
            
            <a href="uploads/<?php echo ( $_SESSION['img'])?>" class="by crt" target="_blank"><span class ="bttn">Read</span></a>
        </div>
       <!-- <div class="impinfo">
            <p>Cash On Delivery</p>
            <p>7 days happy exchange</p>
            <p>Delivery Charge 50TK.</p>
        </div>-->

    </div>
    <div class="tbl">
        <div class="spcfctn">
        <h4>Specification</h4></div><br><br>
    <table class="table table-bordered">
       
        <tbody>
          <tr>
            <th class="table-active" >Title</th>
            <td ><?php echo $_SESSION['title'] ;  ?></td>
            
          </tr>
          <tr>
            <th class="table-active" >Publisher</th>
            <td ><?php echo   $_SESSION['pub'] ;  ?></td>
          </tr>
          <tr>
            <th class="table-active" >Author</th>
            <td ><?php echo  $_SESSION['author'] ;  ?></td>
            
          </tr>
          <tr>
            <th class="table-active" >Edition</th>
            <td ><?php echo  $_SESSION['ed'] ;  ?></td>
          </tr>
          <tr>
            <th class="table-active" >Language</th>
            <td ><?php echo  $_SESSION['lng'] ;  ?></td>
            
          </tr>
          
        </tbody>
      </table><br><br><br><br><br><br><br>
    </div>
</body>
</html>