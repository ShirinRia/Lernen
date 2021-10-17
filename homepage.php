<?php 
$title ='Homepage';
require_once 'includes/header_2.php';
require_once 'db/conn.php';
?>  

    <header class="mheader">
        <div class="pcontainer">
            <div class="mrow">
                <div class="headeritem left">
                    <div class="logo">
                        <a href="homepage.php" class=anchor >Lernen</a>
                    </div>
                </div>
                
                <!--menu starts-->
                <div class="headeritem center">
                    <nav class="menu">
                        <ul class="mainmenu">
                            <li>
                                <a href="#" class="anchor" >Home</a>
                            </li>
                            <li class="children">
                                <a href="#" class="anchor">
                                    Courses
                                </a>
                                <div class="submenu crsmega mega-menu-column-2">
                                   
                                    <div class="list-item">
                                      
                                        
                                          <ul>
                                               <li><a href="#" class=" m_clr">Product Lis4</a></li>
                                               <li><a href="#" class=" m_clr">Product Lis5</a></li>
                                               <li><a href="#" class=" m_clr">Product Lis6</a></li>
                                          
                                          </ul>
                                        
                                    </div>
                                      
                                        <div class="list-item">
                                        
                                                <ul>
                                                    <li><a href="#" class=" m_clr">Product List1</a></li>
                                                    <li><a href="#" class=" m_clr">Product List2</a></li>
                                                    <li><a href="#" class=" m_clr">Product Lis3</a></li>
                                                </ul>
                                            
                                        </div>
                                        <div class="list-item">
                                            
                                            <ul>
                                                <li><a href="#" class=" m_clr">Product List1</a></li>
                                                <li><a href="#" class=" m_clr">Product List2</a></li>
                                                <li><a href="#" class=" m_clr">Product Lis3</a></li>
                                            </ul>
                                        
                                    </div>
                                    <div class="list-item">
                                           
                                        <ul>
                                            <li><a href="#" class=" m_clr">Product List1</a></li>
                                            <li><a href="#" class=" m_clr">Product List2</a></li>
                                            <li><a href="#" class=" m_clr">Product Lis3</a></li>
                                        </ul>
                                    
                                </div>
                                    <div class="list-item">
                                            
                                        <ul >
                                            <li><a href="#" class=" m_clr">Product List1</a></li>
                                            <li><a href="#" class=" m_clr">Product List2</a></li>
                                            <li><a href="#" class=" m_clr">Product Lis3</a></li>
                                        </ul>
                                    
                                </div>
                                </div>
                            </li>
                            <li>
                                <a href="#" class="anchor">Books</a>
                            </li>
                            <li class="children ">
                                <a href="profile.php?us=<?php echo $_SESSION['user'];?>" class="anchor prfl">
                                <input type="text" class="uname"  value= "<?php echo $_SESSION['user'];?>">
                                </a>
                                <div class="submenu crsmega mega-menu-column-2 c_prfl">
                                
                                    <div class="list-item_profile">
                                            
                                        <ul class="sidepad">
                                            <li><a href="#" class=" m_clr">My Courses</a></li>
                                            <li><a href="#" class=" m_clr">Cart</a></li>
                                            <li><a href="#" class=" m_clr">Wishlist</a></li>
                                            <li><a href="#" class=" m_clr">Purchase History</a></li>
                                        </ul>
                                    
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!--menu ends-->
               
                
                     <div class="headeritem right">
                        Sign Out
                    </div>
            </div>
        </div>
    </header>
    <!--image slider start-->
 <div class="slider">
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
                <img src="images\Bannr (3).jpg" alt="first image" weight="800px">
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
            <h1 class="box_cntnt usr"> Instructors</h1>
            <h2 class="box_cntnt usr-num">2000</h2>
        </div>
        <div class="lerners uiblc">
            <h1 class="box_cntnt usr"> Learners</h1>
            <h2 class="box_cntnt usr-num">2000</h2>
        </div>
        <div class="courses uiblc">
            <h1 class="box_cntnt usr"> Courses</h1>
            <h2 class="box_cntnt usr-num">2000</h2>
        </div>
    </div>
    <div class="smid">
           <!--Newly Launched-->
           <div class="newlylaunched">
            <h1 class="newcrs">NEWLY LAUNCHED COURSES</h1>
            <div class="hl"></div>
            <div class="card-group">
                <div class="crd">
                  <img src="images\img1.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                  </div>
                </div>
                <div class="crd crdo">
                    <img src="images\img1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                  </div>
               
                  <div class="crd crdt">
                    <img src="images\img1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                  </div>
                  <div class="crd crdth">
                    <img src="images\img1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                  </div>
        </div>
    </div>
        <!--Highly enrolled-->
        <div class="newlylaunched">
            <h1 class="newcrs">HIGHEST ENROLLING COURSES</h1>
            <div class="hl nv"></div>
            <div class="card-group">
                <div class="crd">
                  <img src="images\img1.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                  </div>
                </div>
                <div class="crd crdo">
                    <img src="images\img1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                  </div>
               
                  <div class="crd crdt">
                    <img src="images\img1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                  </div>
                  <div class="crd crdth">
                    <img src="images\img1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                  </div>
        </div>
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
</body>
</html>