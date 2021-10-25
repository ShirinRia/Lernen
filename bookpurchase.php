<?php 
$title ='Homepage';
require_once 'db/conn.php';
include 'lrnrpagehdr.php';   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
-->
    <link rel="stylesheet" href="bookpurchase.css">

</head>
<body>
    <div class="prchscntnt shadow-sm p-3 mb-5 bg-body rounded">
        <div class="bookimg">
            <img src="download (1).png" alt="book">
        </div>
        <div class="bokdetails">
            <span class = "bname"> Book Name</span><br>
            
           <h6 class = "aname">  By Author Name</h6>
            <p class = "bname">&#11088;</p>
            <h4 class = "prc"> Tk 73</h4>
            <a href="#" class="by"><span class ="bttn">Buy Now</span></a>
            
            <a href="#" class="by crt"><span class ="bttn">Add To Cart</span></a>
        </div>
        <div class="impinfo">
            <p>Cash On Delivery</p>
            <p>7 days happy exchange</p>
            <p>Delivery Charge 50TK.</p>
        </div>
    </div>
</body>
</html>