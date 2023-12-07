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

	<div style="margin-left:180px;padding:0px 20px;height:120%; margin-right:-30px;">
		<div class="out" >
		<div class="up">
				<ul>
					<li class="atv"><a href="homestay.php">Homestay</a></li>
				</ul>
			</div>
			<div class="right">
			 

			<?php
			if(isset($_GET["id"]))
			{
				$hid=$_GET["id"];
				$result= mysqli_query($connect, "SELECT * FROM home_details where home_id='$hid'");
				$row = mysqli_fetch_assoc($result);
			}
			?>
		
		<h1>View Homstay:<?php echo $row['home_name']?></h1>
		
		<form name="addfrm" method="post" action="">

					<p><img src="../image/<?php echo $row['image1']?>" width="300"></p>
					<p><b>Home ID: </b><?php echo $row['home_id']?></p>
					<p><b>Home Name: </b><?php echo $row['home_name']?></p>
					<p><b>Home Type: </b><?php echo $row['home_code']?></p>
					<p><b>Price per Night: RM</b><?php echo $row['price_per_night']?></p>
					<p><b>Home Facilities: </b><?php echo $row['home_facilities']?></p>
					<p><b>Number of rooms: </b><?php echo $row['num_of_room']?></p>
					<p><b>Home address: </b><?php echo $row['home_address']?></p>
					<p><b>Description: </b><?php echo $row['description']?></p>
		
					<a href="home_edit.php?edit&id=<?php echo $row ['home_id'];?>"><button class="btn btn-sm btn-primary check_out" type="button">Edit</button></a>
					<a href="homestay.php"><button class="btn btn-sm btn-primary check_out" type="button">Back</button></a>
					<a href="homestay.php?delete&id=<?php echo $row['home_id'];?>"onclick="return confirmation();"><button class="btn btn-sm btn-danger delete_cat" type="button">Delete</button></a>
		</form>
	</div>
	</div>
	</div>



<?php

if(isset($_GET["delete"]))
{
	$hid=$_GET["id"];
	
	mysqli_query($connect,"Delete from home_details where id='$hid'");

?>
	<script>
	alert("Record deleted");
	</script>
<?php
	header("refresh:0.5; url=homestay.php");
}

?>