<?php
	include "model/connection.inc.php";
	include "controller/curdBill.inc.php";
	include "view/view.inc.php";
	session_start();
	$view_bills= new viewBill;
	$userData=$_POST['userData'];
	$batchId=$_POST['batchId'];
	$bill_type=$_POST['bill_type'];
	
	
	$bill_type_name=$view_bills->getBillTypeData($bill_type);
	$_SESSION["user_data"]=$userData;
	$_SESSION["batchId"]=$batchId;
	$_SESSION["bill_type_id"]=$bill_type;	
	$_SESSION["bill_type_name"]=$bill_type_name;
	//$view_bills->insertFuelBill($userData,$batchId);
	
	
?>