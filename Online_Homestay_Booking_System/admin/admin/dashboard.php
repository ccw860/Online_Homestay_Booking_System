<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<html>
<head>
<title>Rainbow Homestay Booking System</title>

<script src="https://kit.fontawesome.com/e7979f68b5.js"></script>
<link rel="stylesheet" type="text/css" href="design.css">
<link rel="stylesheet" type="text/css" href="styles.css">

<style>


.c1 div{text-align:center;
float:left;
margin-top:20px;
margin-right:20px;
margin-left:150px;
padding:10px;
width:400px;
border:1px solid black;
background-color:#8696a7;
}

.c1 a{text-decoration:none;
color:black;
}

.c2 div{text-align:center;
float:left;
margin-top:20px;
margin-right:20px;
margin-left:150px;
padding:10px;
width:400px;
border:1px solid black;
background-color:#8696a7;
}

.c2 a{text-decoration:none;
color:black;
}

.navbar {
  position: relative;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
  padding: 0.5rem 1rem;
}

.bg-dark {
  background-color: #343a40 !important;
}

	.logo {
    margin: auto;
    font-size: 20px;
    background: white;
    padding: 5px 11px;
    border-radius: 50% 50%;
    color: #000000b3;
}

.out{
background-color:#c1cbd7;
height:100%}

</style>
</head>
<body>
<nav class="navbar navbar-dark bg-dark fixed-top " style="padding:0;">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
  		<div class="col-md-1 float-left" style="display: flex;">
  			<div class="logo">
  				<i class="fa fa-building"></i>
  			</div>
  		</div>
      <div class="col-md-4 float-left text-white">
        <large><b>Homestay Management System</b></large>
      </div>
    </div>
  </div>
  
</nav>

<div class="menu">
	<ul>
				<a href="dashboard.php"><i class="fa fa-tachometer"><span class='icon-field'></i></span> Dashboard </a>
				<a href="admin.php"><i class="fa fa-lock"><span class='icon-field'></i></span> Admin </a>
				<a href="customer.php"><i class="fa fa-user"><span class='icon-field'></i></span> Customer </a>
				<a href="booking.php"><i class="fa fa-list"><span class='icon-field'></i></span> Booking </a>
				<a href="homestay.php"><i class="fa fa-home"><span class='icon-field'></i></span> Homestay </a>
				<a href="hometype.php"><i class="fa fa-cog"><span class='icon-field'></i></span> Home Type </a>
				<a href="payment.php"><i class="fa fa-credit-card"><span class='icon-field'></i></span> Payment </a>
				<a href="contact.php"><i class="fa fa-phone-square"><span class='icon-field'></i></span> Contact </a>
				<a href="adminprofile.php"><i class="fa fa-user-md"><span class='icon-field'></i></span> Profile </a>
				<a href="logout.php"><i class="fa fa-power-off"><span class='icon-field'></i></span> Log Out </a>

	</ul>
</div>
<div class="out">
<div style="margin-left:200px;padding:40px 16px;height:100%;">
		<div class="c1">
			<div><a href="dashboard.php"><i class="fa fa-tachometer" style="font-size:36px;"></i><br>Dashboard</a></div>
			<div><a href="admin.php"><i class="fa fa-lock" style="font-size:36px"></i><br>Admin</a></div>
		</div>
		
		<div class="c2">
			<div><a href="customer.php"><i class="fa fa-user" aria-hidden="true"style='font-size:36px'></i><br>Customer</a></div>
			<div><a href="booking.php"><i class='fa fa-list' style='font-size:36px'></i><br>Booking</a></div>
			<div><a href="homestay.php"><i class='fa fa-home' style='font-size:36px'></i><br>Homestay</a></div>
			<div><a href="hometype.php"><i class='fa fa-cog' style='font-size:36px'></i><br>Home Type</a></div>
			<div><a href="payment.php"><i class='fa fa-credit-card' style='font-size:36px'></i><br>Payment</a></div>
			<div><a href="contact.php"><i class='fa fa-phone-square' style='font-size:36px'></i><br>Contact</a></div>
			<div><a href="adminprofile.php"><i class='fa fa-user-md' style='font-size:36px'></i><br>Profile</a></div>
			<div><a href="logout.php"><i class='fa fa-power-off' style='font-size:36px'></i><br>Log Out</a></div>
		</div>
		
</div>
</div>

</body>
</html>