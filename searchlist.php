<?php 
$title ='Homepage';
require_once 'includes/header_2.php';
require_once 'db/conn.php';


   if(isset($_POST['search'])){
    $host='localhost';
    $db='lernen';
    $user='root';
    $pass='';
    $charset='utf8mb4';

    $conn =new PDO ( "mysql:host=$host;dbname=$db;charset=$charset", $user,$pass);
    $data= $_POST['serch'];
    $sql = "select * from course where match (c_name, des) against ('$data')"; 
    //$sql = "SELECT * FROM `course` WHERE c_name=:data";
    $result = $conn->prepare($sql);
    $executerrecord=$result->execute(array(":data"=>$data));
  
 if($executerrecord){
  if($result->rowcount()>0){
      foreach($result as $row){
          $cname=$row['c_name'];
          $tname=$row['tname'];
          $des=$row['des'];
      }
  }
   
}
   }
?> 
<?php 
                
                include 'pageheader.php';
                ?> 
<style>
    body{
    background-color:whitesmoke;}

    </style>

    <div class="crslist">
    
 <div class="lsthead">
        <h2><span>&nbsp;</span>Courses</h2>
    </div>
    
  
        <a href="enroll.php">
      <div class="lstbdy">
     

       <div class="crsdetail">
           <div class="acname">
            <h4><span><?php echo $tname ?></span></h4>
            <h4><span><?php echo $cname ?></span></h4>
           </div>
           <div class="ovrvw">
           <h5><?php echo $des?>
            </div>
            
       </div>
    </div>
    </a> 
    
</div>
</body>
</html>