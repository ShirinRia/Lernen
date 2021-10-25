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
    <link rel="stylesheet" href="cart.css" />
</head>
<body>
    <div class="shpngcrt">
        <h1>MY CART</h1>
    </div>
    <div class="crtcnt">
        <div class="lstbdy">
            <div class="crsthumb">
                <img src="images (1).png" alt="img" class="thumb">
             </div>
             <div class="crsdetail">
                 <div class="acname">
                  <h4><span>Web Design</span></h4>
                 </div>
                 <div class="ovrvw">
                     <h5>By Shirin Sultana</h5>
                    </div>
                    <div class="pr">
                        <h5>Price: <span>Tk. 12550</span></h5>
                        <span>Remove From Cart</span>
                       </div>
             </div>
          </div>

         
        <div class="prc">
            <h3>Total</h3>
            <h2>Tk. 120</h2>
            <a href="#">
            <button onclick="togglePopup()" class="chk">Check Out</button></a>
        </div>
    </div>
</body>
</html>