<?php
	include "model/connection.inc.php";
	include "controller/curdBill.inc.php";
	include "view/view.inc.php";

	$view_bills= new viewBill;
	session_start();

	if(isset($_POST['batch_name']))
	{
		$selected_batchid=$_POST['batch_name'];
		$selected_bill_type=$_POST['billType_name'];
		//echo "batch id".$selected_batchid. " && bill type name".$selected_bill_type;
		$returnData=$view_bills->getFuelBatchData($selected_batchid,$selected_bill_type);	
		$data_table=array();
		$data_id=array();	

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
		$bill_type_name=$view_bills->getBillTypeData($selected_bill_type);
		$_SESSION["bill_type_id"]=$selected_bill_type;	
		$_SESSION["bill_type_name"]=$bill_type_name;
	}
	header('Location: editFuelBill.php');



?>