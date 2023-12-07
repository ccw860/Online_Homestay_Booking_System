<?php include("dataconnection.php"); ?>
<?php
session_start();
ob_start();
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
	 <script src="http://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

	
	

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/style.css">
	 <link rel="stylesheet" href="css/main(2).css">


</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">


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
		    if(isset($_GET["book"]))
			{
			$hid = $_GET["id"];

			$result = mysqli_query($connect, "SELECT * from home_details where home_id='$hid'");
			$row = mysqli_fetch_assoc($result);
			}
		?>

 <?php

       if(isset($_POST['submitbtn']))
		{
		if(isset($_SESSION['login_user'])){
            $name = $_POST['cusname'];
            $email =$_POST['cusemail'];
            $phone = $_POST['cusnum'];
            $ic= $_POST['ic'];
            $date1 = $_POST['startdate'];
            $date2 = $_POST['enddate'];
            $message = $_POST['message'];
			$price=$_POST["price"];
			$status="unpaid";
			

			$dat1 = strtotime($date1);
			$dat2 = strtotime($date2);
			$diff = ($dat2- $dat1)/60/60/24;
			$pay = $row["price_per_night"] * $diff; //calculate payment for each purchase
			


			$num = "select * from booking_details where home_id='$hid' and (checkin_date<='$date2') and (checkout_date>='$date2')";
			$result = mysqli_query($connect,$num);
			$cb = mysqli_num_rows($result);
			
			if($cb >0)
		{
			?>
			<script type="text/javascript">
			alert("Your booking date has been booked. Please select another date.");
			</script>
			<?php
	header("url=adminprofile.php");
	?>
			<?php
		}
		else
		{
			?>
			<script type="text/javascript">
			alert("Your booking has success booked. Please proceed to history page and click Unpaid to pay your fees!");
			window.location="history.php";
			</script>
			<?php
			mysqli_query($connect,"INSERT INTO booking_details(home_id,cus_id,name,email,phone,cus_ic,checkin_date,checkout_date,message,price_per_night,num_of_day,total_payment,status)VALUES('$hid','$_SESSION[user_id]','$name','$email','$phone','$ic','$date1','$date2','$message','$price','$diff','$pay','$status')");           
		}
}		
else{
			?>
			<script type="text/javascript">
			alert("You must login first to book your appointment.");
			window.location="login.php";
			</script>
			<?php
		}
			
		              
		}
		?>

               <div class="row">
                    <div class="col-lg-8">
                         <div class="panel panel-default">
                              <div class="panel-heading">
                                   <h4>Enquiry</h4>
                              </div>

                              <div class="panel-body">
                                   <div class="form">
                                        <form name="add" method="post" action="">
                                             <div class="row">
                                                  <div class="col-sm-6 col-xs-12">
                                                       <div class="form-group">
                                                            <label class="control-label">Name:</label>
                                                            <input type="text"name="cusname" class="form-control"required>
                                                       </div>
                                                  </div>
                                                  <div class="col-sm-6 col-xs-12">
                                                       <div class="form-group">
                                                            <label class="control-label">Email</label>
                                                            <input type="email" name="cusemail"class="form-control" value="<?php echo $_SESSION['login_user'];?>"required>
                                                       </div>
                                                  </div>
                                             </div>

                                             <div class="row">
                                                  <div class="col-sm-6 col-xs-12">
                                                       <div class="form-group">
                                                            <label class="control-label">Contact Number:</label>
                                                            <input type="tel" pattern="[0-9]{3}-[0-9]{7}"name="cusnum"class="form-control" placeholder="012-3456789"required>
                                                       </div>												   
                                                  </div>
											<div class="col-sm-6 col-xs-12">
                                                       <div class="form-group">
                                                            <label class="control-label">NRIC:</label>
                                                            <input type="text" pattern="(([[0-9]{2})(0[0-9]|1[0-2])(0[0-9]|[12][0-9]|3[01]))-([0-9]{2})-([0-9]{4})" name="ic"class="form-control" placeholder="000000-00-0000"required>
                                                       </div>
                                                  </div>
        <script>
            $(document).ready(function () {
				var minDate = new Date();
                $("#startdate").datepicker({
                    showAnim: 'drop',
                    numberOfMonth: 1,
					minDate:minDate,
                    dateFormat: 'dd-mm-yy',
                    onClose: function (selectedDate) {
                        $("#enddate").datepicker("option", "minDate", selectedDate);
                    }
                });



                $("#enddate").datepicker({
                    showAnim: 'drop',
                    numberOfMonth: 1,
                    dateFormat: 'dd-mm-yy',
                    onClose: function (selectedDate) {
                        $("#startdate").datepicker("option", "maxDate", selectedDate);
                    }
                });

            });


        </script>


                                                  <div class="col-sm-8 col-xs-12">
                                                       <div class="row">
                                                            <div class="col-sm-6 col-xs-13">
                                                                 <div class="form-group">
                                                                      <label class="control-label">Check in Date:</label>

                                                                      <div class="input-group">
                                                                           <span class="input-group-addon"></i></span>

                                                                           <input type="text" id="startdate" name="startdate" class="form-control"required>
                                                                      </div>
                                                                 </div>
                                                            </div>

                                                            <div class="col-sm-6 col-xs-13">
                                                                 <div class="form-group">
                                                                      <label class="control-label">Check out Date:</label>

                                                                      <div class="input-group">
                                                                           <span class="input-group-addon"></i></span>
                                                                           
                                                                           <input type="text" id="enddate" name="enddate"class="form-control" value=""required>
                                                                      </div>
                                                                 </div>
                                                            </div>

                                                            <div class="col-sm-6 col-xs-12">
                                                                 <div class="form-group">
                                                                      <label class="control-label">Price per night</label>

                                                                      <div class="input-group">
                                                                           <span class="input-group-addon"></i></span>
                                                                           
                                                                           <input type="text" name="price"class="form-control" value="<?php echo $row['price_per_night'];?>"readonly>
                                                                      </div>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>

                                             <div class="form-group">
                                                  <label class="control-label">Message</label>

                                                  <textarea class="form-control" cols="30" rows="10"name="message"required></textarea>
                                             </div>

                                             <button type="submit" name="submitbtn" class="section-btn btn btn-primary">Send Request</button>
                                        </form>
                                   </div>
                              </div>
                         </div>
                    </div>