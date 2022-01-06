<?php
include('lib/userconnect.php');
$obj=new connect();
$res=$obj->getCategory();
session_start();
$uid=$_SESSION['uid'];
$cid='';
if(isset($_GET['cid']))
$cid=$_GET['cid'];
$dop=date('Y-m-d');
$rec=$obj->getReview($uid,$cid,$dop);
?>


<!DOCTYPE html> 
<html> 
  
<head> 
    <title>Review</title> 
  
    <!-- Import bootstrap cdn -->
    <link rel="stylesheet" href= 
"https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity= 
"sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
        crossorigin="anonymous" /> 
  
    <!-- Import jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity= 
"sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"> 
    </script> 
      
    <!-- Import popper.js cdn -->
    <script src= 
"https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity= 
"sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"> 
    </script> 
      
    <!-- Import javascript cdn -->
    <script src= 
"https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity= 
"sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"> 
    </script> 
      
    <!-- CSS stylesheet -->
    <style type="text/css"> 
        html, 
        body { 
            height: 100%; 
        } 
  
        #green { 
            height: 100%; 
            background: green;  
            color: black; 
            padding: 15px; 
        } 
        a {
            color:white;
        }
        li{
            line-height:30px;
        }
    </style> 
</head> 
  
<body> 


    <!-- h-100 takes the full height of the body-->
    <div class="container-fluid h-100"> 

        <!-- h-100 takes the full height  
                 of the container-->
        <div class="row h-100"> 
            <div class="col-2" id="green"> 
                <h4>SELECT</h4> 
                <hr color="black" size="5">
                <!-- Navigation links in sidebar-->
                <ul>
                <?php
                    while($arr=mysqli_fetch_array($res))
                    {
                ?>
               <li> <a href="game.php?cid=<?php echo $arr['cid'];?>&qno=1"><?php echo $arr['cname'];?></a></li> 
                
               <?php
                    }
                    ?>
                <li><a href="userreview.php">UserReview</a></li>
                </ul>
            </div> 
            <div class="col-10" style="padding: 0;"> 
  
                <!-- Top navbar -->
                <nav class="navbar navbar-expand-lg  
                                navbar-light bg-primary"> 
                    <a class="navbar-brand" href="#"><img src="1.jpg" class="rounded-circle"  width="5%">
                    PlayWithCS</a> 
                    <!-- Hamburger button that toggles the navbar-->
                    <button class="navbar-toggler" 
                        type="button" data-toggle="collapse"
                        data-target="#navbarNavAltMarkup" 
                        aria-controls="navbarNavAltMarkup" 
                        aria-expanded="false"
                        aria-label="Toggle navigation"> 
                        <span class="navbar-toggler-icon"></span> 
                    </button> 
                    <!-- navbar links -->
                    <div class="collapse navbar-collapse" 
                        id="navbarNavAltMarkup"> 
                        <div class="navbar-nav"> 
                        
                            <a class="nav-item nav-link  
                                active" href="#">Home</a> 
                            <a class="nav-item nav-link" 
                                href="#">Contact Us</a> 
                            <a class="nav-item nav-link" 
                                href="#">Email</a> 
                                
                            <a class="nav-item nav-link" 
                                href="logout.php">logout</a> 
                            
                    
                        </div> 
                    </div> 
                </nav> 
                <br><br>
                <form name="f1" id="f1" method="post" action="update.php">
                <table border="1" bordercolor="black" width="90%" align="center" cellspacing="0" cellpadding="10">
                <?php
                    while($arr=mysqli_fetch_array($rec))
                    {
                        $cid=$arr['cid'];
                        $qno=$arr['qno'];
                        if(!isset($_SESSION['cid']))
                        $_SESSION['cid']=$cid;
                        $record=$obj->getQuestion($cid,$qno);
                        $s1='';
                        $s2='';
                        $s3='';
                        $s4='';
                        switch($arr['ca'])
                        {
                            case 'A': $s1="checked"; break;
                            case 'B': $s2="checked"; break;
                            case 'C': $s3="checked"; break;
                            case 'D': $s4="checked"; break;
                        }
                ?>
                <tr>
                <td colspan="2" bgcolor='lightgray'><?php echo $qno;?>. <?php echo $record['question'];?></td>
                </tr>
                <tr>
                <td><input type="radio" name="op<?php echo $qno;?>" value="A" <?php echo $s1;?>> <?php echo strtoupper($record['op1']);?></td>
                
                <td><input type="radio" name="op<?php echo $qno;?>" value="B" <?php echo $s2;?>> <?php echo strtoupper($record['op2']);?></td>
                </tr>
                <tr>
                <td><input type="radio" name="op<?php echo $qno;?>" value="C" <?php echo $s3;?>> <?php echo strtoupper($record['op3']);?></td>
                
                <td><input type="radio" name="op<?php echo $qno;?>" value="D" <?php echo $s4;?>> <?php echo strtoupper($record['op4']);?></td>
                </tr>
                <?php
                    }
                    ?>
                <tr>
                <td align="center" colspan="2"><input type="submit" name="b1" value="Submit" style="color:rgb(20,206,167);background-color:black;"></td>
                </tr>
                </table>
               </form>
                
                <!-- Contains the main content of the webpage-->
                <p style="padding: 15px; text-align: justify;"> 
                    
                </p> 
            </div> 
        </div> 
        
    </div> 

</body> 
  
</html>