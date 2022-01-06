<?php
include('lib/userconnect.php');
$obj=new connect();
?>
<?php
$user_name=$_POST['user_name'];
$password=$_POST['password'];
$dob=$_POST['dob'];
$email=$_POST['email'];
$n=$obj->register($email,$password,$user_name,$dob);
//echo $n;
if($n)
{
    header('Location:userlogin.php');
}


