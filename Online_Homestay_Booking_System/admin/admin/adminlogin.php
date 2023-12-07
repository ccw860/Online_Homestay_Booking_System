<?php
session_start();
include("dataconnection.php");
?>

<!DOCTYPE html>
<html>
<head>
     <title>Login</title>
	 <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
	     <h2>Admin Login</h2>
	</div>
    
	<form method="post" action="">
	     <div class="input-group">
		     <label>Email Address</label>
			 <input type="email" name="adminemail">
         </div>
	     <div class="input-group">
		     <label>Password</label>
			 <input type="password" name="adminpassword">
         </div>
	     <div class="input-group">
            <button type="submit" name="adminlogin" class="btn">Login</button>
         </div>
	</form>	 
	
</html>
<?php
if(isset($_POST["adminlogin"]))
{
	$email = $_POST["adminemail"];
	$password = $_POST["adminpassword"];

	$result = mysqli_query($connect,"select * from admin where admin_email='$email' && admin_pass= '$password'");
	
	$num = mysqli_num_rows($result);
	
	if($num==1)
	{
		$row = mysqli_fetch_assoc($result);
		$_SESSION['id']=$row['admin_id'];
?>
<script type="text/javascript">
alert('Login successfully!');
</script>
<?php
$_SESSION['admin_login'] = $email;
header("location:dashboard.php");
	}
	else
	{
?>
<script type="text/javascript">
alert('Wrong email and password! Please try again.');
</script>
<?php
	}
}

?>