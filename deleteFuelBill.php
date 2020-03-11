<?php
	include "model/connection.inc.php";
	include "controller/curdBill.inc.php";
	include "view/view.inc.php";

	$view_bills= new viewBill;
	session_start();

	if(isset($_POST['submit'])){
		if(isset($_POST['batch_name'])){

			$selected_batchid=$_POST['batch_name'];
			$returnData=$view_bills->deleteFuelBill($selected_batchid);	
			echo "<script type='text/javascript'> alert('".$returnData."');</script>";
		}
	}


?>
<html>
	<head>
		<title>NIC NAGALAND</title>
		<link rel="stylesheet" href="css/mainPage.css">
		<link rel="stylesheet" href="css/jquery-ui.min.css">
		 <script src= "js/jquery-3.4.1.min.js"></script> 
    <script src= "js/jspdf.min.js"> </script>
    <script src= "js/generatePDF.js"> </script>
     <script src= "js/jquery-ui.min.js"> </script>
	</head>
	<body>
		<?php include "header.php"; ?>	
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="home.php">Home</a></li>	
		     		   
		    <li class="breadcrumb-item active" aria-current="page">Delete Fuel Bill</li>
		  </ol>
		</nav>		
		<div class="col-sm-3">
			<form action="deleteFuelBill.php" method="post">
			<select name="batch_name" class="custom-select custom-select-sm mb-3">
				<option selected >--Select Batch Name--</option>
				<?php  $view_bills->getFuelBatchID();   ?>
			</select>
			<input type="submit" name="submit" onclick="return confirm('Are you sure you want to delete this item?');" value="Delete"/>
			</form>
		</div>

	</body>
</html>