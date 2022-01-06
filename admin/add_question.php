<?php
	session_start();
	if(!(isset($_SESSION['uid'])))
	{
		$s=md5('failed');
		header('Location:../index.php?err1='.$s);
	}
  $uid=$_SESSION['uid'];
  $image='default.png';
  if(isset($_SESSION['image']))
	$image=$_SESSION['image'];
?>

<?php
  include('../lib/connect.php');
  $obj=new connect();
  $res=$obj->getCatDetails();
?>
<!DOCTYPE html>
<html>
  <head>
 
  <style>
		.focus{
		border:2px solid #FFF;
		background-color:#FFCCFF;
		text-transform:uppercase;
		}
	</style>  
    <meta charset="UTF-8">
    <title>Chatterjee Opticals</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
   
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <script>
      var http=false;
	  http=new XMLHttpRequest();
	function getQuestionNo(cid)
	{
		http.open("GET","getSlNo.php?cid="+cid,true);
		http.onreadystatechange=function()
		{
			if(http.readyState==4)
			{
				document.getElementById("qno").value=http.responseText;
				
			}
		}
		http.send(null);
	}
	
    </script>   
 
   
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo"><b>Admin</b>Panel</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                
                <ul class="dropdown-menu">
                  
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                     
                      
                      
                      
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="user image"/>
                          </div>
                          
                          
                        </a>
                      </li>
                    </ul>
                  </li>
                  
                </ul>
              </li>
              
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="dist/img/<?php echo $image;?>" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $uid;?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/<?php echo $image;?>" class="img-circle" alt="User Image" />
                    <p>
                     <?php echo $uid;?>
                      
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/<?php echo $image;?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $uid;?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
         
          <!-- sidebar menu: : style can be found in sidebar.less -->
		  
		  <?php
		  include('menu.php');
		  ?>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
	  
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          
          
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="row">
            <div class="col-md-9">
              <div class="box">
                
                <div class="box-body">
                <form name="form1"  method="post" action="#">
                <input type="hidden" name="update" value="<?php echo $update;?>">

                <table class="table table-bordered table-striped">
				<thead>
				 <tr bgcolor="#006699">
                <th colspan="5"><font color="#CCCCCC"><big>ADD NEW QUESTION</big></font></th>
                </tr>
				</thead>
        <tbody>
				<tr> 
				<th>SELECT CATEGORY</th> 
				<th>
        <select name="cid" id="cid" onchange="getQuestionNo(this.value)">
        <option value="0">Select Category</option>
        <?php
          while($arr=mysqli_fetch_array($res))
          {
        ?>
        <option value="<?php echo $arr['cid'];?>"><?php echo strtoupper($arr['cname']);?></option>
        <?php
          }
          ?>
        </select>
        </th>                  
				</tr>
        <tr>
        <th>QNO</th>
        <th><input type="text" name="qno" id="qno" size="5"></th>
        </tr> 
        <tr>
        <th>QUESTION</th>
        <th><input type="text" name="question" id="question" size="50"></th>
        </tr>
        <tr>
        <th>OP1</th>
        <th><input type="text" name="op1" id="op1"></th>
        </tr>
        <tr>
        <th>OP2</th>
        <th><input type="text" name="op2" id="op2"></th>
        </tr>
        <tr>
        <th>OP3</th>
        <th><input type="text" name="op3" id="op3"></th>
        </tr>
        <tr>
        <th>OP4</th>
        <th><input type="text" name="op4" id="op4"></th>
        </tr>
        <tr>
        <th>SELECT CA</th>
        <th>
          <select names="ca" id="ca">
          <option value="0">Select</option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
          <option value="D">D</option>
          </select>
        </th>
        </tr>
        <tr>
        <td colspan="2" align="center"><input type="submit" name="b1" id="b1" value="SUBMIT"></th>
        </tr>
      </tbody>
				     </table>
                   </div>
                   </div>
                   </div>
                   </div>
          <!-- Main row -->
          

        </section><!-- /.content -->
        </div>
         <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong> 2017 Chatterjee Opticals(Raniganj) </strong> 
      </footer>
      
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>   
	<script>
		$(document).ready(function(){
 		$('input[type="text"],textarea').focus(function(){
		$(this).addClass("focus");
		});
		$('input[type="text"],textarea').blur(function(){
		$(this).removeClass("focus");
		});
		});
	</script>	 
  <script>
  $(document).ready(function(){
      $("#b1").click(function(){
        var cid=$("#cid").val();
        var qno=$("#qno").val();
        var question=$("#question").val();
        var op1=$("#op1").val();
        var op2=$("#op2").val();
        var op3=$("#op3").val();
        var op4=$("#op4").val();
        var ca=$("#ca").val();
        $.ajax({
            type: "POST",
            url: "saveQuestion.php",
            data:{cid:cid,qno:qno,question:question,op1:op1,op2:op2,op3:op3,op4:op4,ca:ca},
            cache: false,
            success: function(result){
            alert(result);
            }
            });
      })
  });
  </script>
    <script src="dist/js/app.min.js" type="text/javascript"></script>

   
  </body>
</html>