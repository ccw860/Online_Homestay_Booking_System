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
	answer=confirm("Are you sure you want add a new Hometype?");
	return answer;
}
</script>	
<html>
</body>
<div style="margin-left:180px;padding:0px 20px;height:100%; margin-right:-30px;">
		<div class="out" >
			<div class="up">
				<ul>
					<li><a href="hometype.php"><b>Hometype List</b></a></li>
					<li class="atv"><a href="add_admin.php">Add Hometype</a></li>
				</ul>
			</div>
			<div class="right">
				<h1>Add New Hometype</h1>
				
				<form name="add" method="post" action="">
					<p><b>Home State :</b><input type="text" name="state"required></p>


					
					<button class="btn btn-sm btn-primary check_out" input type="submit" name="savebtn" value="Add" onclick="return confirmation();">Save</button>
					<button class="btn btn-sm btn-primary check_out" input type="button" value="View" onclick="location='hometype.php'">View</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>

<?php
	if (isset($_POST["savebtn"]))
	{
		$hcode=$_POST["code"];
		$hstate=$_POST["state"];

		$result = mysqli_query($connect,"SELECT * FROM home_type where  home_code = '$hcode'" );
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
	
		mysqli_query($connect,"INSERT INTO home_type(home_code,home_state)VALUES('$hcode','$hstate')");
	
		?>
		<script>
			alert('Record Saved!');
		</script>
		
	<?php
	}
		header("refresh:0.5; url=hometype.php");	

}	
?>
