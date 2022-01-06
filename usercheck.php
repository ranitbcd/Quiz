<?php
    include('lib/userconnect.php');
    $obj=new connect();
?>
<?php
    $email=$_POST['email'];
    $password=$_POST['password'];
    //echo "email".$email."<br>";
    //echo "password=".$password."<br>";
    $res=$obj->check_user($email,$password);
    $count=mysqli_num_rows($res);
    echo $count;
    if($count==1)
    {
        session_start();
        $uname=$obj->getusername($email);
        $_SESSION['uname']=$uname;
        $_SESSION['uid']=$email;
        header('Location:game.php');
    }
    else{
        header('Location:userlogin.php');
    }
?>