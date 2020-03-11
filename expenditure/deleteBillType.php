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
			$billtypename=trim($_POST['billType_name']);
			if(isset($_POST['billType_name']))
			{
				if($billtypename!= 0)
				{
					$selected_billid=$_POST['billType_name'];
					$returnData=$view_bills->deleteBillType($selected_billid);	
					echo "<script type='text/javascript'> alert('".$returnData."');</script>";					
				}
				else
					echo "<script type='text/javascript'> $.alert('Please select the Bill Type!','ERROR');</script>";	


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
		    <li class="breadcrumb-item active" aria-current="page">Delete Bill Type</li>
		  </ol>
		</nav>	
		<div id="main_page">		
			<div id="right_body" class="col-sm-3">
				
					<form action="deleteBillType.php" method="post">
						<div >
						<select name="billType_name" class="custom-select custom-select-sm mb-3" onchange="validating(this)">
							<option selected value=0>--Select Bill Type Name--</option>
							<?php  
								$data=$view_bills->getBillTypeData(0); 
								foreach ($data as $key) {
									echo "<option value='".$key['Bill_id']."' >".$key['Bill_Type_Name']."</option>";
								}
							  ?>
						</select><br>
					
					<input id="submitting" type="submit" name="submit" onclick="return confirm('Are you sure you want to delete this item?');" value="Delete" disabled="true"/>
				</div>
					</form>								 
			</div>
			<div id="feedBack">
			</div>

		</div>
</body>
</html>
<script type="text/javascript">
	
function validating(e)
{
	if(e.value !=0)
		document.getElementById("submitting").disabled = false;
	else{

		document.getElementById("submitting").disabled = true;
		alert('Please select the Bill Type!');
	}

}

</script>