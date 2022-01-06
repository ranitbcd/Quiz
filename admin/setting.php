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
	$invno=0;
	if(isset($_POST['invno']))
	{
		$invno=$_POST['invno'];
		$obj->UPDATE_INVOICE_NO1($invno);
	}
	$invno=$obj->GET_INVOICE_NO1();
	
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Chatterjee Opticals</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/ajax.js"></script>
	<style>
	.style1{
			font-size:12px;
			font-weight:bold;
		}
	
	.style2{
			text-transform:uppercase;
			font-weight:bold;
			font-size:12px;
		}
		</style>
   
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
                            <img src="dist/img/<?php echo $image;?>" class="img-circle" alt="user image"/>
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
                      <a href="backup.php" class="btn btn-default btn-flat">Back Up</a>
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
        
             <div class="col-md-4">
              <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">INVOICE SETTING</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                <form name="f1" id="f1" method="post" action="setting.php">
                 <table width="100%">
                 <tr>
                 	<td>INVOICE NO</td>
					<td class="style1"><input type="text" name="invno" id="invno" size="10" onKeyPress="return isNumberInput(this,event);" value="<?php echo $invno;?>"></td>
                 </tr>
                  
				   <tr>
				   <td colspan="2">&nbsp;</td>
				   </tr>
				   
                   <tr>
                 	<td align="center" colspan="2"><input type="submit" value="UPDATE" name="submit" id="submit" class="btn btn-primary btn-sm btn-flat"></td>
                   </tr>
                   
                 </table>
                </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          <!-- Main row -->
		  
          

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	  
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
    <script src="dist/js/app.min.js" type="text/javascript"></script>

   
  </body>
</html>