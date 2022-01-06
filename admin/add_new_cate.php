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
  $cid=$obj->getCatId();
  $res=$obj->getCatDetails();
  $cname='';
  $update=0;
  $label='SAVE RECORDS';
  if(isset($_GET['cid']))
  {
    $cid=$_GET['cid'];
    $cname=$_GET['cname'];
    $label='UPDATE RECORDS';
    $update=1;
  }

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
				window.location="delete_cate.php?cid="+value;
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
    <title>add_new_cate</title>
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
            <div class="col-md-9">
              <div class="box">
                
                <div class="box-body">
                <form name="form1"  method="post" action="save_cate.php">
                <input type="hidden" name="update" value="<?php echo $update;?>">
                <table class="table table-bordered table-striped">
				<thead>
				 <tr bgcolor="#006699">
                <th colspan="5"><font color="#CCCCCC"><big>ADD NEW CATEGORY</big></font></th>
                </tr>
				</thead>
                <tbody>
				<tr> 
				<th>CATEGORY ID</th> 
				<th><input type="text" name="cid" id="cid" size="10" value="<?php echo $cid;?>" oninvalid="this.setCustomValidity('Enter Cate ID')" oninput="this.setCustomValidity('')"  required tabindex="1"></th>                  
				 
				<th>CATEGORY NAME</th> 
				<th><input type="text" name="cname" id="cname" size="20" value="<?php echo $cname;?>" oninvalid="this.setCustomValidity('Enter Category Name')" oninput="this.setCustomValidity('')"  required tabindex="2" autofocus></th>                   
   					<th><input type="submit" value="<?php echo $label;?>" name="submit" tabindex="3"></th> 
				</tr> 
                
                <tr bgcolor="#006699">
                <th colspan="5"></th>
                </tr>
                </tbody>
                   </table>
                   </form>
                   <table class="table table-bordered table-striped">
				            <thead>
                    <tr>
                    <th>SlNo</th>
                    <th>CID</th>
                    <th>CNAME</th>
                    <th colspan="2" width="50">ACTION</th>
                    </tr>
                    <?php
                    $i=0;
                    while($arr=mysqli_fetch_array($res))
                    {
                      $i++;
                    ?>
                    <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $arr['cid'];?></td>
                      <td><?php echo strtoupper($arr['cname']);?></td>
                      <td align="center"><a href="add_new_cate.php?cid=<?php echo $arr['cid'];?>&cname=<?php echo $arr['cname'];?>"><img src="images/icn_edit.png"></td>
                      <td align="center"><a href="delete_cate.php?cid=<?php echo $arr['cid'];?>"><img src="images/icn_trash.png"></a></td>
                    </tr>
                    <?php
                    }
                    ?>
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
        <strong></strong> 
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