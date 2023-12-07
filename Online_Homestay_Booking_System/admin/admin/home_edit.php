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
	answer=confirm("Are you sure you want to save this homestay?");
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
			$hid=$_GET["id"];
			$result= mysqli_query($connect, "SELECT *from home_details WHERE home_id='$hid'");
			$row = mysqli_fetch_assoc($result);
		}
		?>
		
		<h1>Editing Homstay:<?php echo $row['home_name']?></h1>

		<form name="addfrm" method="post" action="" enctype="multipart/form-data">

					<p>Home Name:<input type="text" name="homestay_name"value="<?php echo $row['home_name'];?>"required></p>
					
					<p>Home Type:<input type="text" name="htype"value="<?php echo $row['home_code'];?>"onkeypress="return onlyNumberKey(event)"required></p>

					
					<label for="room">Number of Rooms: </label>
					<select name="n_room" id="room">
					<option value="1"<?php if($row['num_of_room']=="1") echo "selected"; ?>>1</option>
					<option value="2"<?php if($row['num_of_room']=="2") echo "selected"; ?>>2</option>
					<option value="3"<?php if($row['num_of_room']=="3") echo "selected"; ?>>3</option>
					<option value="4"<?php if($row['num_of_room']=="4") echo "selected"; ?>>4</option>
					<option value="5"<?php if($row['num_of_room']=="5") echo "selected"; ?>>5</option>
					</select>
					<p>Price per night:<input type="text" name="price" value="<?php echo $row['price_per_night'];?>"onkeypress="return onlyNumberKey(event)" required></p>
					<p>Home Facilities :</p><p><textarea name="facility" id="textarea" rows="4" cols="50"required><?php echo $row['home_facilities'];?></textarea></p>
					<p>Home address:</p><p><textarea name="address" rows="4" cols="50"required><?php echo $row['home_address'];?></textarea></p></p>
					<p>Description:</p><p><textarea name="description" rows="4" cols="50"required><?php echo $row['description'];?></textarea></p></p>
					<div>
					<p>Image1:<input type="file" name="image1"></p>
					</div>
					<div>
					<p>Image2:<input type="file" name="image2"></p>
					</div>
					<div>
					<p>Image3:<input type="file" name="image3"></p>
					</div>
					<div>
					<p>Image4:<input type="file" name="image4"></p>
					</div>
					<button class="btn btn-sm btn-primary check_out"input type="submit" name="savebtn" value="Save" onclick=" return confirmation();">Save</button>
					<a href="homestay.php"><button class="btn btn-sm btn-primary check_out" type="button">Back</button></a>
		</form>

	</div>
	</div>
	</div>


</body>
</html>

<?php

if(isset($_POST['savebtn']))	
{

		$hname=$_POST["homestay_name"];
		$htype=$_POST["htype"];
		$price=$_POST["price"];
		$hfac=$_POST["facility"];
		$nroom=$_POST["n_room"];
		$address=$_POST["address"];
		$description=$_POST["description"];
		
		if($_FILES['image1']['name'] && $_FILES['image2']['name'] && $_FILES['image3']['name'] && $_FILES['image4']['name']!=null)
	{	
		$image1=$_FILES['image1']['name'];
		$image2=$_FILES['image2']['name'];
		$image3=$_FILES['image3']['name'];
		$image4=$_FILES['image4']['name'];
		$target1 = "../image/".basename($_FILES['image1']['name']);
		$target2 = "../image/".basename($_FILES['image2']['name']);
		$target3 = "../image/".basename($_FILES['image3']['name']);
		$target4 = "../image/".basename($_FILES['image4']['name']);	
		
		if($error!=1)
		{
		mysqli_query($connect, "UPDATE home_details SET home_name='$hname',home_code='$htype',price_per_night='$price',home_facilities='$hfac',num_of_room='$nroom',home_address='$address',description='$description',image1='$image1',image2='$image2',image3='$image3',image4='$image4' where home_id='$hid'");
		move_uploaded_file($_FILES['image1']['tmp_name'],$target1)and move_uploaded_file($_FILES['image2']['tmp_name'],$target2)and move_uploaded_file($_FILES['image3']['tmp_name'],$target3)and move_uploaded_file ($_FILES['image4']['tmp_name'],$target4);

		}
		else
		{
			print_r("Please try agian");
		}
	}
		else
		{
			mysqli_query($connect, "UPDATE home_details SET home_name='$hname',home_code='$htype',price_per_night='$price',home_facilities='$hfac',num_of_room='$nroom',home_address='$address',description='$description' where home_id='$hid'");
		}
?>	

		 <script>
		alert("Homestay updated!");
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

	