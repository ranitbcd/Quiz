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
backup_tables('localhost','root','','db_coptical');
function backup_tables($host,$user,$pass,$name,$tables='*')
{
	$link=mysql_connect($host,$user,$pass);
	mysql_select_db($name,$link);
	if($tables=='*')
	{
		$tables=array();
		$result=mysql_query('SHOW TABLES');
		while($row=mysql_fetch_row($result))
		{
			$tables[]=$row[0];
		}
	}
	else
	{
		$tables=is_array($tables)?$tables:explode(',',$tables);
	}
	$return='';
	foreach($tables as $table)
	{
		$result=mysql_query('SELECT * FROM '.$table);
		$num_fields=mysql_num_fields($result);
		//$return.='DROP TABLE '.$table.';';
		$row2=mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
		$return.="\n\n".$row2[1].";\n\n";
		for($i=0;$i<$num_fields;$i++)
		{
			while($row=mysql_fetch_row($result))
			{
				$return.='INSERT INTO '.$table.' VALUES(';
				for($j=0;$j<$num_fields;$j++)
				{
					$row[$j]=addslashes($row[$j]);
					//$row[$j]=ereg_replace("\n","\\n",$row[$j]);
					
					if(isset($row[$j]))
					{
						$return.='"'.$row[$j].'"';
					}
					else
					{
						$return.='""';
					}
					if($j<($num_fields-1))
					{
						$return.=',';
					}
			}
			$return.=");\n";
			}
		}
		$return.="\n\n\n";
	}
	$handle=fopen('d:\\db_backup\\db-backup-'.time().'-'.date('d-m-y').'.sql','w+');
	fwrite($handle,$return);
	fclose($handle);
}
	
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>RKM</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
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
                
                <table class="table table-bordered">
                <thead>
                 <tr bgcolor="#006699">
                	<th colspan="4"><font color="#FFFFFF">DATA BACKUP SUCCESSFULLY <br>
					FILE NAME : <?php echo 'db-backup-'.time().'-'.date('d-m-y');?>
					</font></th>
                </tr>
                </thead>  
               </table>
                   </div>
                   </div>
                   </div>
                   </div>
          <!-- Main row -->
          

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <script src="dist/js/app.min.js" type="text/javascript"></script>

   
  </body>
</html>