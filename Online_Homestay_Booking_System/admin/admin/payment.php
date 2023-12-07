<style>
body{overflow:hidden;}

.out{
background-color:#b7b1a5;
height:100%}

.up ul{
background-size:50%;
height:50px;
background-color:#a29988;
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
<?php include("menu.php");?>

	<div style="margin-left:180px;padding:0px 20px;height:100%; margin-right:-30px;">
		<div class="out" >
			<div class="up">
				<ul>
					<li class="atv"><a href="payment.php">Payment List</a></li>

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
						<th class="text-center">Payment No</th>
						<th class="text-center">Booking ID</th>
						<th class="text-center">Customer Name</th>
						<th class="text-center">Payment Type</th>
						<th class="text-center">Total Payment</th>
										
					</tr>
					<?php
			
			$result = mysqli_query($connect, "SELECT * from payment");	
	         while($row = mysqli_fetch_assoc($result))
				{
				
				?>			

				<tr>
					<td class="text-center"><?php echo $row['payment_no'];?></td>
					<td class="text-center"><?php echo $row['book_id'];?></td>
					<td class="text-center"><?php echo $row['cus_name'];?></td>
					<td class="text-center"><span class="badge badge-success"><?php echo $row['payment_type'];?></span></td>
					<td class="text-center"><?php echo $row['total_payment'];?></td>
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




