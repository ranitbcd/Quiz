<?php
    include('lib/connect.php');
    $obj=new connect();
?>
<?php
    $uid=$_POST['uid'];
    $pwd=$_POST['pwd'];
    echo "uid".$uid."<br>";
    echo "pwd=".$pwd."<br>";
    $res=$obj->check_user($uid,$pwd);
    $count=mysqli_num_rows($res);
    if($count==1)
    {
        $arr=mysqli_fetch_array($res);
        session_start();
        $_SESSION['uid']=$uid;
        $_SESSION['image']=$arr['img_name'];
        header('Location:admin');
    }
    else
    {
        header("Location:login.php?login=failed");
    }
?>