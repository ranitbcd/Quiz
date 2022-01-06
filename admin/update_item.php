<?php
	include('lib/connect.php');
	$obj=new connect();
?>
<?php
$n=-1;
if(isset($_POST['submit']))
{
	$model_id=strtoupper(trim($_POST['oldid']));
	$mid=strtoupper(trim($_POST['mid']));
	$cid=$_POST['cid'];
	$iname=strtoupper(trim($_POST['iname']));
	$cmpname=strtoupper(trim($_POST['cmpname']));
	$pname=strtoupper(trim($_POST['pname']));
	$color=strtoupper(trim($_POST['color']));
	$qnty=$_POST['qnty'];
	$price=$_POST['price'];
	$n=$obj->UPDATE_ITEM_DETAILS($model_id,$mid,$cid,$iname,$cmpname,$pname,$color,$qnty,$price);
		
}
header('Location:show_all_items.php');
?>