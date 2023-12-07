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
</head>
<body>

<?php include("menu.php"); ?>

<?php
if(isset($_GET["edit"]))
{
	$aid=$_GET["id"];

	$result=mysqli_query($connect,"SELECT * FROM admin where admin_id='$aid'");
	
	$row=mysqli_fetch_assoc($result);
}
?>

	<div style="margin-left:180px;padding:0px 20px;height:100%; margin-right:-30px;">
	<div class="out" >
	<div class="right">

	<h1>Update Profile Details</h1>
	
	<form name="updatefrm" method="post" action="">

		
		<p><b>Email: </b><input type="email" name="email" value="<?php echo $row['admin_email']; ?>"disabled></p>
		<p><b>Password: </b><input id="password" type="password" name="opassword" value="<?php echo $row['admin_pass']; ?>"disabled></p>
		<input style="margin-left:100px; width: 200px;height: 120px;margin-bottom: 20px;" type="checkbox" onclick="Toggle()"><b> Show Password</b><br>
		
		<p><b>New Password: </b><input id="npassword" type="password" name="password"></p>
		<input style="margin-left:100px; width: 200px;height: 120px;margin-bottom: 20px;" type="checkbox" onclick="toggle()"><b> Show Password</b><br>
		
		<p><b>Phone number: </b><input type="tel" pattern="[0-9]{3}-[0-9]{7}" name="phone"value="<?php echo $row['admin_contact_number'];?>"required></p>
		
		<button class="btn btn-sm btn-primary check_out" input type="submit" name="savebtn" value="Update Detail !"onclick=" return confirmation();">Update Details!</button>
		<a href="adminprofile.php"><button class="btn btn-sm btn-primary check_out" type="button">Back</button></a>
	</form>
</div>
</div>
</div>
</body>
</html>

<?php

if(isset($_POST["savebtn"]))
{
	
	$adminpassword = $_POST["password"];
	$adminphonenumber=$_POST["phone"];

	if(strlen($adminpassword)!=0)
	{
		$sql1="UPDATE admin SET admin_pass='$adminpassword',admin_contact_number='$adminphonenumber'  WHERE admin_id='$aid';";
	}
	else{
		$sql1="UPDATE admin SET admin_contact_number='$adminphonenumber' WHERE admin_id='$aid';";	
	}
	if(mysqli_query($connect,$sql1))
	{
		$_SESSION['id'] = $aid;
	?>
	<script type="text/javascript">
	alert("Save Successfully !");
	</script> 
	<?php
	header("refresh:0.5; url=adminprofile.php");
	}
}
?>
<script>
function confirmation()
{
	var answer;
	answer=confirm("Are you sure you want save your profile details?");
	return answer;
}
</script>

<script> 
        function Toggle() { 
            var temp = document.getElementById("password"); 
            if (temp.type === "password") { 
                temp.type = "text"; 
            } 
            else { 
                temp.type = "password"; 
            } 
        } 
	</script> 
	<script> 
        function toggle() { 
            var temp = document.getElementById("npassword"); 
            if (temp.type === "password") { 
                temp.type = "text"; 
            } 
            else { 
                temp.type = "password"; 
            } 
        } 
	</script>