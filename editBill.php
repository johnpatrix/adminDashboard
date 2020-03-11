<?php
	session_start();
	$userData=$_SESSION["user_data"];
?>
<html>
	<head>
		<title>NIC Admin</title>
		<link rel="stylesheet" href="css/tableReport.css">
	</head>
	<body>
		<div id="batch_id">
	Batch ID: 
	<?php echo "<input type='Text'id='Batch_id' value='".$_SESSION["batchId"]."'/>";?>
		</div>
		<div id="table_report">			
			<input type="text" value="Sl.No" disabled='disabled'/><input type="text" value="Bill No"disabled='disabled'/><input type="text" value="Date"disabled='disabled'/><input type="text"disabled='disabled' value="Particulars"/><input type="text" value="Qty"disabled='disabled'/><input type="text" value="Rate"disabled='disabled'/><input type="text" value="Total Amount "disabled='disabled'/>

				<?php
				$rows=0;
				$col=0;
					foreach($userData as $row){
						 $count= true;
						echo "<div>";

						foreach($row as $key){
							$id_no="row_".$rows."_col_".$col;

							if($count!= true)
							{
								if($key =='0')
									echo "<input type='text' value='' id='".$id_no."'/>";
								else
									echo "<input type='text' value='".$key."'"." id='".$id_no."'/>";


							}
								
							else
								$count=false;
							$col++;


						}
						echo "</div>";
						$rows++;
					}
				?>

			</table>
		</div>
	</body>
</html>