<?php
if(isset($_GET['vkey']))
	//Process Verification
{
	$vkey=$_GET['vkey'];
	
	$mysqli = New MySQLi("localhost","root","","homestay_online_booking_system");
	$resultSet = $mysqli->query("SELECT verified,vkey FROM customer WHERE verified = 0 AND vkey ='$vkey' LIMIT 1");
	
	if($resultSet->num_rows == 1)
	{
		//Validate The email
		$update= $mysqli->query("UPDATE customer set verified = 1 WHERE vkey = '$vkey' LIMIT 1 ");
		
		if($update)
		{
			echo "Your account has been verified. You may now login.";
			

	header("refresh:2.0; url=login.php");

		}
		else{
			echo $mysqli->error;
		}
	}
	else{
		echo "This account invalid or already verified";
	}
}

else
{
	die("Something went wrong");
}
?>