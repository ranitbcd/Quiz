<?php
    include('lib/userconnect.php');
   $obj=new connect(); 
?>
<?php
    session_start();
    $uid=$_SESSION['uid'];
    $cid=$_POST['cid'];
    $qno=$_POST['qno'];
    $ca=$_POST['op'];
    $n=$obj->saveanswer($uid,$cid,$qno,$ca);
    header('Location:game.php?cid='.$cid.'&qno='.($qno+1)); 
?>