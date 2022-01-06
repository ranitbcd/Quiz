<?php
    include('lib/connect.php');
    $obj=new connect();
?>
<?php
    $uid=$_POST['uid'];
    $pwd=$_POST['pwd'];
    $uname=$_POST['uname'];
    $dob=$_POST['dob'];
    $cno=$_POST['cno'];
    echo $pwd;
    //$pwd=md5($pwd);
    $n=$obj->save_rec($uid,$pwd,$uname,$dob,$cno);
    if($n)
    header('Location:welcome.php?uname='.$uname);
    else
    header('Location:register.php?save=error');
?>