<?php 
$title ='Homepage';
require_once 'db/conn.php';
$results = $crud->crd();
?>  


    <!--image slider start-->
 <div class="sli">
        <div class="slides">
            <!-- radiobutton start-->
            <input type="radio" name="radiobutton" id="radio1">
            <input type="radio" name="radiobutton" id="radio2"> 
            <input type="radio" name="radiobutton" id="radio3"> 
            <input type="radio" name="radiobutton" id="radio4">  
             <!--slide image start-->
            <div class="slide one">
                <img src="images\Bannr (1).jpg" alt="first image" >
            </div>
            <div class="slide two">
                <img src="images\Bannr (2).jpg" alt="first image">
            </div>
            <div class="slide thr">
                <img src="images\Bannr (3).jpg" alt="first image">
            </div>
            <div class="slide four">
                <img src="images\Bannr (4).jpg" alt="first image">
            </div>
            <!--auto navigation start-->
            <div class="auto">
                <div class="atobtn1"></div>
                <div class="atobtn2"></div>
                <div class="atobtn3"></div>
                <div class="atobtn4"></div>
            </div>
        </div>
        <!--manual-->
        <div class="manual">
            <label for="radio1" class="manualbtn"></label>
            <label for="radio2" class="manualbtn"></label>
            <label for="radio3" class="manualbtn"></label>
            <label for="radio4" class="manualbtn"></label>
        </div>
    </div>

    <div class="user_contnr">
        <div class="back"></div>
        <div class="user uiblc">
           
            <h1 class="box_cntnt usr ">Users</h1><br>
            <h2 class="box_cntnt usr-num"><?php $crud->num();?></h2>
        </div>
        <div class="Instructor uiblc">
            <h1 class="box_cntnt usr ins"> Instructors</h1>
            <h2 class="box_cntnt usr-num"><?php $crud->tnum();?></h2>
        </div>
        <div class="lerners uiblc">
            <h1 class="box_cntnt usr"> Learners</h1>
            <h2 class="box_cntnt usr-num"><?php $crud->lnum();?></h2>
        </div>
        <div class="courses uiblc">
            <h1 class="box_cntnt usr"> Courses</h1>
            <h2 class="box_cntnt usr-num"><?php $crud->cnum();?></h2>
        </div>
    </div>
    <div class="smid">
           <!--Newly Launched-->
           <div class="newlylaunched">
            <h1 class="newcrs newly">NEWLY LAUNCHED COURSES</h1>
            
            <?php 
                
                include 'chk.php';
                ?> 
    </div><br><br><br><br>
     <!--Highly enrolled-->
    <div class="newlylaunched">
            <h1 class="newcrs newly">HIGHEST ENROLLING COURSES</h1>
            
            <?php 
                
                include 'high.php';
                ?> 
    </div>
      
</div>
    <footer class="footer">
        <div class="about">
            <h1>Lernen</h1><br>
            <p>Lernen is all about connecting & discovering talents, inspiring people and impact lives with the best teaching and 
                earning opportunities. “Lernen” is an online teaching platform, where instructors can create and upload their 
                knowledge. They also can upload their books PDF & make money online. It is an E-Learning Platform to learn anything 
                from anywhere from the best teachers. It has created earning opportunities for millions of instructors!</p>
        </div>
        <div class="contact">
            <h2>Contact Us</h2>
            <p>+8801xxxxxxxxx, +8801xxxxxxxxx, +8801xxxxxxxxx</p>
        </div>
        <div class="vl"></div>
        <div class=rftr>
          
            <h2>Useful Links</h2>
            <p>xxxxxxxxx, xxxxxxxxx, xxxxxxxxx</p>
        </div>
        <div class="rftr dftr">
          
            <h2>Total Site Users</h2>
            
            <p><?php $crud->num();?></p>
        </div>
       
        <span class="cpy"> &copy 2021 Lernen</span>
        
    </footer>
    <div class="middlcntnr">
        <div class="middlecntnt one">
           
            <h4 class="box_cntnt">Numerous online courses</h4><br>
           <p class="box_cntnt"> Choose the course you need from Lernen</p> 
        </div>
        <div class="middlecntnt two">
            <h4 class="box_cntnt"> Interesting Quizzes</h4><br>
        <p class="box_cntnt"> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> 
        </div>
        <div class="middlecntnt three">
            <h4 class="box_cntnt"> Learn as you wish!</h4>
        </div>
    </div>
    <script src="home.js" type="text/javascript"></script>
    <script>
         $(".slider").owlCarousel({
           loop: true,
           autoplay: true,
           autoplayTimeout: 2000, //2000ms = 2s;
           autoplayHoverPause: true,
         });
      </script>
</body>
</html>