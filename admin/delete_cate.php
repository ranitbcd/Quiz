<?php
	include('../lib/connect.php');
	$obj=new connect();
?>
<?php
$cid=$_GET['cid'];
$obj->DEL_CATE($cid);
header('Location:add_new_cate.php');
?>