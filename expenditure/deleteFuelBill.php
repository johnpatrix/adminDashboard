<?php
	include "model/connection.inc.php";
	include "controller/curdBill.inc.php";
	include "view/view.inc.php";

	$view_bills= new viewBill;
	session_start();

	if(isset($_POST['submit'])){
		echo "<script type='text/javascript'> alert('".$_POST['billType_name']."');</script>";
		if(isset($_POST['batch_name']) && isset($_POST['billType_name']) ){
			$selected_batchid=$_POST['batch_name'];
			$selected_billName=$_POST['billType_name'];			
			if($selected_batchid !="0" && $selected_billName!=0){

				$returnData=$view_bills->deleteFuelBill($selected_batchid,$selected_billName);	
			echo "<script type='text/javascript'> alert('".$returnData."');</script>";
			}
			else
				echo "<script type='text/javascript'> alert(' You have not selected on or more options!');</script>";

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
		    <li class="breadcrumb-item"><a href="../home.php">Home</a></li>		   
		    <li class="breadcrumb-item active" aria-current="page">Delete Bill</li>
		  </ol>
		</nav>	
		<div class="col-sm-3">
			Select the Batch Name:
			<form action="deleteFuelBill.php" method="post">
			<select name="batch_name" class="custom-select custom-select-sm mb-3">
				<option selected value='0' >--Select Batch Name--</option>
				<?php  $view_bills->getFuelBatchID();   ?>
			</select>
		
		</div>

		<script>

				$('select[name="batch_name"]').change(function()
				{

				   var batchid= $(this).val();
				   if(batchid !="--Select Batch Name--"){
						$.post( "billtypebybatchid.php", {'batch_id':batchid},function(data){
												var div = document.getElementById('select_billType');
												$('#select_billType').show(299);
												$('#bill_Type_name').empty();
												//$('#submiting').attr("disabled", false);
													//div.innerHTML ="Bill Type Name: <br>"+data;
													$('#bill_Type_name').append(data);
												;});		   	
				   }
				   else {
				   	var div = document.getElementById('select_billType');
						div.innerHTML ="";

				   		alert(" Select the Batch Name");				   
				   }
				   				             
				});

				
				function enableSubmit(e)
				{
					if(e.value !=0)
					document.getElementById("submitting").disabled = false;
					else
						alert("Select the Bill type");
				}




			</script>				
						<div id="select_billType" class="col-sm-3" style="display: none;">
							Bill type:
							<select id='bill_Type_name' name='billType_name' class='custom-select custom-select-sm mb-3' onchange="enableSubmit(this)">
							</select>							
						</div>
			<input id="submitting" type='submit' name='submit' disabled="true" onclick="return confirm('Are you sure you want to delete this item?');" value='Delete'/>
				
			</form>
	</body>
</html>