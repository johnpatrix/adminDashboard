<?php
	include "model/connection.inc.php";
	include "controller/curdBill.inc.php";
	include "view/view.inc.php";

	$view_bills= new viewBill;
	session_start();
	$batch_id=$_POST['batch_id'];
	$data=$view_bills->getbilltype_by_batchid($batch_id);
	echo $data;

?>