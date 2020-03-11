<?php
//this page is called when the user clicks on the Save to database option in pdf generate
	include "model/connection.inc.php";
	include "controller/curdBill.inc.php";
	include "view/view.inc.php";
	session_start();

	$view_bills= new viewBill;
	$userData=$_SESSION["user_data"];
	$batchId=$_SESSION["batchId"];	
	$bill_type=$_SESSION["bill_type_id"];
		
	$view_bills->insertFuelBill($userData,$batchId,$bill_type);
	header('location:pdfGenerate.php?success=done');
	
?>