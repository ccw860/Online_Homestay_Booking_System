<html>
<head>
<style>
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
	answer=confirm("Are you sure you want to save your profile?");
	return answer;
}
</script>	
</head>
<body>
		<?php include("menu.php"); ?>
		<div style="margin-left:180px;padding:0px 20px;height:100%; margin-right:-30px;">
		<div class="out" >
		<div class="right">
		<?php
		if(isset($_GET["edit"]))
		{
			$aid=$_GET["id"];
			$result= mysqli_query($connect, "SELECT *from admin WHERE admin_id='$aid'");
			$row = mysqli_fetch_assoc($result);
		}
			
		?>
			<h1>Editing Admin:<?php echo $row['admin_name']?> </h1>

			<form name="addfrm" method="post" action="">

			<p><b>ID: </b><input type="text" name="id" value="<?php echo $row['admin_id']; ?>" disabled></p>
			<p><b>Name: </b><input type="text" name="name" minlength="5"value="<?php echo $row['admin_name']; ?>"required></p>
			<p><b>Email: </b><input type="text" name="email" value="<?php echo $row['admin_email']; ?>"disabled></p>
			<p><b>Password: </b><input type="text" name="pass" value="<?php echo $row['admin_pass']; ?>"disabled></p>
			<p><b>Phone number: </b><input type="tel"pattern="[0-9]{3}-[0-9]{7}"placeholder="000-0000000" name="phone"value="<?php echo $row['admin_contact_number'];?>"required></p>
		
			<button class="btn btn-sm btn-primary check_out" input type="submit" name="savebtn" value="Save" onclick="return confirmation();">Save</button>
			<a href="admin.php"><button class="btn btn-sm btn-primary check_out" type="button">Back</button></a>

			</form>
	   
	</div>
	</div>
	</div>
</body>
</html>

<?php


if(isset($_POST['savebtn']))	
{
	$adminname = $_POST["name"];
	$adminphonenumber=$_POST["phone"];

	mysqli_query($connect,"UPDATE admin SET admin_name='$adminname',admin_contact_number='$adminphonenumber' WHERE admin_id='$aid'");
	?>	
		 <script>
		alert("Admin updated!");
		</script>
<?php
	header("refresh:0.5; url=admin.php");	
}
?>
	