<?php include("dataconnection.php");
	session_start();
	ob_start();
	?>

<!DOCTYPE html>
<html>
<head>
<title> Payment Form </title>
<link rel="icon" href="image/905.png">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body{
     background-color:whitesmoke;    
    }

h2{text-align:center;
   color:#B3B3B3;}
   
td{font-weight:bold;
   }

.payment img{width:30px;
       height:30px;
	  }

.payment{border:1px solid grey;
   background-color:white;
   color:black;
   border-radius:10px;
   padding:10px 10px;
   width:600px;
   height:600px;
   margin:auto;
  }

.payment table{margin:auto;
              }

.payment input[type=button]{float:left;
                                  }
</style>
</head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">

<body>
<?php
		if(isset($_GET["checkout"]))
		{
			$bid=$_GET["id"];
			$result= mysqli_query($connect, "SELECT *from booking_details WHERE id='$bid'");
			$row = mysqli_fetch_assoc($result);
			
		}
			
		?>
<p><br><h2>Payment Form</h2></p>
<div class="payment">
	<form name="paymentform" method="post" action="">
		<table>
			<tr>
				<td>Name:</td>

			</tr>
			<tr>
				<td><input type="text" name="cname" value="<?php echo $row['name'];?>"></td>
			</tr>
						<tr>
				<td>Payment Type:</td>
			</tr>
			<tr>
				<td><select name="ptype">
						<option>Card</option>
						<option value="visa" checked>Visa</option>
						<option value="Master" checked>Master Card</option>
					</select></td>
				<td><img src="images/visa.png"><img src="images/mastercard.png"></td>
			</tr>
			
			
			<tr>
				<td>Card Number</td>
			<tr>
			<tr>
				<td><input type="text" name="cardnum" placeholder="0000-0000-0000-0000" onkeypress="return onlyNumberKey(event)" maxlength="19" required placeholder="---- ---- ---- ----"   onkeyup="cardtype()"onkeypress="inputnumber(event)" onkeydown="this.value=this.value.replace(/(\d{4})(?=\d)/,'$1 ')"required></td>
			</tr>
			
			<tr>
				<td>Expire Date:</td>
				<td>Security Code:</td>
			</tr>
			<tr>
				<td><input type="Month" name="date"></td>
				<td><input type="password" name="scode" min="001" max="999" placeholder="000" maxlength="3"  minlength="3" onkeypress="return onlyNumberKey(event)"required></td>
			</tr>
			<script> 
    function onlyNumberKey(evt) { 
          
        // Only ASCII charactar in that range allowed 
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
            return false; 
        return true; 
    } 
</script>  
			<tr>
				<td>Total Payment:</td>

			</tr>
	<tr>
				<td><input type="text" name="totalpayment" placeholder=""value="<?php echo $row['total_payment'];?>"readonly></td>
			</tr>
			<tr>
				<td><input type="submit" name="submitbtn" value="submit"></td>
				
			</tr>
			
		</table>	
	</form>	
</div>


<?php
if(isset($_POST['submitbtn']))
{
	$status="Paid";
	mysqli_query($connect,"update booking_details set status='$status' where id='$bid'");
	

	$cname=$_POST["cname"];
	$paytype=$_POST["ptype"];
	$tpayment=$_POST["totalpayment"];
	$count=mysqli_num_rows($result);
		
	mysqli_query($connect,"insert into payment(book_id,cus_name,payment_type,total_payment)VALUES('$bid','$cname','$paytype','$tpayment')");
	?>
	
	<script>
	alert("Payment Successfully");
	</script>
	<?php
	header("refresh:0.5; url=history.php");
}

?>
<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
  <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
  <a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram w3-hover-opacity"></i></a>
  <a href="https://www.pinterest.com/" target="_blank"><i class="fa fa-pinterest-p w3-hover-opacity"></i></a>
  <a href="https://twitter.com/home" target="_blank"><i class="fa fa-twitter w3-hover-opacity"></i></a>
</footer> 
</body>
</html>