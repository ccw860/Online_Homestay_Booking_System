<?php include("dataconnection.php"); ?>
<?php
session_start();
?>

<?php
if(isset($_GET['id'])){
        $id = $_GET['id'];
        $q = "SELECT * FROM home_details WHERE home_details.home_id = $id";
        $run = mysqli_query($connect, $q);
        $row = mysqli_fetch_array($run);
    }
?>
<html lang="en">
<head>

     <title>Rainbow Homestay</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/style.css">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">
               <span class="spinner-rotate"></span>
          </div>
     </section>
	  <?php
			
			$result = mysqli_query($connect, "SELECT * from home_details,home_type where home_details.home_code=home_type.home_code");	
	         while($row = mysqli_fetch_assoc($result))
				{
				
				?>	
	 <?php 
	 if(isset($_SESSION['login_user']))
	 {
		 ?>
			
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="index.php" class="navbar-brand">Rainbow Homestay</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li class="active"><a href="index.php">Home</a></li>
                         <ul class="nav navbar-nav navbar-nav-second">
						 <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Homestay<span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                  <?php 
								    $q = "SELECT * FROM home_type ORDER BY home_type.home_code ASC";
									$run = mysqli_query($connect, $q);
									$count = 0;
								if(mysqli_num_rows($run) > 0){
								while($row = mysqli_fetch_array($run)){
									?>
								    <li><a href="properties.php?type&id=<?php echo $row['home_code'];?>"><?php echo $row['home_state'];?></a></li>									
								   			<?php
					}
	 }
					
					?>
                              </ul>
                         </li>
					</ul>
		
					
                         <li><a href="terms.php">Terms</a></li>
                         <li><a href="about-us.php">About Us</a></li>
                         <li><a href="contact.php">Contact Us</a></li>
						 <li><a href="history.php">History</a></li>
				    </ul>
					<?php
 $uid = $_SESSION["user_id"];
 $result = mysqli_query($connect,"SELECT * FROM customer WHERE cus_id='$uid'");
 $row=mysqli_fetch_assoc($result);
 
 ?>
				   	   <ul class="nav navbar-nav navbar-nav-second">
						 <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $row['cus_name'];?><span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                   
								    <li><a href="profile.php">View profile</a></li>
								   <li><a href="logout.php">Sign Out</a></li>
                              </ul>
                         </li>
					</ul>
					
               </div>
		

          </div>
		  </section>
	 <?php
	 }
	 
	 else{
	 ?>
	 
     
	 <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="index.php" class="navbar-brand">Rainbow Homestay</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li class="active"><a href="index.php">Home</a></li>
                         <ul class="nav navbar-nav navbar-nav-second">
						 <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Homestay<span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                  <?php 
								    $q = "SELECT * FROM home_type ORDER BY home_type.home_code ASC";
									$run = mysqli_query($connect, $q);
									$count = 0;
								if(mysqli_num_rows($run) > 0){
								while($row = mysqli_fetch_array($run)){
									?>
								    <li><a href="properties.php?type&id=<?php echo $row['home_code'];?>"><?php echo $row['home_state'];?></a></li>									
								   			<?php
					}
	 }
					
					?>
                              </ul>
                         </li>
					</ul>
                         <li><a href="terms.php">Terms</a></li>
                         <li><a href="about-us.php">About Us</a></li>
                         <li><a href="contact.php">Contact Us</a></li>
				    </ul>
				   	   <ul class="nav navbar-nav navbar-nav-second">
						 <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account<span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                   <li><a href="login.php">Sign in</a></li>
                              </ul>
                         </li>
					</ul>
               </div>
		

          </div>
     </section>
<?php
	 }
}
?>

	 <?php
    $q = "SELECT * FROM home_details ORDER by rand() LIMIT 1 ";
    $run = mysqli_query($connect, $q); 
    $count = 0;
    if(mysqli_num_rows($run) > 0)
	{
        while($row = mysqli_fetch_array($run))
		{
  ?>
	
     <!-- HOME -->
	    <section id="home">
          <div class="row">
               <div class="owl-carousel owl-theme home-slider">
			   <div class=""><img src="../admin/image/<?php echo $row['image1'];?>" height="700"></div>
			   <div class=""><img src="../admin/image/<?php echo $row['image2'];?>" height="700"></div>
			   <div class=""><img src="../admin/image/<?php echo $row['image3'];?>" height="700"></div>

               </div>
          </div>
     </section>
<?php 
	}
}
	?>
     <main>
  
			
          <section>
               <div class="container">
                    <div class="row">
                         <div class="col-md-12 col-sm-12">
                              <div class="text-center">
                                   <h2>Overview</h2>

                                   <br>

                                   <p class="lead">Our online homestay booking system is an online business which will
												   be built in 2020. However, the homestay is not popular as a hotel in
												   travelling but the homestay also uses their advantage to attract
												   customers such as some homestay will make low cost. Homestay
												   layout is like staying at home and we can enjoy the home and stay
												   when travelling.</p>
                              </div>
                         </div>
                    </div>
               </div>
          </section>
          
<section>
		<form  name="search_form" method="GET" action="search.php">
		<input type="text" class="form-control"  name="homename" placeholder="Search By Name....">
		<button type="submit" name="searchbtn" class="btn btn-primary">Search</button>
		</form>
				<?php
    $q = "SELECT * FROM home_details ORDER by rand() LIMIT 3 ";
    $run = mysqli_query($connect, $q); 
    $count = 0;
    if(mysqli_num_rows($run) > 0){
        while($row = mysqli_fetch_array($run)){
  ?>
               <div class="container">
                    <div class="row">
                         <div class="col-md-12 col-sm-12">
                              <div class="section-title text-center">
                                   <h2>Homestay Rentals <small>Featured homes recommended for you</small></h2>
                              </div>
                         </div>

                         <div class="">
                         <div class="courses-thumb courses-thumb-secondary">
                             
                                             <img src="../admin/image/<?php echo $row['image3'];?>" width="1200" class="img-responsive">
                                        

                                   <div class="courses-detail">
                                        <h3><a href=""><?php echo $row['home_name']?></a></h3>

                                        <p class="lead"><strong>RM<?php echo $row['price_per_night']?></strong></p>
                                        

                                        <p><?php echo $row['description']?></p>
                                   </div>

                                   <div class="courses-info">
                                        <a href="homestay.php?id=<?php echo $row['home_id'];?>" class="section-btn btn btn-primary btn-block">View Details</a>
                                   </div>
                              </div>
                         </div>

                    </div>
               </div>
          </section>
          <?php
		}
	}
		  ?>
          <section id="testimonial">
               <div class="container">
                    <div class="row">

                         <div class="col-md-12 col-sm-12">
                              <div class="section-title text-center">
                                   <h2>About Us <small>from around the world</small></h2>
                              </div>

                              <div class="owl-carousel owl-theme owl-client">
                                   <div class="col-md-4 col-sm-4">
                                        <div class="item">
                                             <div class="tst-image">
                                                  <img src="images/chiachunwei.png" class="img-responsive" alt="">
                                             </div>
                                             <div class="tst-author">
                                                  <h4>Chia Chun Wei</h4>
                                                  <span>Shopify Developer</span>
                                             </div>
                                             <p>Responsible for the development of the Shopify Plus platform, themes, liquid programming language and corresponding apps. 
											    Design UX based from our brand standard and style guide. </p>
                                             <div class="tst-rating">
                                                  <i class="fa fa-star"></i>
                                                  <i class="fa fa-star"></i>
                                                  <i class="fa fa-star"></i>
                                                  <i class="fa fa-star"></i>
                                                  <i class="fa fa-star"></i>
                                             </div>
                                        </div>
                                   </div>

                                   <div class="col-md-4 col-sm-4">
                                        <div class="item">
                                             <div class="tst-image">
                                                  <img src="images/sammitan.jpg" class="img-responsive" alt="">
                                             </div>
                                             <div class="tst-author">
                                                  <h4>Sammi Tan Hui Qin</h4>
                                                  <span>Website Designer</span>
                                             </div>
                                             <p>She plan, create and code internet sites and web pages, many of which combine text with sounds, pictures, graphics and video clips. 
											    She is responsible for creating the design of website.</p>
                                             <div class="tst-rating">
                                                  <i class="fa fa-star"></i>
                                                  <i class="fa fa-star"></i>
                                                  <i class="fa fa-star"></i>
												  <i class="fa fa-star"></i>
                                             </div>
                                        </div>
                                   </div>

                                   <div class="col-md-4 col-sm-4">
                                        <div class="item">
                                             <div class="tst-image">
                                                  <img src="images/tanchenyang.jpg" class="img-responsive" alt="">
                                             </div>
                                             <div class="tst-author">
                                                  <h4>Tan Chen Yang</h4>
                                                  <span>Art Director</span>
                                             </div>
                                             <p>He are responsible for the overall visual aspects of an advertising or media campaign and coordinate the work of other artistic.
												He generating clear ideas and concepts in tandem with the copywriter。 </p>
                                             <div class="tst-rating">
                                                  <i class="fa fa-star"></i>
                                                  <i class="fa fa-star"></i>
                                                  <i class="fa fa-star"></i>
                                                  <i class="fa fa-star"></i>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                        </div>
                    </div>
               </div>
          </section> 
     </main>

     <!-- FOOTER -->
     <footer id="footer">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-6">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2>Headquarter</h2>
                              </div>
                              <address>
                                   <p>Jalan Ayer Keroh Lama, 75450<br> Bukit Beruang, Melaka</p>
                              </address>

                              <ul class="social-icon">
                                   <li><a href="https://www.facebook.com" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                   <li><a href="http://www.twitter.com" class="fa fa-twitter"></a></li>
                                   <li><a href="http://www.instagram.com" class="fa fa-instagram"></a></li>
                              </ul>

                              <div class="copyright-text"> 
                                   <p>Copyright &copy; 2020 Rainbow Homestay</p>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2>Contact Info</h2>
                              </div>
                              <address>
                                   <p>+60 123 456 7890</p>
                                   <p>rainbowhomestay123@gmail.com</a></p>
                              </address>

                              <div class="footer_menu">
                                   <h2>Quick Links</h2>
                                   <ul>
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="about-us.php">About Us</a></li>
                                        <li><a href="terms.php">Terms & Conditions</a></li>
                                        <li><a href="contact.php">Contact Us</a></li>
                                   </ul>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                         <div class="footer-info newsletter-form">
                              <div class="section-title">
                                   <h2>Announcement</h2>
                              </div>
                              <div>
									<p>* We will close order during MCO.</p>
                              </div>
                         </div>
                    </div>
                    
               </div>
          </div>
     </footer>

     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>

</body>
