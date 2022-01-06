<?php
      include('../lib/connect.php');
      $obj=new connect();    
     $cid=$_GET['cid'];
    $qno=$obj->getQno($cid);
    echo $qno;
?>