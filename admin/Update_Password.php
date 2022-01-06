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
	if(isset($_POST['submit']))
	{
		$pwd=$_POST['oldpwd'];
		$pwd1=$_POST['newpwd'];
		$pwd2=$_POST['cpwd'];
		if($pwd1!=$pwd2)
		$msg="<font color='orange'><b>Password Mismatch</b></font>";
		else
		{
			$count=$obj->CHECK_PASSWORD($pwd);
			if($count==1)
			{
				$n=$obj->UPDATE_PASSWORD($uid,$pwd1);
				if($n==1)
				$msg="<font color='white'><b>Password Updated Successfully !!!</b></font>";
				else if($n==0)
				$msg="<font color='orange'><b>Problem In Update !!!</b></font>";
			}
			else{
				$msg="<font color='orange'><b>Problem In Update !!!</b></font>";
			}
		}
		
	}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Chatterjee Opticals</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />  
 
   
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
            <div class="col-md-6">
              <div class="box">
               
                <div class="box-body">
                <form name="form1" id="f1" method="post" action="Update_Password.php">
                <table class="table table-bordered table-striped">
				<thead>
				 <tr bgcolor="#006699">
                <th colspan="4"><font color="#CCCCCC"><big>UPDATE PASSWORD</big></font></th>
                </tr>
				</thead>
                <tbody>
        			
                    <tr> 
   					<th>OLD PASSWORD</th> 
    				<th><input type="password" name="oldpwd" id="oldpwd" size="30"  required>			</th> 
					</tr> 
                    
                    <tr> 
   					<th>NEW PASSWORD</th> 
    				<th><input type="password" name="newpwd" id="newpwd" size="30"  required>			</th> 
					</tr> 
                    
                    <tr> 
   					<th>CONFIRM PASSWORD</th> 
    				<th><input type="password" name="cpwd" id="cpwd" size="30"  required>			</th> 
					</tr> 
                	<tr> 
   					<td colspan="2" align="center"><input type="submit" value="Update Password" name="submit"></td> 
				</tr> 
                <tr bgcolor="#006699">
                <td colspan="4"><?php echo $msg;?></td>
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
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <script src="dist/js/app.min.js" type="text/javascript"></script>

   
  </body>
</html>