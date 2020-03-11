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
	</head>
	<body>
		<?php include "header.php"; ?>	
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="../home.php">Home</a></li>		   
		    <li class="breadcrumb-item active" aria-current="page">Edit</li>
		  </ol>
		</nav>		
		<div class="col-sm-3">
			<form action="edithomepageredirect.php" method="post">
				Select the Batch Name: 
			<select name="batch_name" class="custom-select custom-select-sm mb-3" >
				<option >--Select Batch Name--</option>
				<?php  $view_bills->getFuelBatchID();   ?>
			</select>

			<script>

				$('select[name="batch_name"]').change(function()
				{

				   var batchid= $(this).val();
				   if(batchid !="--Select Batch Name--"){
						$.post( "billtypebybatchid.php", {'batch_id':batchid},function(data){

											var div = document.getElementById('select_billType');
												$('#select_billType').show(299);
												//$('#submiting').attr("disabled", false);
													//div.innerHTML ="Bill Type Name: <br>"+data;
													$('#bill_Type_name').empty();
													$('#bill_Type_name').append(data);


												//var div = document.getElementById('select_billType');
												//	div.innerHTML ="Bill Type Name: <br>"+data;	
												//	div.innerHTML+="<input type='submit' value='Search'/>";
												;});		   	
				   }
				   else {
				   	var div = document.getElementById('select_billType');
						$('#select_billType').hide(299);

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

			<div>
					
						<div id="select_billType" style="display: none;">
							Bill type:
							<select id='bill_Type_name' name='billType_name' class='custom-select custom-select-sm mb-3' onchange="enableSubmit(this)">
							</select>	
							<input id="submitting" type='submit' name='submit' disabled="true"  value='Search'/>						
						</div>
		</div>

			
			</form>
		</div>

	</body>
</html>