<?php
	include "model/connection.inc.php";
	include "controller/curdBill.inc.php";
	include "view/view.inc.php";

	$view_bills= new viewBill;
	session_start();


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
     <script>
     	function validate()
     	{
     		var batchname=document.getElementById('batchname').value;     		
     		if(batchname =="0"	)
     		{
     			alert("Please select a Batch Name");
     			return false;
     		}
     		else 
     			return true;


     	}

     </script>
	</head>
	<body>
		<?php include "header.php"; ?>		
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="home.php">Home</a></li>	
		     
		    <li class="breadcrumb-item active" aria-current="page">Edit</li>
		  </ol>
		</nav>	
		<div class="col-sm-3">
			<form action="edithomepageredirect.php" method="post">
				<select id="batchname" name="batch_name" class="custom-select custom-select-sm mb-3">
					<option selected value="0" >--Select Batch Name--</option>
					<?php  $view_bills->getFuelBatchID();?>
				</select>
				<input type="submit" value="Search" onclick="return validate()" />
			</form>
		</div>

	</body>
</html>