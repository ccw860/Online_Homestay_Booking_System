<style>
body{overflow:hidden;}

.out{
background-color:#EFF8FB;
height:100%}

.up ul{
background-size:50%;
height:50px;
background-color:#7087A3;
padding:8px;
}
.up li{float:left;
margin-right:30px;
list-style-type:none;

}

.up li a{text-decoration:none;
color:white;
}

.up .atv {
height:35px;
font-weight: bold
}

.up .atv a{color:black;
}

.search{margin-left:35px;
margin-bottom:20px;
}

.box table{background-color:white;
margin-left:30px;
border:1px solid lightgrey;
border-collapse:collapse;

}

.row{text-align:left;
}

.box table td{text-align:center;
}

.box table tr{height:40px;
}

div a:hover{color: ;}

.right{
 margin-left:10px;
 margin-top:0px;
    width: 200px;
    height: 120px;

	
}
</style>
<script>
function confirmation()
{
	var answer;
	answer=confirm("Are you sure you want to delete?");
	return answer;
}
</script>
<?php include("menu.php");?>

	<div style="margin-left:180px;padding:0px 20px;height:100%; margin-right:-30px;">
		<div class="out" >
		<div class="up">
				<ul>
					<li class="atv"><a href="booking.php">Booking List</a></li>
				</ul>
			</div>
			<div class="right">
<?php
		if(isset($_GET["id"]))
		{
			$bid=$_GET["id"];
			$result= mysqli_query($connect, "SELECT * FROM booking_details where id='$bid'");
			$row = mysqli_fetch_assoc($result);
		}
			
?>
		
		<h1>View Booking ID:<?php echo $row['id']?> </h1>

		<form name="addfrm" method="post" action="">

					<p><b>Book ID: </b><?php echo $row['id']?></p>
					<p><b>Home ID: </b><?php echo $row['home_id']?></p>
					<p><b>Customer ID: </b><?php echo $row['cus_id']?></p>
					<p><b>Customer Name: </b><?php echo $row['name']?></p>
					<p><b>Customer Email: </b><?php echo $row['email']?></p>
					<p><b>Customer contact number: </b><?php echo $row['phone']?></p>
					<p><b>Customer IC: </b><?php echo $row['cus_ic']?></p>				
					<p><b>Start Date: </b><?php echo $row['checkin_date'];?></p>				
					<p><b>End Date: </b><?php echo $row['checkout_date'];?></p>				
					<p><b>Message: </b><?php echo $row['message'];?></p>
					<p><b>Status: </b><?php echo $row['status'];?></p>
					
				
					<a href="booking.php"><button class="btn btn-sm btn-primary check_out" type="button">Back</button></a>
					<a href="booking.php?delete&id=<?php echo $row['id'];?>"onclick="return confirmation();"><button class="btn btn-sm btn-danger delete_cat" type="button">Delete</button></a>
				
		</form>
	   
	</div>
	</div>
	</div>



<?php

if(isset($_GET["delete"]))
{
	$bid=$_GET["id"];
	
	mysqli_query($connect,"Delete from booking_details where id='$bid'");

?>
	<script>
	alert("Record deleted");
	</script>
<?php
	header("refresh:0.5; url=booking.php");
}

?>