<?php 
$title ='Homepage';
require_once 'includes/header_2.php';
require_once 'db/conn.php';
$catgry=13;
$cat1=1;
$cat2=2;
$cat3=3;
$cat4=4;
$cat5=5;
$cat6=6;
$cat7=7;
$cat8=8;
$cat9=9;
$cat10=10;
$cat11=11;
$cat12=12;
$_SESSION['cat'] = $catgry;
$_SESSION['cat1'] = $cat1;
$_SESSION['cat2'] = $cat2;
$_SESSION['cat3'] = $cat3;
$_SESSION['cat4'] = $cat4;
$_SESSION['cat5'] = $cat5;
$_SESSION['cat6'] = $cat6;
$_SESSION['cat7'] = $cat7;
$_SESSION['cat8'] = $cat8;
$_SESSION['cat9'] = $cat9;
$_SESSION['cat10'] = $cat10;
$_SESSION['cat11'] = $cat11;
$_SESSION['cat12'] = $cat12;
$results = $crud->crd();
?>  

    <header class="mheader">
        <div class="pcontainer">
            <div class="mrow">
                <div class="headeritem left">
                    <div class="logo">
                        <a href="home.php" class=anchor >Lernen</a>
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
                                <a href="courselist.php" class="anchor">
                                    Courses
                                </a>
                                <div class="submenu crsmega mega-menu-column-2">
                                   
                                    <div class="list-item">
                                      
                                        
                                          <ul>
                                               <li><a href="courselist.php?cat=<?php echo $_SESSION['cat2'];?>" class=" m_clr">Design</a></li>
                                               <li><a href="#" class=" m_clr">IT & Networking</a></li>
                                               <li><a href="#" class=" m_clr">Technology</a></li>
                                          
                                          </ul>
                                        
                                    </div>
                                      
                                        <div class="list-item">
                                        
                                                <ul>
                                                    <li><a href="courselist.php?cat=<?php echo $_SESSION['cat12'];?>" class=" m_clr">IELTS</a></li>
                                                    <li><a href="courselist.php?cat=<?php echo $_SESSION['cat5'];?>" class=" m_clr">Photography</a></li>
                                                    <li><a href="courselist.php?cat=<?php echo $_SESSION['cat7'];?>" class=" m_clr">Editing</a></li>
                                                </ul>
                                            
                                        </div>
                                        <div class="list-item">
                                            
                                            <ul>
                                                <li><a href="courselist.php?cat=<?php echo $_SESSION['cat1'];?>" class=" m_clr">Development</a></li>
                                                <li><a href="#" class=" m_clr">Fashion & Lifestyle</a></li>
                                                <li><a href="courselist.php?cat=<?php echo $_SESSION['cat4'];?>" class=" m_clr">MS Office</a></li>
                                            </ul>
                                        
                                    </div>
                                    <div class="list-item">
                                           
                                        <ul>
                                            <li><a href="courselist.php?cat=<?php echo $_SESSION['cat6'];?>" class=" m_clr">Adobe</a></li>
                                            <li><a href="courselist.php?cat=<?php echo $_SESSION['cat10'];?>" class=" m_clr">Academic(School)</a></li>
                                            <li><a href="courselist.php?cat=<?php echo $_SESSION['cat11'];?>" class=" m_clr">Academic(College)</a></li>
                                        </ul>
                                    
                                </div>
                                <div class="list-item">
                                           
                                           <ul>
                                               <li><a href="#" class=" m_clr">Digital Marketing</a></li>
                                               <li><a href="#" class=" m_clr">Health & Fitness</a></li>
                                               <li><a href="#" class=" m_clr">Entrepreneurship</a></li>
                                           </ul>
                                       
                                   </div>
                                    <div class="list-item">
                                            
                                        <ul >
                                            <li><a href="courselist.php?cat=<?php echo $_SESSION['cat8'];?>" class=" m_clr">GK</a></li>
                                            <li><a href="#" class=" m_clr">Programming</a></li>
                                            <li><a href="#" class=" m_clr">Islam Shikkha</a></li>
                                        </ul>
                                    
                                </div>
                                </div>
                            </li>
                            <li>
                                <a href="bklst.php" class="anchor">Books</a>
                            </li>
                             <li>
                                <a href="upload.php" class="anchor upload" >
                              
                                <img src="up.png" class="upl" width="30">
                            </a>
                            </li>
                            <li class="children ">
                                <a href="profile.php?us=<?php echo $_SESSION['user'];?>" class="anchor prfl">
                                <input type="text" class="uname"  value= "<?php echo $_SESSION['user'];?>">
                                </a>
                                <div class="submenu crsmega mega-menu-column-2 c_prfl">
                                
                                    <div class="list-item_profile">
                                            
                                        <ul class="sidepad">
                                            <li><a href="mycourses.php?us=<?php echo $_SESSION['user'];?>" class=" m_clr">My Courses</a></li>
                                            <li><a href="#" class=" m_clr">Cart</a></li>
                                            <li><a href="#" class=" m_clr">Wishlist</a></li>
                                            <li><a href="#" class=" m_clr">Purchase History</a></li>
                                        </ul>
                                    
                                    </div>
                                </div>
                            </li>
                            <li class="search-container"> 
                                <form action="courselist.php" method="post">
                                <input type="text" placeholder="Search.." name="search" class="src">
                                <button type="submit" class="srcbtn" name="search"><i class="fa fa-search fg"></i></button>
                              </form></li>
                        </ul>
                    </nav>
                </div>
                <!--menu ends-->
               
                
                     <div class="headeritem right">
                     <a href="index.php" class="anchor">
                         <input type="text" class="uname"  value= "Sign Out">
                                </a>
                    </div>
            </div>
        </div>
    </header>