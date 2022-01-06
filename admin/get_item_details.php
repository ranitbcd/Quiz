<?php
	include('lib/connect.php');
	$obj=new connect();
	$mid=$_GET['mid'];
	$res=$obj->GET_ITEM_DETAILS_BY_MODEL_ID($mid);
	$arr=mysql_fetch_assoc($res);
	echo json_encode($arr,JSON_FORCE_OBJECT);
?>