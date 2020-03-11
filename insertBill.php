<?php
	include "model/connection.inc.php";
	include "controller/curdBill.inc.php";
	include "view/view.inc.php";
	session_start();
	$view_bills= new viewBill;
	$userData=$_POST['userData'];
	$batchId=$_POST['batchId'];
	$_SESSION["user_data"]=$userData;
	$_SESSION["batchId"]=$batchId;		
	//$view_bills->insertFuelBill($userData,$batchId);
	
	
?>