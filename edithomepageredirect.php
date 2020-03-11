<?php
	include "model/connection.inc.php";
	include "controller/curdBill.inc.php";
	include "view/view.inc.php";

	$view_bills= new viewBill;
	session_start();

	if(isset($_POST['batch_name']))
	{
		$selected_batchid=$_POST['batch_name'];
		$returnData=$view_bills->getFuelBatchData($selected_batchid);		

		foreach($returnData as $tablerow)
		{
			$counter=false;
			 $data_row=array();
			foreach ($tablerow as $value) {
				
				if($counter == false){
					$data_id[]=$value;
					$counter =true;
				}
				else
				{
					$data_row[]=$value;
					echo $value;
				}
			}
			$data_table[]=$data_row;
		}

		$_SESSION["user_data"]=$data_table;
		$_SESSION["bill_id"]=$data_id;
		$_SESSION["batchId"]=$selected_batchid;
	}
	header('Location: editFuelBill.php');



?>