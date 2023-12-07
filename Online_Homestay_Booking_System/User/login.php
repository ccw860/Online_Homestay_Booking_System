<?php
session_start();
$error = NULL;

if(isset($_POST["login"]))
{
	//Connect to the database
	$mysqli = New MySQLi("localhost","root","","homestay_online_booking_system");
	
	//Get form data
	$email = $mysqli->real_escape_string($_POST['cusemail']);
	$password = $mysqli->real_escape_string($_POST['password']);
	
	//Query the database
	$resultSet = $mysqli->query("select * from customer where cus_email='$email' AND cus_pass= '$password' LIMIT 1");
	
	if($resultSet->num_rows !=0)
	{
		//Process Login
		$row = $resultSet->fetch_assoc();
		$verified = $row['verified'];
		$email = $row['cus_email'];
		$date = $row['createdate'];
		$date = strtotime($date);
		$date = date('M d Y',$date);

		
		if($verified == 1)
		{
			$_SESSION['user_id'] = $row['cus_id'];
			//Continue Processing
			$_SESSION['login_user'] = $email;
			header("refresh:0.5; url=index.php?user=id=". $_SESSION['user_id']);


		}
		else
		{

			$error = "This account has not yet been verified. An email was sent to $email on $date";
		}
	}
		else
		{
			?>
		<script>
		alert("The email or password you entered is incorrect");
		</script>
		<?php
		header("refresh:0.5; url=login.php");
			
		}
	
	
}	
?>


<!DOCTYPE html>
<html>
<head>
     <title>Login</title>
	 <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
	     <h2>Login</h2>
	</div>
    
	<form method="post" action="">
	     <div class="input-group">
		     <label>Email Address</label>
			 <input type="email" name="cusemail" >
         </div>
	     <div class="input-group">
		     <label>Password</label>
			 <input type="password" name="password">
         </div>
	     <div class="input-group">
            <button type="submit" name="login" class="btn">Login</button>
         </div>
		 <p>
		    Not a member yet? <a href="cregister.php">Sign up</a>
		 </p>
	</form>	 
<?php echo $error; ?>	
</html>
