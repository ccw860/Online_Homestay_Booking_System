<style>
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
img{ padding:5px;
	width:150px;}

div a:hover{
	color:white;}

</style>
<script>
function confirmation()
{
	var option;
	option=confirm("Are you sure you want to delete?");
	
	return option;
}
</script>	
</head>
<body>

<?php include("menu.php");

?>

	<div style="margin-left:180px;padding:0px 20px;height:100%; margin-right:-30px;">
		<div class="out" >
			<div class="up">
				<ul>
					<li class="atv"><a href="homestay.php">Homestay List</a></li>
					<li><a href="addhomestay.php">Add Homestay</a></li>
				</ul>
			</div>


<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row mt-9">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered">
					<tr>
					
						<th class="text-center">Home ID</th>
						<th class="text-center">Home Name</th>
						<th class="text-center">Home Type</th>
						<th class="text-center">Price per Night</th>
						<th class="text-center">Action</th>
						
					</tr>
			<?php
			
			$result = mysqli_query($connect, "SELECT * from home_details");	
	         while($row = mysqli_fetch_assoc($result))
				{
				
			?>
			<tr>
						<td class="text-center"><?php echo $row['home_id']?></td>
						<td class="text-center"><?php echo $row['home_name']?></td>
						<td class="text-center"><?php echo $row['home_code']?></td>
						<td class="text-center">RM<?php echo $row['price_per_night']?></td>
						<td class="text-center">
							<a href="home_view.php?edit&id=<?php echo $row['home_id']?>"><button class="btn btn-sm btn-primary check_out" type="button">View</button></a>				
							<a href="homestay.php?delete&id=<?php echo $row['home_id'];?>"onclick="return confirmation();"><button class="btn btn-sm btn-danger delete_cat" type="button">Delete</button></a>
						</td>
						
			</tr>			
			
			<?php
			}
			?>
			</table>
			</div>
		</div>
		</div>
</div>
</div>
</div>
</body>
</html>

<?php

if(isset($_GET["delete"]))
{
	$homeid=$_GET["id"];
	mysqli_query($connect,"Delete from home_details where home_id='$homeid'");

?>
	<script>
	alert("Record deleted");
	</script>
<?php
	header("refresh:0.5; url=homestay.php");
}

?>
	




