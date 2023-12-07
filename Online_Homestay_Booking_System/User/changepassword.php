<?php 
include("dataconnection.php");
?>


<?php
session_start();
?>
<html>
<head>
     <title>Change Password</title>
<style>
label {
	margin-left:550px; width: 200px;height: 120px;margin-bottom: 20px;
	}
input[type=password] {
  width: 50%;
  box-sizing: border-box;
  margin-left:550px;
}

</style>
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
<body>
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
	 <?php 
	 }
	 ?>		  
     </section>
	 	<?php
		if(isset($_GET["changebtn"]))
		{
			$cid=$_GET["id"];
			$result= mysqli_query($connect, "SELECT *from customer WHERE cus_id='$cid'");
			$row = mysqli_fetch_assoc($result);
		}
			
		?>
<h1><label style="text-align:center;font-size:20px;color:#29ca8e;">Change your password : <?php echo $row['cus_name'];?></label></h1>

<?php 
if(isset($_POST["changebtn"]))
{
	$pass=$_POST["oldpass"];
	$newpass=$_POST["newpass"];
	$conpass=$_POST["confirmpass"];
	
	
	$sql="SELECT * FROM customer WHERE cus_id='$cid' and cus_pass='$pass'";
	$result=mysqli_query($connect,$sql);
	$row=mysqli_num_rows($result);
	
	if($row==0)
	{
		?>
		<script type="text/javascript">
					alert("Sorry, your old password is incorrect! Please enter your old password correctly!");
					</script>
		<?php
	}
	else
	{
		if($conpass !=$newpass)
		{
			?>
		<script type="text/javascript">
					alert("Your New Password and Confirm Password must be the same.");
					</script>
		<?php
		}
		else
		{
			$sql="UPDATE customer SET cus_pass='$newpass' WHERE cus_id='$cid'";
			if(mysqli_query($connect,$sql))
			{
        ?>
		<script type="text/javascript">
					alert("Password Changed Successfully !!");
					window.location="profile.php";
					</script>
		<?php
			}
			else
			{
				?>
		<script type="text/javascript">
					alert("Sorry, there was some error.");
					
					</script>
		<?php
			}
		}
	}
}
?>
<form method="post" onsubmit="return validation()" name="changefrm" action="">

<div class="form-group">
    <label style="text-align:center;font-size:20px;color:#29ca8e;"><br>Old Password</label>
	<input name="oldpass" type="password" class="form-control" id="pass">
</div>

<div class="form-group">
    <label style="text-align:center;font-size:20px;color:#29ca8e;">New Password</label>
	<input name="newpass" type="password" class="form-control" id="newpass">
	<input style="margin-left:550px; width: 200px;height: 120px;margin-bottom: 20px;" type="checkbox" onclick="Toggle()"><b> Show Password</b><br>
	
</div>

<div class="form-group">
    <label style="text-align:center;font-size:20px;color:#29ca8e;">Confirm Password</label>
	<input name="confirmpass" type="password" class="form-control" id="confirmpass">
	<input style="margin-left:550px; width: 200px;height: 120px;margin-bottom: 20px;" type="checkbox" onclick="toggle()"><b> Show Password</b><br>
</div>

      <button name="changebtn" style="margin-left:550px; width: 200px;height: 120px;margin-bottom: 20px; background-color:#29ca8e;" type="submit" class="btn btn-primary btn-sm">Change Password</button>
	  
     <br><button name="backbtn" style="margin-left:550px; width: 200px;height: 120px;margin-bottom: 20px; background-color:#29ca8e;" type="submit"><a href="profile.php">Back</a></button><br>


</body>
</form>
</html>

<script> 
        function Toggle() { 
            var temp = document.getElementById("newpass"); 
            if (temp.type === "password") { 
                temp.type = "text"; 
            } 
            else { 
                temp.type = "password"; 
            } 
        } 
	</script> 
	<script> 
        function toggle() { 
            var temp = document.getElementById("confirmpass"); 
            if (temp.type === "password") { 
                temp.type = "text"; 
            } 
            else { 
                temp.type = "password"; 
            } 
        } 
	</script>
<script>
    function validation() { 
		var newpass = document.changefrm.newpass.value;
 	
		if ((newpass.length < 4) || (newpass.length > 20))
		{
			window.alert("Your Password must be 4 to 10 Character");
			document.changefrm.newpass.select();
			return false;
		}
		
		if (newpass.search(/[0-9]/) < 0)
        {
         window.alert("Your password must contain at least one digit.");
         document.changefrm.newpass.select();
        return false;
        }
		
		if (newpass.search(/[a-z]/i) < 0)
        {
         window.alert("Your password must contain at least one letter.");
         document.changefrm.newpass.select();
        return false;
        }
  
        return true; 
    } 			
</script>

 <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>