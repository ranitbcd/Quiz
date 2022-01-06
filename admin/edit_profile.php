<?php
	session_start();
	if(!(isset($_SESSION['uid'])))
	{
		$s=md5('failed');
		header('Location:../index.php?err1='.$s);
	}
	$uid=$_SESSION['uid'];
	$image='default.gif';
  
?>
<?php
	include('../lib/connect.php');
  $obj=new connect();
  $res=$obj->getUserDetails($uid);
  $arr=mysqli_fetch_array($res);
	$msg='';
	$n=-1;
	$NewImageName='';
	

?>


<!DOCTYPE html>
<html>
  <head>
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
                <form name="form1" method="post" action="update_profile.php" enctype="multipart/form-data">
                <table class="table table-bordered table-striped">
				<thead>
				 <tr bgcolor="#006699">
                <th colspan="4"><font color="#CCCCCC"><big>ADD NEW PROFILE</big></font></th>
                </tr>
				</thead>
                <tbody>
				<tr> 
				<th>USER NAME</th> 
				<th><input type="text" name="uname" id="uname" size="30" oninvalid="this.setCustomValidity('Enter User Name')" oninput="this.setCustomValidity('')"  required tabindex="1" value="<?php echo $arr['uname'];?>"></th>                  
				</tr> 
				<tr> 
				<th>USER ID</th> 
				<th><input type="text" name="uid" id="uid" size="30"  oninvalid="this.setCustomValidity('Enter User ID')" oninput="this.setCustomValidity('')"  required tabindex="2" value="<?php echo $arr['uid'];?>"></th>                  
				</tr>
				<tr> 
				<th>PASSWORD</th> 
				<th><input type="password" name="pwd" id="pwd" size="30" value="" oninvalid="this.setCustomValidity('Enter Password')" oninput="this.setCustomValidity('')"  required tabindex="3" value="<?php echo $arr['pwd'];?>"></th>                  
				</tr>
                
				<tr> 
				<th>MOBILE NO</th> 
				<th ><input type="text" name="contact_no" id="contact_no" size="30" onKeyPress="return isNumberInput(this,event);" tabindex="4" value="<?php echo $arr['contact_no'];?>">			</th> 
				</tr>
				<tr>
				<th>DATE OF BIRTH</th> 
				<th><input type="date" name="dob" id="dob" size="30" tabindex="12" value="<?php echo $arr['dob'];?>">	</th> 
                 
				</tr>
        <tr>
				<th>UPLOAD IMAGE</th> 
				<th><input type="file" name="ImageFile" id="ImageFile" tabindex="13" value="<?php echo $arr['dob'];?>">	</th> 
                 
				</tr>
                  </tr>
                	<tr> 
   					<td colspan="2" align="center"><input type="submit" value="Save Records" name="submit" tabindex="7"></td> 
				</tr> 
                
                <tr bgcolor="#006699">
                <th colspan="4"><?php echo $msg;?></th>
                </tr>
                </tbody>
                   </table>
                   </form>
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
    
   
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    
  
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>

   
  </body>
</html>