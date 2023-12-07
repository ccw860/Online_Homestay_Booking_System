<?php
session_start();
include ("dataconnection.php");?>
<html lang="en">
<head>
<style>
button {
  background-color: white;
  border: none;
  border-radius:30px;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}


</style>
     <title>Rainbow Homestay</title>
</head>
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


<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
     <section class="preloader">
          <div class="spinner">
               <span class="spinner-rotate"></span>
          </div>
     </section>

	 
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
						 <li class="active">
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
?>

		<?php
			$sql="select * from customer where cus_email='$_SESSION[login_user]'";
			$q=mysqli_query($connect,$sql);
			$row=mysqli_fetch_assoc($q);
		?>
		
		<h1 style="margin-left:250px; margin-top:20px;">Your Profile Details : <?php echo $row['cus_name'];?></h1>
		
		<p style="margin-left:550px; width: 200px;height: 120px;font-size:20px;">
		<br>Name     : <?php echo $row['cus_name']; ?></br>
		<br>Contact Number : <?php echo $row['cus_contact_num']; ?></br>
		<br>Email Address  : <?php echo $row['cus_email']; ?></br>		
		<br><button type="submit" name="edit"><a href="useredit.php?edit&id= <?php echo $row['cus_id']; ?> "class="section-btn btn btn-primary btn-block">Edit Profile !</a></button></br>
		<br><button type="submit" name="changepass"><a href="changepassword.php?changebtn&id= <?php echo $row['cus_id']; ?>"class="section-btn btn btn-primary btn-block">Change Password.</a></button></br>
		</p>

</body>
</html>

 <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>
