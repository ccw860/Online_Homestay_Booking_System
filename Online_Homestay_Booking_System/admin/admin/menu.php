<?php include("dataconnection.php"); ?>
<?php
		session_start();
ob_start();
		?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<html>
<head>
<title>Rainbow Homestay Booking System</title>
<script src="https://kit.fontawesome.com/e7979f68b5.js"></script>
<link rel="stylesheet" type="text/css" href="design.css?v=<?php echo time();?>">
<link rel="stylesheet" type="text/css" href="styles.css">


<style>
body{overflow:scroll;}

.out{
background-color:#c1cbd7;
height:100%}

.up ul{
background-size:50%;
height:50px;
background-color:#8696a7;
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
height:5px;
font-weight: bold;
}

.up .atv a{color:black;}

div a:hover{color:#6c757d;}

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
	
.container-fluid p{
	margin: unset
}

#uni_modal .modal-footer{
	display: none;
	}

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

</body>
</html>