
<?php
session_start();
$error = NULL;
?>
<?php


if(isset($_POST["register"]))
{
	$mysqli = New MySQLi("localhost","root","","homestay_online_booking_system");
	
	$cname = $_POST["cusname"];
	$cnum = $_POST["cushp"];
	$cemail = $_POST["cusemail"];
	$cuspass = $_POST["password"];
	$confirmPassword = $_POST["cpassword"];
	$mail=$mysqli->query("SELECT * from customer where cus_email = '$cemail'");
	$result=mysqli_num_rows($mail);

	if($result>0)
	{
		?>
		<script>
		alert("This email is already in used. Please try another email.");
		</script>
		<?php
		header("refresh:0.5; url=cregister.php");
	}elseif($confirmPassword !=$cuspass)
	{
		
		$error .="<p>Your passwords do not match </p>";
	}
	
	else
	{
		//Form is valid
		
		//Connect to the database
		
		
		//Sanitize form data
		$cname = $mysqli->real_escape_string($cname);
		$cnum = $mysqli->real_escape_string($cnum);
		$cemail = $mysqli->real_escape_string($cemail);
		$cuspass = $mysqli->real_escape_string($cuspass);
		$confirmPassword = $mysqli->real_escape_string($confirmPassword);
		
		
		//Generate Vkey
		$vkey = md5(time().$cname);
		
		$insert = $mysqli->query("INSERT INTO customer(cus_name,cus_contact_num,cus_email,cus_pass,vkey)
		VALUES('$cname','$cnum','$cemail','$cuspass','$vkey')");
			
			if($insert)
			{
				$to = $cemail;
				$subject = "Email Verification";
				$message = "Register Account 'http://localhost/online_homestay_booking_system/User/verify.php?vkey=$vkey'";
				$headers = "rainbowhomestay123@gmail.com";


			if(mail($to, $subject, $message, $headers)){
				echo "Email sent successfully to $to";
			}
			else{
				echo "Sorry, failed while sending mail!";
}

			}
			else
			{
				echo $mysqli->error;
			}
		
		
	}
	
}
?>	
<html>
<head>

     <title>Registration</title>
	 <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
	     <h2>Customer Registration</h2>
	</div>
    
	<form name="user_form" form method="POST" action="" onsubmit="return validation()">
	     <div class="input-group">
		     <label> Name</label>
			 <input type="text" id="name" name="cusname"  minlength="5"required>
         </div>
		 <div class="input-group">
		     <label>Contact Number</label>
			 <input type="tel" id="number" name="cushp" placeholder="000-0000000" pattern="[0-9]{3}-[0-9]{7}" required>
         </div>
	     <div class="input-group">
		     <label>Email</label>
			 <input type="email" id="email" name="cusemail" required>
         </div>
		 	     <div class="input-group">
		     <label>Password</label>
			 <input type="password" id="password" name="password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"required>
         </div>
		 </div>
		 	     <div class="input-group">
		     <label>Confirm Password</label>
			 <input type="password" id="cpassword" name="cpassword">
         </div>
	     <div class="input-group">
            <button type="submit" id="register" name="register" class="btn">Register</button>
         </div>
		 <p>
		    Already a member? <a href="login.php">Sign in</a>
		 </p>
	</form>
<?php
echo $error;
?>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#register").click(function () {
            var password = $("#password").val();
            var confirmPassword = $("#cpassword").val();
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        });
    });
</script>

	
</html>