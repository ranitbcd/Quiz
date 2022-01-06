<?php
	session_start();
	if(!(isset($_SESSION['uid'])))
	{
		$s=md5('failed');
		header('Location:../index.php?err1='.$s);
	}
	$uid=$_SESSION['uid'];
	$image=$_SESSION['image'];
	
?>
<?php
	include('lib/connect.php');
	$obj=new connect();
	$msg='';
	$n=-1;
	$cname='';
	
?>
<?php
if(isset($_POST['submit']))
{
	$cname=strtoupper(trim($_POST['cname']));
	$count=$obj->CHECK_DUPLICATE_COLOR($cname);
	if($count==0)
	{
		$n=$obj->SAVE_COLOR_DETAILS($cname);
		if($n==1)
		{
		$msg="<font color='white'><b>Data Saved Successfully !!! </b></font>";
		}
	else if($n==0)
	$msg="<font color='red'><b>Problem In Data Save  !!! </b></font>";
	else
	$msg='';
	}
}
$res=$obj->GET_COLOR_DETAILS();
?>

<!DOCTYPE html>
<html>
  <head>
  <script>
		function delete_record(value)
		{
			var conf=confirm("Are you sure !!!");
			if(conf==true)
			{
				window.location="delete_color.php?cname="+value;
			}

		}
	</script>
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

    <script type="text/javascript" src="js/ajax.js"></script>
   
 
   
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
            <div class="col-md-8">
              <div class="box">
                
                <div class="box-body">
                <form name="form1"  method="post" action="add_new_color.php">
                <table class="table table-bordered table-striped">
				<thead>
				 <tr bgcolor="#006699">
                <th colspan="5"><font color="#CCCCCC"><big>ADD NEW COLOR</big></font></th>
                </tr>
				</thead>
                <tbody>
				<tr> 
				<th>COLOR NAME</th> 
				<th><input type="text" name="cname" id="cname" size="20" value="" oninvalid="this.setCustomValidity('Enter Category Name')" oninput="this.setCustomValidity('')"  required tabindex="2" autofocus></th>                   
   					<th><input type="submit" value="ADD" name="submit" tabindex="3"></th> 
				</tr> 
                
                <tr bgcolor="#006699">
                <th colspan="5"><?php echo $msg;?></th>
                </tr>
                </tbody>
                   </table>
                   </form>
				<table class="table table-bordered table-striped">
				<thead>
				<tr>
				<th>SLNO</th>
				<th>CNAME</th>
				<th>ACTION</th>
				</tr>
				</thead>
				<tbody>
				<?php
				$i=1;
				while($arr=mysql_fetch_array($res))
				{
				?>
				<tr>
				<th><?php echo $i++;?></th>
				<th><?php echo $arr['color_name'];?></th>
				<td align="center" width="50">
                    <a href="#" onClick="delete_record('<?php echo $arr['color_name'];?>')"> <img src="images/icn_trash.png" title="Delete"></a>
                    
                    </td>  
				</tr>
				
				<?php
				}
				?>
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
    <script src="dist/js/app.min.js" type="text/javascript"></script>

   
  </body>
</html>