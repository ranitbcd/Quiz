<?php
    include('../lib/connect.php');
    $obj=new connect();
?>
<?php
    $cid=$_POST['cid'];
    $qno=$_POST['qno'];
    $question=$_POST['question'];
    $op1=$_POST['op1'];
    $op2=$_POST['op2'];
    $op3=$_POST['op3'];
    $op4=$_POST['op4'];
    $ca=$_POST['ca'];
    $n=$obj->add_question($cid,$qno,$question,$op1,$op2,$op3,$op4,$ca);
    if($n)
    {
        $obj->updateQno($cid);
    }
    echo $n;




?>