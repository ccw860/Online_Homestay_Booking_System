<?php include("dataconnection.php"); ?>
<?php
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
                         <li class="active"><a href="terms.php">Terms</a></li>
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
                         <li><a href="index.php">Home</a></li>
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
                         <li class="active"><a href="terms.php">Terms</a></li>
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
?>

     <section>
          <div class="container">
               <div class="text-center">
                    <h1>Rainbow Homestay Terms & Conditions</h1>

                    <br>

                    <p class="lead">Homestay Technologies Limited provides an online platform that facilitates Hosts (as defined below) and 
					                Guests (as defined below) in arranging overnight accommodation (such solution and 
									Homestay Technologies Limited’s associated services being collectively referred to 
									in these terms and conditions as the “Services”). </p>
               </div>
          </div>
     </section>

     <section class="section-background">
          <div class="container">
               <div class="about-info">
                    <h2>Rainbow Homestay Full Terms and Condition</h2>

                    <figure>
                         <figcaption>
                              <h3>Registration</h3>
                              <p>You can register an Account in one of two ways: using your email address and choosing a password on the Site sign-up form; or via Facebook Login, a third-party service provider. 
							  By registering via Facebook Login, you allow the Site access to your Facebook account for the following information, including but not limited to: public profile (name, gender, hometown, 
							  profile photo and birthday), friend list, email address and location; as permitted under the applicable terms and conditions that govern your use of your Facebook account. </p>
                         </figcaption>
                    </figure>

                    <figure>
                         <figcaption>
                              <h3>Accommodation</h3>
                              <p>As a host you are solely responsible for the collection and/or payment of all or any taxes, levies and charges, of whatever kind and wherever due, that may arise as a consequence of Bookings made 
							  with you and/or the provision of Accommodation by you. </p>

                              <p>As a host, you agree to hold harmless and indemnify Homestay Technologies Limited and its subsidiaries, affiliates, officers, agents and employees, from and against any claim, liabilities, damages, 
							  losses and/or expenses, including, without limitation, reasonable legal and accounting fees, arising out of or in any way connected with your failure to lawfully collect and/or discharge any taxes, 
							  levies, and that may arise as a consequence of Bookings made with you and/or the provision of Accommodation by you.</p>
                         </figcaption>
                    </figure>

                    <figure>
                         <figcaption>
                              <h3>Listing</h3>
                              <p>The Host shall make their Content and Accommodation available via their Listing so that the Guest can make Bookings through the Site. The Host further acknowledges and agrees that all Content and 
							  Accommodation made available for Booking through the Site, may also be made available by Homestay Technologies Limited for Booking via the Affiliate Website.</p>

                              <p>We suggest that our hosts offer a complimentary light breakfast to guests. The prices quoted by a Host in their Listing must be inclusive of any applicable local taxes and charges.</p>
                         </figcaption>
                    </figure>

                    <figure>
                         <figcaption>
                              <h3>Bookings & Payments</h3>
                              <p>All bookings made through the Site and Affiliate Websites are agreements between the Host and Guest. Once the Host has agreed they are available for the requested dates, 
							  the Guest can proceed to make the Booking where they agree to pay a non-refundable Booking Fee.  </p>

                              <p>Applicable Booking Fees will be displayed to Guests prior to completion of the booking online. Whilst the Booking Fee is part of the price payable for the accommodation supplied by the Host, 
							  Homestay Technologies Limited will retain the booking fee as the consideration due from the Host for the supply of the services by Homestay Technologies Limited to the Host. </p>
                         </figcaption>
                    </figure>

                    <figure>
                         <figcaption>
                              <h3>Cancellations</h3>
                              <p>In the event that the Host must cancel a Booking, the Host agrees to notify Homestay Technologies Limited directly of the cancellation and the reason as to why the Booking cannot be honoured.</p>

                              <p>Homestay Technologies Limited has no control cancellations of Bookings and disclaims all liability in this regard. For the purpose of this clause 6, a day begins at 00.01 a.m. and ends at 12 midnight, 
							  in the time zone where the Accommodation is located.</p>
                         </figcaption>
                    </figure>

                    <figure>
                         <figcaption>
                              <h3>Reviews</h3>
                              <p>Where you provide a review following a stay, Homestay Technologies Limited may include this review on the Site or Affiliate Website.</p>

                              <p>Homestay Technologies Ltd reserves the right to use such reviews at our discretion, for marketing, promotion or improvement of service. Homestay Technologies reserves the right to refuse, 
							     edit or remove reviews at our sole discretion.</p>
                         </figcaption>
                    </figure>
               </div>
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


     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>

</body>
</php>