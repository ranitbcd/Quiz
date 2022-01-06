<?php
include('../lib/connect.php');
$obj=new connect();
?>


<?php
    $uid=$_POST['uid'];
    $pwd=$_POST['pwd'];
    $uname=$_POST['uname'];
    $dob=$_POST['dob'];
    $cno=$_POST['contact_no'];
    $img_name=$_FILES['ImageFile']['name'];
    $source=$_FILES['ImageFile']['tmp_name'];
    $target="dist/img/".$img_name;
    $_SESSION['img_name']=$img_name;
    $b=move_uploaded_file($source,$target);
    $n=$obj->update_rec($uid,$pwd,$uname,$dob,$cno,$img_name);
    if($n)
    {
        echo "updated!!!";
    }
    else{
        echo "problem.....";
    }
    
?>