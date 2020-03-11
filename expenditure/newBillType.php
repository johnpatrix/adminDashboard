<html>
<head>
	<?php
		include "model/connection.inc.php";
		include "controller/curdBill.inc.php";
		include "view/view.inc.php";
		session_start();
		$view_bills= new viewBill;
		$result=0;
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$billtypename=trim($_POST['newBillType']);
			if(isset($_POST['newBillType']))
			{
				if($billtypename!= '')
				{
					$returnData=$view_bills->insertBillType($billtypename);
					echo "<script type='text/javascript'> alert('".$returnData."');</script>";
				}

			}

		}

	?>

		
</head>    
<body>		
		<link rel="stylesheet" href="css/mainPage.css">
		<link rel="stylesheet" href="css/jquery-ui.min.css">
		 <script src= "js/jquery-3.4.1.min.js"></script> 
   		 <script src= "js/jspdf.min.js"> </script>
    	<script src= "js/generatePDF.js"> </script>
    	 <script src= "js/jquery-ui.min.js"> </script>

		<?php include "header.php" ?>
	<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="../home.php">Home</a></li>		   
		    <li class="breadcrumb-item active" aria-current="page">New Bill Type</li>
		  </ol>
		</nav>	
		<div id="main_page">		
			<div id="right_body">
				<form  method="POST" action="newBillType.php">
				<div><label>Enter a new Bill Type &nbsp </label><input name="newBillType" type="text" id="Batch_id"></input></div>
				<input type="submit" value="submit"/>
				</form>
					 
			</div>
			<div id="feedBack">
			</div>

		</div>
</body>
</html>