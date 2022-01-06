<?php
session_start();
$uname=$_SESSION['uname'];
include('lib/userconnect.php');
$obj=new connect();
$res=$obj->getCategory();
$cid=0;
$qno=0;
if(isset($_GET['cid']))
$cid=$_GET['cid'];
if(isset($_GET['qno']))
$qno=$_GET['qno'];
$rec='';
$noq=$obj->getCount($cid);
if($cid!=0 && $qno!=0)
{
    $rec=$obj->getQuestion($cid,$qno);
    if($qno>$noq)
    {
        header('Location:review.php?cid='.$cid);
    }
}
?>


<!DOCTYPE html> 
<html> 
  
<head> 
<script language ="javascript">
     var s=10;
function examTimer()
{
    if(s<10)
    s="0"+s;
	document.getElementById("timer").innerHTML="00:"+s;
	s=s-1;
	if(s==0)
	alert("Times up!!!");
	var t=setTimeout("examTimer()",1000);
}  
</script>
<script type="text/javascript">    
             window.history.forward();
             function noBack() {
                 examTimer(); 
                  window.history.forward(); 
             }
        </script>
    <title>PlayWithCS</title> 
  
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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
    <!-- CSS stylesheet -->
    <style type="text/css"> 
        html, 
        body { 
            height: 100%; 
        } 
  
        #green { 
            height: 100%; 
            background: yellow;  
            color: black; 
            padding: 15px; 
        } 
        a {
            color:black;
        }
        li{
            line-height:30px;
        }
        #timer{
            margin-left:500px;
            
        }
    </style> 
</head> 
  
<body onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload=""> 


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
                    PlayWithCS  &nbsp;&nbsp; User : <?php echo $uname;?></a> 
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
                            <a class="nav-item nav-link" >User</a>
                            
                    
                        </div> 
                    </div> 
                </nav> 
                <br>
                <div id="timer">Time: 00:00</div>
                <?php
                    if($cid!=0)
                    {
                ?>
                <form name="f1" id="f1" method="POST" action="saveanswer.php">
                <input type="hidden" name="cid" value="<?php echo $cid;?>">
                <input type="hidden" name="qno" value="<?php echo $qno;?>">
                <table border="1" bordercolor="black" width="90%" align="center" cellspacing="0" cellpadding="10">
                <tr>
                <td><?php echo $qno;?>. <?php echo $rec['question'];?></td>
                </tr>
                <tr>
                <td><input type="radio" name="op" value="A"> <?php echo strtoupper($rec['op1']);?></td>
                </tr>
                <tr>
                <td><input type="radio" name="op" value="B"> <?php echo strtoupper($rec['op2']);?></td>
                </tr>
                <tr>
                <td><input type="radio" name="op" value="C"> <?php echo strtoupper($rec['op3']);?></td>
                </tr>
                <tr>
                <td><input type="radio" name="op" value="D"> <?php echo strtoupper($rec['op4']);?></td>
                </tr>
                <tr>
                <td align="center"><input type="submit" name="b1" value="Submit" style="color:rgb(20,206,167);background-color:black;"></td>
                </tr>
                </table>
                </form>
                <?php
                    }
                    ?>
                <!-- Contains the main content of the webpage-->
                <p style="padding: 15px; text-align: justify;"> 
                    
                </p> 
            </div> 
        </div> 
        
    </div> 

</body> 

</html>