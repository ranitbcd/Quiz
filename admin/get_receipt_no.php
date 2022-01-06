<?php
	include('lib/connect.php');
	$obj=new connect();
	$type=$_GET['type'];
	$receipt_no=$obj->GENERATE_RECEIPT_NO($type);
	$rec=array('receipt_no'=>$receipt_no);
	echo json_encode($rec,JSON_FORCE_OBJECT);
?>