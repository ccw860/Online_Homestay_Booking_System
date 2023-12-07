<?php include("menu.php")?>

<script>
function confirmation()
{
	var answer;
	answer=confirm("Are you sure you want to add this homestay?");
	return answer;
}
</script>
<style>


.right{
 margin-left:10px;
 margin-top:0px;
    width: 200px;
    height: 120px;	
}
</style>
<html>
<body>
<div style="margin-left:180px;padding:0px 20px;height:100%; margin-right:-30px;">
		<div class="out" >
			<div class="up">
				<ul>
					<li><a href="homestay.php">Homestay List</a></li>
					<li class="atv"><a href="addhomestay.php">Add Homestay</a></li>
				</ul>
			</div>
			<div class="right">
				<h1>Add New Homestay</h1>
				
				<form name="add" method="post" action="" enctype="multipart/form-data">
					
					<p>Home Name:<input type="text" name="home_name"required></p>
					
					<p>Home Type: <input type="text" name="htype" onkeypress="return onlyNumberKey(event)"required></p>
					
					<label for="room">Number of Rooms: </label>
					<select name="n_room" id="room">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					</select>
					
					<p>Home Facilities :</p><p><textarea name="facility" id="textarea" rows="3" cols="50"required></textarea></p>
					
					<p>Price per night:<input type="text" name="price"  onkeypress="return onlyNumberKey(event)"required></p>

					<p>Home address:</p><p><textarea name="address" rows="3" cols="50"required></textarea></p></p>
					
					<p>Description :</p><p><textarea name="description" id="textarea" rows="3" cols="50"required></textarea></p>
					
					<div>
					Image:<input type="file" name="image1"required>
					</div>
					<div>
					Image:<input type="file" name="image2"required>
					</div>
					<div>
					Image:<input type="file" name="image3"required>
					</div>
					<div>
					Image:<input type="file" name="image4"required>
					</div>

					<button class="btn btn-sm btn-primary check_out" input type="submit" name="savebtn" value="Add"onclick=" return confirmation();">Add</button>
					<button class="btn btn-sm btn-primary check_out" input type="button" value="View" onclick="location='homestay.php'">View</button>

				</form>
				
			</div>
		</div>
	</div>
</body>
</html>
<?php
	if (isset($_POST["savebtn"]))
	{
		//path to store image
		$target1 = "../image/".basename($_FILES['image1']['name']);
		$target2 = "../image/".basename($_FILES['image2']['name']);
		$target3 = "../image/".basename($_FILES['image3']['name']);
		$target4 = "../image/".basename($_FILES['image4']['name']);
		
		$db = mysqli_connect("localhost","root","","homestay_online_booking_system");
		
		$hid=$_POST["home_id"];
		$hname=$_POST["home_name"];
		$htype=$_POST["htype"];
		$price=$_POST["price"];
		$hfac=$_POST["facility"];
		$nroom=$_POST["n_room"];
		$address=$_POST["address"];
		$description=$_POST["description"];
		$image1=$_FILES['image1']['name'];
		$image2=$_FILES['image2']['name'];
		$image3=$_FILES['image3']['name'];
		$image4=$_FILES['image4']['name'];
		
		$sql="INSERT INTO home_details(home_name,home_code,price_per_night,home_facilities,num_of_room,home_address,description,image1,image2,image3,image4) VALUES('$hname','$htype','$price','$hfac','$nroom','$address','$description','$image1','$image2','$image3','$image4')";
		mysqli_query($db, $sql);
		
		if(move_uploaded_file($_FILES['image1']['tmp_name'],$target1)and move_uploaded_file($_FILES['image2']['tmp_name'],$target2)and move_uploaded_file($_FILES['image3']['tmp_name'],$target3)and move_uploaded_file ($_FILES['image4']['tmp_name'],$target4))
		{
			$msg="Image upload successfully.";
		}
		else
		{
			$msg="There was a problem uploading image";
		}
		?>
		<script>
		alert("Homestay successfully added!");
		window.location="homestay.php";
		</script>
	<?php
	}		
?>
<script>
    function onlyNumberKey(evt) { 
          
        // Only ASCII charactar in that range allowed 
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
            return false; 
        return true; 
    } 
</script>  
