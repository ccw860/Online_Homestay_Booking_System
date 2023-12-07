<?php include("dataconnection.php");
session_start();	
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
	 
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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


     <!-- MENU -->
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
                         <li><a href="index.php">Home</a></li>
                         <ul class="nav navbar-nav navbar-nav-second">
						 <li class="dropdown">
						  <li class="active">
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
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?php echo $row['cus_name'];?><span class="caret"></span></a>
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
                         <li><a href="index.php">Home</a></li>
                         <ul class="nav navbar-nav navbar-nav-second">
						 <li class="dropdown">
						  <li class="active">
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
                              <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account<span class="caret"></span></a>
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
?>

     <section>
          <div class="container">
               <div class="text-center">
                    <h1>Homestay</h1>

                    <br>

                    <p class="lead">Featured homes recommended for you.</p>
               </div>
          </div>
     </section>

     <section class="section-background">
          <div class="container">
               <div class="row">
		<form  name="search_form" method="GET" action="search.php">
		<input type="text" class="form-control"  name="homename" placeholder="Search By Name....">
		<button type="submit" name="searchbtn" class="btn btn-primary">Search</button>
		</form>
		
		<?php
		if(isset($_GET["type"]))
		{
			$hcode=$_GET["id"];
			$result= mysqli_query($connect, "SELECT * FROM home_details where home_code='$hcode'");
			$row = mysqli_fetch_assoc($result);
		}
			
?>
			 <?php
    $query = "SELECT * FROM home_details where home_code = '$hcode'";
    $result = mysqli_query($connect, $query);
    $count=1;
    if(mysqli_num_rows($result) > 0)
    {
     while($row = mysqli_fetch_array($result))
     {
    ?>
                         <div class="courses-thumb courses-thumb-secondary">
                              <div class="courses-top">
                                   <div class="courses-image">
                                    <img src="../admin/image/<?php echo $row['image1'];?>" width="1200" class="img-responsive">
                                   </div>
                              </div>

                              <div class="courses-detail">
                                   <h3><?php echo $row['home_name'];?></a></h3>

                                   <p class="lead"><strong>RM<?php echo $row['price_per_night']?></strong></p>
									<p><?php echo $row['description']?></p>
                                        
                              </div>

                              <div class="courses-info">
                                   <a href="homestay.php?id=<?php echo $row['home_id'];?>"class="section-btn btn btn-primary btn-block">View Details</a>
                              </div>
                         </div>
                    
					<?php
						}
					}
					?>
          </div>
     </section>

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

     <div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title" id="gridSystemModalLabel">Book Now</h4>
                    </div>
                    
                    <div class="modal-body">
                         <form action="#" id="contact-form">
                              <div class="row">
                                   <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Pick-up location" required>
                                   </div>

                                   <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Return location" required>
                                   </div>
                              </div>

                              <div class="row">
                                   <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Pick-up date/time" required>
                                   </div>

                                   <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Return date/time" required>
                                   </div>
                              </div>
                              <input type="text" class="form-control" placeholder="Enter full name" required>

                              <div class="row">
                                   <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Enter email address" required>
                                   </div>

                                   <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Enter phone" required>
                                   </div>
                              </div>
                         </form>
                    </div>

                    <div class="modal-footer">
                         <button type="button" class="section-btn btn btn-primary">Book Now</button>
                    </div>
               </div>
          </div>
     </div>


     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>

</body>
