<?php
$connect=mysqli_connect("localhost","root","","homestay_online_booking_system");


if($connect)
{

}
else

	{
		die("Could not connect".mysqli_error());
	}
?>