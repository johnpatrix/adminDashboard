<?php
	include "numberToWords.php";
	session_start();
	$userData=$_SESSION["user_data"];
	$grand_total=0.00;
?>
<html>
	<head>
		<link rel="stylesheet" href="css/tableReport.css">
		 <script src= "js/jquery-3.4.1.min.js"> </script>
		<script src= "js/jspdf.min.js"> </script>  
		<script src= "js/numWords.js"> </script>   	
	</head>
	<body>

		<?php include "header.php"; ?>
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="../home.php">Home</a></li>
		    <li class="breadcrumb-item"><a href="newbill.php">New Bill</a></li>
		    <li class="breadcrumb-item active" aria-current="page">Preview</li>
		  </ol>
		</nav>
		
		<div id="batchId"> 
			<?php echo "<lable>Batch Id: </lable> <lable id='Batch_id'> ".$_SESSION["batchId"]."</lable>";?>
		</div>
		<div id="bill_type_name"> 
			<?php echo "<lable>Bill Type: </lable> <lable id='Batch_id'> ".$_SESSION["bill_type_name"]."</lable>";?>
		</div>
		<div id="table_report">
			
			<table style="width:100%;">
				<tr><td>Sl.No </td><td>Bill No</td><td>Date</td><td>Particulars</td><td>Qty</td><td>Rate</td><td>Total Amount </td></tr>

				<?php
					$temp=0;
					$bill_type="";
					foreach($userData as $row){
						 $count= true;
						$last_counter=0;
						echo "<tr>";
						foreach($row as $key){
							
							
							if($count!= true) //if it is not the first data, since first data consist of 
							{
								if($last_counter < 8) //this will read only up to last second data, because last data is Bill type information
								{	echo "<td>".$key."</td>";
									$temp=$key;
								}

							}							

							else
								$count=false;

							$last_counter++;
						}						
						echo "</tr>";
						 $grand_total+=(float)$temp;
					}
					

				?>

			</table>
		</div>
		<div style="float: right">
			<?php
				echo "Grand Total :Rs".round($grand_total,2);
				$_SESSION["grand_total"]=round($grand_total,2);
			?>
		</div>
		<div id="number_words">
			<br/>
			<center> <?php  
			$numbers_in_words="Rupees ".getIndianCurrency($grand_total);
			$_SESSION["grand_total_words"]=$numbers_in_words;


			echo "<b>(" .$numbers_in_words.")</b>";   ?> </center>
		</div>
		<div id="controls">
			<input type="button" value="Download Pdf" onclick="javascript:window.open('pdf/generatePDF.php','_blank');">&nbsp
			<!--<input type="button" value="Download Pdf" onclick="javascript:window.location.href='pdf/generatePDF.php';">	&nbsp -->
			<?php
			if(isset($_GET['dirty']))
			{
				if($_GET['dirty']==1)
				{
					echo "<input type=\"button\" value=\"Edit \" onclick=\"javascript:window.location.href='editFuelBill.php?dirty=1';\"> &nbsp";
				}
			}
			else
				echo "<input type=\"button\" value=\"Edit \" onclick=\"javascript:window.location.href='editFuelBill.php';\"> &nbsp";
			
			
				if(isset($_GET['success']))
				{
					if($_GET['success']=='done')
					{
						echo "<input id=\"saveDB\" type=\"button\" value=\"Save to Database\" disabled  onclick=\"javascript:window.location.href='insertDB.php';\">";
					}
				}
				else
				{
					echo "<input id=\"saveDB\" type=\"button\" value=\"Save to Database\" onclick=\"javascript:window.location.href='insertDB.php';\">";
				}

				
			?>

		</div>
	</body>
</html>