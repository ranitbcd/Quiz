<?php
	session_start();
	include('lib/connect.php');
	$obj=new connect();
?>
<?php
$n=-1;
$date1=date('Y-m-d');
if(isset($_POST['submit']))
{
	$mid=strtoupper(trim($_POST['mid']));
	$cate_name=$_POST['cid'];
	$_SESSION['cate_name']=$cate_name;
	$iname=strtoupper(trim($_POST['iname']));
	$cmpname=strtoupper(trim($_POST['cmpname']));
	$pname=strtoupper(trim($_POST['pname']));
	$color=strtoupper(trim($_POST['color']));
	$qnty=$_POST['qnty'];
	$price=$_POST['price'];
	$slno=time();
	$count=$obj->CHECK_DUPLICATE_ITEM($mid);
	if($count==0)
	{
		$n=$obj->SAVE_ITEM_DETAILS($mid,$cate_name,$iname,$cmpname,$pname,$color,$qnty,$price,$date1);
		
	}
	else
	{
		$n=-1;
	}
}
header('Location:add_new_item.php?result='.$n);
?>