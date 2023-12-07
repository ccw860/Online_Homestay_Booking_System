
<style>

.out{
background-color:#EFF8FB;
height:100%}

.right{
 margin-left:10px;
 margin-top:0px;
    width: 200px;
    height: 120px;	
}

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
</style>
<body>
		<?php
		include ("menu.php");
		?>
		<div style="margin-left:180px;padding:0px 20px;height:100%; margin-right:-30px;">
		<div class="out" >
		<div class="up">
				<ul>
					<li class="atv"><a href="booking.php">Profile Details</a></li>
				</ul>
		</div>
		
		<?php
			$sql="select * from admin where admin_email='$_SESSION[admin_login]'";
			$q=mysqli_query($connect,$sql);
			$row=mysqli_fetch_assoc($q);
		?>
		<div class="right">
		<h1>Your Profile Details : <?php echo $row['admin_name']; ?></h1>
		
		<p>
		<br><b>Name     : </b><?php echo $row['admin_name']; ?></br>
		<br><b>Email Address  : </b><?php echo $row['admin_email']; ?></br>
		<br><b>Password       : </b><?php echo $row['admin_pass']; ?></br>
		<br><b>Contact Number : </b><?php echo $row['admin_contact_number']; ?></br>
   
		<br><a href="adminedit.php?edit&id= <?php echo $row['admin_id']; ?>"><button class="btn btn-sm btn-primary check_out" type="button">Edit Profile !</button></a></br>
		</p>
		</div>
		</div>
		</div>
		