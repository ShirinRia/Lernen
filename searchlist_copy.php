<?php 
$title ='Homepage';
require_once 'includes/header_2.php';
//require_once 'db/conn.php';

                
                include 'pageheader.php';
               

   if(isset($_POST['search'])){
    $host='localhost';
    $db='lernen';
    $user='root';
    $pass='';
    $charset='utf8mb4';

    $conn =new mysqli ( "localhost","root",'',"lernen");
    $data= $_POST['serch'];
  $sql = "select * from course where match (c_name, des) against ('$data')"; 
   // $sql = "SELECT * FROM `course` WHERE c_name=:data";
   $result = mysqli_query($conn, $sql);
    //$executerrecord=$result->execute(array(":data"=>$data));
    echo '<div class="crslist"><div class="lsthead">
    <h2><span>&nbsp;</span>Courses</h2>
</div></div>';
    while($row = mysqli_fetch_assoc($result)){
        $title = $row['c_name'];
        $desc = $row['des']; 
        $tcr = $row['tname']; 
        $thread_id= $row['c_id'];
        $imgg=$row['img_path'];
       // $url = "thread.php?threadid=". $thread_id;
       // $noresults = false;

        // Display the search result
       echo '  <div class="crslist"><div class="lstbdy">
       <div class="crsthumb">
          <img src="'. $imgg. '" class="thumb" style="width: 100%; height: 100%" />
       </div>
       <div class="crsdetail">
           <div class="acname">
           <h4><span>'. $tcr. '</span></h4>
           <h4><span>'. $title. '</span></h4>
          </div>
          <div class="ovrvw">
          '. $desc .'
           </div>
           
      </div>
      </div>
      </div>'; 
              
        }
   }
?> 

<style>
    body{
    background-color:whitesmoke;}

    </style>

</body>
</html>