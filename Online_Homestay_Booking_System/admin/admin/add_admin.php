<?php include("menu.php");?>
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
	answer=confirm("Are you sure you want add a new Admin?");
	return answer;
}
</script>	
<html>
</body>
<div style="margin-left:180px;padding:0px 20px;height:100%; margin-right:-30px;">
		<div class="out" >
			<div class="up">
				<ul>
					<li><a href="admin.php"><b>Admin List</b></a></li>
					<li class="atv"><a href="add_admin.php">Add Admin</a></li>
				</ul>
			</div>
			<div class="right">
				<h1>Add New Admin</h1>
				
				<form name="add" method="post" action="" onsubmit="return validation();">
					<p><b>Admin name: </b><input type="text" name="name" minlength="5"required></p>
					<p><b>Admin Email: </b><input type="email" name="email"required></p>
					<p><b>Admin Password: </b><input type="password" id="password"name="password"required></p>
					<p><b>Admin phone number: </b><input type="tel" pattern="[0-9]{3}-[0-9]{7}" name="phone" maxlength="12"required></p>

					
					<button class="btn btn-sm btn-primary check_out" input type="submit" name="savebtn" value="Add" onclick="return confirmation();">Save</button>
					<button class="btn btn-sm btn-primary check_out" input type="button" value="View" onclick="location='admin.php'">View</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>

<?php
	if (isset($_POST["savebtn"]))
	{
		$aid=$_POST["adminid"];
		$aname=$_POST["name"];
		$aemail=$_POST["email"];
		$pass=$_POST["password"];
		$aphone=$_POST["phone"];
		
		$result = mysqli_query($connect,"SELECT * FROM admin where  admin_email = '$aemail'" );
		$count=mysqli_num_rows($result);
		
		if ($count != 0)
	{
	?>
		<script>
			alert("Please try again");
		</script>
	<?php
	}
	else
	{
	
		mysqli_query($connect,"INSERT INTO admin(admin_id,admin_name,admin_email,admin_pass,admin_contact_number)VALUES('$aid','$aname','$aemail','$pass','$aphone')");
	
		?>
		<script>
			alert('Record Saved!');
		</script>
		
	<?php
	}
		header("refresh:0.5; url=admin.php");	

}	
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<script> 
    function validation() { 
        var name = document.add.name.value; 
        var email = document.add.email; 
        var phone = document.add.phone.value;  
  var password = document.add.password.value;
  
  if ((password.length < 5) || (password.length > 15))
  {
   window.alert("Your Password must be between 5 to 20 Character.");
   document.add.password.select();
   return false;
  }
  
  if (password.search(/[0-9]/) < 0)
        {
         window.alert("Your password must contain at least one digit.");
         document.add.password.select();
        return false;
        }
  
  if (password.search(/[a-z]/i) < 0)
        {
         window.alert("Your password must contain at least one letter.");
         document.add.password.select();
        return false;
        }
  
        return true; 
    } 
</script>