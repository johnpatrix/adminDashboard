<?php
	include "model/connection.inc.php";
	include "controller/curdBill.inc.php";
	include "view/view.inc.php";

	$view_bills= new viewBill;
	session_start();
	$userData=$_SESSION["user_data"];

	
?>
<html>
	<head>
		<title>NIC ADMINISTRATION</title>
		<link rel="stylesheet" href="css/mainPage.css">
		<link rel="stylesheet" href="css/jquery-ui.min.css">
		 <script src= "js/jquery-3.4.1.min.js"> 		 	 
    </script> 
    <script src= "js/jspdf.min.js"> </script>
    <script src= "js/generatePDF.js"> </script>
     <script src= "js/jquery-ui.min.js"> </script>
    <script src="js/gridLayout.js"></script>
    <script src="js/editFuelBill.js"></script>

	</head>
	<body>
		<div id="main_page">
		<?php include "header.php"; ?>	
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="home.php">Home</a></li>		        
		    <li class="breadcrumb-item active" aria-current="page">Edit Fuel Bill</li>
		  </ol>
		</nav>		
			<div id="right_body">				
				<div>	
					<div>
					Batch ID: 
						<?php echo "<input type='Text'id='Batch_id' value='".$_SESSION["batchId"]."'/>";?>
					</div>
					<br><br>
					<?php

if(isset($_GET['dirty']))
			{
				if($_GET['dirty']==1)
				{
					echo "<script>  dirtyBit=1;	 </script> ";
				}
			}
?>


					

					<div id="gridView_div"> 
						<?php 
							$view_bills->getExpenditureTableHeader();
						?>
						
						<?php
							$rows=0;
							
							foreach($userData as $row){								
								 $col=0;
								echo "<div>";
								foreach($row as $key)
								{
									$id_no="row_".$rows."_col_".($col-1);
									if($col== 0);//this is to ignore the batch_id value

									if($col ==1)
									echo "<input type='text' size='5' value='".$key."'"." id='".$id_no."'/>";
									if($col ==2)
										echo "<input type='text' value='".$key."'"." id='".$id_no."'/>";
									if($col ==4)
										echo "<input type='text' value='".$key."'"." id='".$id_no."'/>";

									if($col==3){
											echo "<input type='text' class='datepicker' autocomplete='off' onfocus=\"$(this).datepicker({ dateFormat: 'dd-mm-yy', onSelect: function (){this.focus();}});$(this).datepicker('show');\" value='".$key."'"." id='".$id_no."'/>";
										}
										if($col>4 && $col<7){

											echo "<input type='text' onchange='calculateAmount(".$rows.",5)' value='".$key."'"." id='".$id_no."'/>";										
										}
										if($col ==7){
											echo "<input type='text' class='end_text' value='".$key."'"." id='".$id_no."'/>";
										}									
										
									$col++;
								}								
								echo "<span class='alert-close'> X</span></div>";
								$rows++;
								}
						?>
					</div>	
				</div>

<script>
window.row_id= <?php echo ($rows)?>;
window.no_cells=7;

</script>

				<br>
				<input id="editFinished" type="button" value="Finish" onclick="submitInputedData()">	&nbsp
				<!--<input type="button" value="Print Preview" onclick="genPDF()"> -->		 
			</div>
			<div id="feedBack">
			</div>

		</div>
	</body>
</html>