<?php
    include('../lib/connect.php');
    $obj=new connect();
?>
<?php
    $cid=$_POST['cid'];
    $cname=$_POST['cname'];
    $update=$_POST['update'];
    if($update==0)
    {
    $n=$obj->save_cate($cid,$cname);
        if($n)
        $obj->updateCatId();
    }
    else
    {
        $n=$obj->update_cate($cid,$cname);
        
    }
    header('Location:add_new_cate.php?result='.$n);
?>