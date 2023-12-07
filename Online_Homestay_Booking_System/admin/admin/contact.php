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
</style>
<script>
function confirmation()
{
	var answer;
	answer=confirm("Are you sure you want to delete?");
	return answer;
}
</script>	
</head>
<?php include("menu.php");?>

	<div style="margin-left:180px;padding:0px 20px;height:100%; margin-right:-30px;">
		<div class="out" >
			<div class="up">
				<ul>
					<li class="atv"><a href="contact.php">Contact List</a></li>
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
						<th class="text-center">Contact ID</th>
						<th class="text-center">Customer name</th>
						<th class="text-center">Customer Email</th>
						<th class="text-center">Message</th>
						<th class="text-center">Action</th>
						
						
					</tr>
					<?php
			
			$result = mysqli_query($connect, "SELECT * from contact_us");	
	         while($row = mysqli_fetch_assoc($result))
				{
				
				?>			

				<tr>
					<td class="text-center"><?php echo $row['contact_id'];?></td>
					<td class="text-center"><?php echo $row['cus_name'];?></td>
					<td class="text-center"><?php echo $row['email'];?></td>
					<td class="text-center"><?php echo $row['message'];?></td>
					<td class="text-center"><a href="contact.php?delete&id=<?php echo $row['contact_id'];?>"onclick="return confirmation();"><button class="btn btn-sm btn-danger delete_cat" type="button">Delete</button></a></td>		

					
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
	$cid=$_GET["id"];
	
	mysqli_query($connect,"Delete from contact_us where contact_id='$cid'");

?>
	<script>
	alert("Record deleted");
	</script>
<?php
	header("refresh:0.5; url=contact.php");
}

?>