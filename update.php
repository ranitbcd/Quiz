<?php
include('lib/userconnect.php');
$obj=new connect();
session_start();
$cid=$_SESSION['cid'];
$uid=$_SESSION['uid'];
$n=$obj->getCount($cid);
for($i=1;$i<=$n;$i++)
{
    $op=$_POST['op'.$i];
    $obj->updateAnswer($uid,$cid,$i,$op);
}
header('Location:result.php');
?>