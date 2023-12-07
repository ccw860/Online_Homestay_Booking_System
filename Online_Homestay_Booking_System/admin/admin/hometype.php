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
					<li class="atv"><a href="hometype.php">Hometype list</a></li>
					<li><a href="add_hometype.php">Add Hometype</a></li>
				</ul>
			</div>
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row mt-3">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered">
					<tr>
						<th class="text-center">Home Code</th>
						<th class="text-center">State</th>
						<th class="text-center">Action</th>
					</tr>
					
			<?php
			$result = mysqli_query($connect, "SELECT * FROM home_type");	
			$count = mysqli_num_rows($result);
			while($row= mysqli_fetch_assoc($result))
			{
			?>
			<tr>
						<td class="text-center"><?php echo $row['home_code']?></td>
						<td class="text-center"><?php echo $row['home_state']?></td>
						<td class="text-center"><a href="hometype.php?delete&id=<?php echo $row['home_code'];?>"onclick="return confirmation();"><button class="btn btn-sm btn-danger delete_cat" type="button">Delete</button></a></td>			
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
</div>
</div>
</body>
</html>
<?php

if(isset($_GET["delete"]))
{
	$hcode=$_GET["id"];
	mysqli_query($connect,"Delete from home_type where home_code='$hcode'");
?>
	<script>
	alert("Record deleted");
	</script>
<?php
	header("refresh:0.5; url=hometype.php");
}

?>





