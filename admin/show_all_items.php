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
	$res='';
	$select=0;
	$date1=date('Y-m-d');
	
	$date2=date('Y-m-d');
	
	if(isset($_POST['date1']))
	$date1=$_POST['date1'];
	
	if(isset($_POST['date2']))
	$date2=$_POST['date2'];
	
	$search_name='';
	if(isset($_POST['search']))
	{
		$select=$_POST['search'];
		$search_name=$_POST['txtsearch'];
	}
	$res=$obj->GET_ITEM_DETAILS($select,$search_name,$date1,$date2);
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
				window.location="delete_item.php?mid="+value;
			}

		}
	</script>
  <style>
		.focus{
		border:2px solid #FFF;
		background-color:#FFCCFF;
		}
		.style1{
		text-transform:uppercase;
		}
		.date{
			height:30px;
			width:140px;
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
            <div class="col-md-12">
              <div class="box">
                
                <div class="box-body">
                <form name="form1"  method="post" action="show_all_items.php">
                <table class="table table-bordered table-striped">
				<thead>
				 <tr bgcolor="#006699">
                <th colspan="15"><font color="#CCCCCC"><big>ALL ITEM DETAILS</big></font>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <form name="f1" id="f1" action="show_all_items.php" method="post">
                <font color="#99FF00">SEARCH BY :</font>
				
				&nbsp;&nbsp;&nbsp;<font color="#CCCCCC">From :</font>
                   <input type="date" name="date1" value="<?php echo $date1;?>" class="date">
                   &nbsp;&nbsp;&nbsp; <font color="#CCCCCC">To :</font>
                   <input type="date" name="date2" value="<?php echo $date2;?>" class="date">
                <select name="search">
                <?php
					$rec=array('Display All','Model No','Model Name','Category','Company Name','Purchase Party','Color Name','Print Product','Not Print');
					for($i=0;$i<=8;$i++)
					{
				?>
                <option value="<?php echo $i;?>" <?php if($i==$select) echo "selected='selected'";?>><?php echo $rec[$i];?></option>
                <?php
					}
				?>
                </select>
                <input type="text" name="txtsearch" id="txtsearch" size="20" class="style1" value="<?php echo $search_name;?>">
                <input type="submit"  name="submit" value="Search">
                </form>
                </th>
                </tr>
				</thead>
				
				 <form name="form1"  method="post" action="code128/print_barcode.php" target="_blank">
                <tbody>
				<tr>
				<th>SLNO</th>
				<th>MODEL ID</th>
				<th>MODEL NAME</th>
				<th>CATEGORY</th>
				<th>COMPANY NAME</th>
				<th>PURCHASE FROM</th>
				<th>COLOR</th>
				<th>QNTY</th>
				<th>PRICE</th>
				<th colspan="4">ACTION</th>
				</tr>
				
				<?php
				$i=0;
				$img='';
				while($arr=mysql_fetch_array($res))
				{
				$i++;
				if($arr['print_status']==0)
				$img="<img src='images/cross.png'>";
				else
				$img="<img src='images/check.png'>";
				?>
				<tr>
					<td><?php echo $i;?></td>
					<td><?php echo $arr['model_id'];?></td>
					<td><?php echo $arr['iname'];?></td>
					<td><?php echo $arr['cat_name'];?></td>
					<td><?php echo $arr['cmp_name'];?></td>
					<td><?php echo $arr['pur_from'];?></td>
					<td><?php echo $arr['color'];?></td>
					<td><?php echo $arr['qnty'];?></td>
					<td><?php echo $arr['price'];?></td>
					<td align="center" width="50"><?php echo $img;?></td>
					<td align="center" width="50">
                    <a href="edit_item.php?mid=<?php echo $arr['model_id'];?>"> <img src="images/icn_edit.png" title="Edit"></a>
                    </td>
                    <td align="center" width="50">
                    <a href="#" onClick="delete_record('<?php echo $arr['model_id'];?>')"> <img src="images/icn_trash.png" title="Delete"></a>
                    
                    </td>  
					<td align="center" width="50">
                    <a href="code128/print_barcode.php?mid=<?php echo $arr['model_id'];?>=<?php echo $arr['price'];?>" target="_blank"> <img src="images/print.png" title="Print Bar Code"></a>
                    
                    </td>  
				</tr>
					
				<?php
				}
				?>
				</tbody>
				</form>
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
	
	$("input:checkbox").click(function(){
		if($(this).is(':checked'))
		{
			$(this).parents("tr:first").data('prevColor',$(this).parents("tr:first").css('background-color'));
			$(this).parents("tr:first").css('background-color','#ffeebb');
		}
		else
		{
			$(this).parents("tr:first").css('background-color',$(this).parents("tr:first").data('prevColor'));
		}
		});
});

   
    
	</script> 
    <script src="dist/js/app.min.js" type="text/javascript"></script>

   
  </body>
</html>