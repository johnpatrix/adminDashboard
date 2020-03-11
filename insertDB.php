<?php
	include "model/connection.inc.php";
	include "controller/curdBill.inc.php";
	include "view/view.inc.php";
	session_start();

	$view_bills= new viewBill;
	$userData=$_SESSION["user_data"];
	$batchId=$_SESSION["batchId"];	
		
	$view_bills->insertFuelBill($userData,$batchId);
	header('location:pdfGenerate.php?success=done');
	
?>