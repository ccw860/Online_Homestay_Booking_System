<?php
session_start();
ob_start();
include ("dataconnection.php");?>

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
	 <link rel="stylesheet" href="css/main.css?v=<?php echo time(); ?>">

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
                         <li><a href="terms.php">Terms</a></li>
                         <li><a href="about-us.php">About Us</a></li>
                         <li><a href="contact.php">Contact Us</a></li>
						 <li class="active"><a href="history.php">History</a></li>
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

<div class="filter">

</div>

    <table>

	    <tr>
		    <th>Booking id</th>
			<th>Home id</th>
			<th>Customer Name</th>
			<th>Customer Email</th>
			<th>Customer contact number</th>
			<th>Customer IC</th>
			<th>Start Date</th>
			<th>End date</th>
			<th>Message</th>
			<th>Price per night</th>
			<th>Number of Days</th>
			<th>Total Payment</th>
			<th>Action</th>
			<th>Status</th>
			
	    </tr> 
		<?php
			$result = mysqli_query($connect, "SELECT * from booking_details WHERE cus_id= '$_SESSION[user_id]'");
		
			mysqli_query($connect,"DELETE FROM booking_details WHERE status = 'unpaid' AND book_time < now() - INTERVAL 1 DAY");
			
	         while($row = mysqli_fetch_assoc($result))
			 {			
				
				?>				
		<tr>
		    <td><?php echo $row['id'];?></td>
			<td><?php echo $row['home_id'];?></td>
			<td><?php echo $row['name'];?></td>
			<td><?php echo $row['email'];?></td>
			<td><?php echo $row['phone'];?></td>
			<td><?php echo $row['cus_ic'];?></td>
			<td><?php echo $row['checkin_date'];?></td>
			<td><?php echo $row['checkout_date'];?></td>
			<td style="max-width:220px; word-wrap:break-word;word-break:break-all;"><?php echo $row['message'];?></td>
			<td><?php echo $row['price_per_night'];?></td>
			<td><?php echo $row['num_of_day'];?></td>
			<td><?php echo $row['total_payment'];?></td>
			

			<?php
			if($row['status']=="unpaid"){
				?>
			<td><a href="history.php?delete&id=<?php echo $row['id'];?>"onclick="return confirmation();">Cancel</p></a></td>
			<td><a href="checkout.php?checkout&id=<?php echo $row['id'];?>"onclick="return confirmation2();"><?php echo $row['status'];?></td>
			
		</tr>
		<?php
		}
		else
		{
			?>
			<td>Confirmed</td>
			<td><?php echo $row['status'];?></button></td>
			
		<?php
		}
			}		

			?>
	</table>
	
	 <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>
</body>
</html>
<script>
function confirmation()
{
	var answer;
	answer=confirm("Are you sure you want to delete this booking?");
	return answer;
}
</script>
<script>
function confirmation2()
{
	var answer;
	answer=confirm("Are you sure you want proceed to payment form?");
	return answer;
}
</script>		
<?php

if(isset($_GET["delete"]))
{
	$id=$_GET["id"];
	
	mysqli_query($connect,"Delete from booking_details where id='$id'");

?>
	<script>
	alert("Record deleted");
	</script>
<?php
	header("refresh:0.5; url=history.php");
}

?>
			