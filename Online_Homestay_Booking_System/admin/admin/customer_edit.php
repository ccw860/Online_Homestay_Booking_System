<html>
<script>
function confirmation()
{
	var answer;
	answer=confirm("Are you sure you want to save your profile details?");
	return answer;
}
</script>
<head>
<style>
.right{
 margin-left:10px;
 margin-top:0px;
    width: 200px;
    height: 120px;	
}
</style>
</head>
<body>
		<?php include("menu.php"); ?>
		<div style="margin-left:180px;padding:0px 20px;height:100%; margin-right:-30px;">
		<div class="out" >
		<div class="right">

		<?php
		if(isset($_GET["edit"]))
		{
			$cid=$_GET["id"];
			$result= mysqli_query($connect, "SELECT *from customer WHERE cus_id='$cid'");
			$row = mysqli_fetch_assoc($result);
		}
			
		?>
		
		<h1>Editing Customer:<?php echo $row['cus_name'];?> </h1>

		<form name="addfrm" method="post" action="">

		<p><b>Name: </b><input type="text" name="name" minlength="5"value="<?php echo $row['cus_name']; ?>"required></p>
		<p><b>Phone number: </b><input type="tel" name="phone"pattern="[0-9]{3}-[0-9]{7}" value="<?php echo $row['cus_contact_num'];?>"required></p>
		<p><b>Email: </b><input type="email" name="email" value="<?php echo $row['cus_email']; ?>"disabled></p>
		<p><b>Password: </b><input type="password" name="pass" value="<?php echo $row['cus_pass']; ?>"required></p>
		
		
		<button class="btn btn-sm btn-primary check_out"input type="submit" name="savebtn" value="Save"onclick=" return confirmation();">Save</button>
		<a href="customer.php"><button class="btn btn-sm btn-primary check_out" type="button">Back</button></a>

		</form>
	</div>
	</div>
	</div>
	



</body>
</html>

<?php


if(isset($_POST['savebtn']))	
{
	$cname = $_POST["name"];
	$cphone=$_POST["phone"];
	$cpassword = $_POST["pass"];

	mysqli_query($connect,"UPDATE customer SET cus_name='$cname',cus_contact_num='$cphone',cus_pass='$cpassword' WHERE cus_id='$cid'");
	?>	
		 <script>
		alert("Customer updated!");
		</script>
<?php
	header("refresh:0.5; url=customer.php");	
}
?>
	