<html>
<head>
	<?php
		include "model/connection.inc.php";
		include "controller/curdBill.inc.php";
		include "view/view.inc.php";
		$view_bills= new viewBill;
		session_start();
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
			    <li class="breadcrumb-item active" aria-current="page">New Bill</li>
			  </ol>
			</nav>

	
		<div id="main_page">

		
			<div id="right_body">
				
				<?php include "billCreateNew.php"?>
				<br>
				<input type="button" value="Finish" onclick="submitInputedData()">	&nbsp
					 
			</div>
			<div id="feedBack">
			</div>

		</div>
</body>
</html>