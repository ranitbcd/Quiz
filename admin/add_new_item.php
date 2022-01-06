<?php
	session_start();
	if(!(isset($_SESSION['uid'])))
	{
		$s=md5('failed');
		header('Location:../index.php?err1='.$s);
	}
	$uid=$_SESSION['uid'];
	$image=$_SESSION['image'];
	$cate_name='';
	if(isset($_SESSION['cate_name']))
	$cate_name=$_SESSION['cate_name'];
	
?>
<?php
	include('lib/connect.php');
	$obj=new connect();
	$msg='';
	$n=-2;
	$res=$obj->GET_CATE_DETAILS();
	$res1=$obj->GET_COLOR();
	
?>
<?php
if(isset($_GET['result']))
{
	$n=$_GET['result'];
	if($n==1)
	{
		$msg="<font color='green'><b>Data Saved Successfully !!! </b></font>";
	}
	else if($n==0)
	$msg="<font color='red'><b>Problem In Data Save  !!! </b></font>";
	else if($n==-1)
	$msg="<font color='red'><b>Duplicate Item  !!! </b></font>";
	else
	$msg='';
}
?>

<!DOCTYPE html>
<html>
  <head>
  <style>
		.focus{
		border:2px solid #FFF;
		background-color:#FFCCFF;
		}
		.style1{
				text-transform:uppercase;
				}
	</style>  
    <meta charset="UTF-8">
    <title>Chatterjee Opticals</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />

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
                <form name="form1"  method="post" action="save_item.php">
				
                <table class="table table-bordered table-striped">
				<thead>
				 <tr bgcolor="#006699">
                <th colspan="5"><font color="#CCCCCC"><big>ADD NEW ITEM</big></font></th>
                </tr>
				</thead>
                <tbody>
				<tr> 
				<th>MODEL ID</th> 
				<th><input name="mid" type="text" class="style1" id="mid" tabindex="1" value="" size="25" maxlength="5" oninvalid="this.setCustomValidity('Enter Model ID')" oninput="this.setCustomValidity('')"  required autofocus placeholder="Exactly 5 characters long"></th>                  
				 
				<th>SELECT CATEGORY NAME</th> 
				<th>
				<select name="cid" tabindex="2">
				<option value="0">Select</option>
				<?php
				while($arr=mysql_fetch_array($res))
				{
				?>
				<option value="<?php echo $arr['cname'];?>" <?php if($arr['cname']==$cate_name) echo "selected='selected'";?>><?php echo $arr['cname'];?></option>
				<?php
				}
				?>
				</select> 
				</th>
				</tr>
				<tr>
				<th>ITEM NAME</th>
				<th colspan="3">
				<input type="text" name="iname" id="iname" size="40" oninvalid="this.setCustomValidity('Enter Item Name')" oninput="this.setCustomValidity('')"  required class="style1" tabindex="3">
				</th>
				</tr>
				
				<tr>
				<th>COMPANY NAME</th>
				<th colspan="3">
				<input type="text" name="cmpname" id="cmpname" size="40" oninvalid="this.setCustomValidity('Enter Company Name')" oninput="this.setCustomValidity('')"  required class="style1" tabindex="4">
				</th>
				</tr>
				
				<tr>
				<th>PURCHASE FROM</th>
				<th colspan="3">
				<input type="text" name="pname" id="pname" size="40" class="style1" tabindex="5">
				</th>
				</tr>
				
				<tr>
				<th>SELECT COLOR</th>
				<th colspan="3">
				<select name="color" tabindex="6">
				<option value="0">Select</option>
				<?php
				while($arr=mysql_fetch_array($res1))
				{
				?>
				<option value="<?php echo $arr['color_name'];?>"><?php echo $arr['color_name'];?></option>
				<?php
				}
				?>
				</select>
				</th>
				</tr>
				<tr>
				<th>QUANTITY</th>
				<th colspan="3">
				<input type="text" name="qnty" id="qnty" size="40" oninvalid="this.setCustomValidity('Enter Quantity')" oninput="this.setCustomValidity('')" onKeyPress="return isNumberInput(this,event);"  required class="style1" tabindex="7">
				</th>
				</tr>
				
				<tr>
				<th>PRICE</th>
				<th colspan="3">
				<input type="text" name="price" id="price" size="40" oninvalid="this.setCustomValidity('Enter Item Price')" oninput="this.setCustomValidity('')" onKeyPress="return isNumberInput(this,event);" required class="style1" tabindex="8">
				</th>
				</tr>
				<tr>				                 
   				<th colspan="4">
				<center>
				<input type="submit" value="SAVE RECORDS" name="submit" tabindex="9">
				<input type="reset" value="RESET" name="reset">
				</center>
				</th> 
				</tr> 
                
                <tr bgcolor="#006699">
                <th colspan="5"><?php echo $msg;?></th>
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
    <script src="js/jquery-1.5.2.min.js"></script>
	<script type="text/javascript" src="jquery.autocomplete.js"></script>
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
 		$("#cmpname").autocomplete("autocomplete_cmpname.php", {
		selectFirst: true
			});
		
		});
	</script>
	
	<script>
		$(document).ready(function(){
 		$("#iname").autocomplete("autocomplete_itemname.php", {
		selectFirst: true
			});
		
		});
	</script>
	
	<script>
		$(document).ready(function(){
 		$("#pname").autocomplete("autocomplete_purchase.php", {
		selectFirst: true
			});
		
		});
	</script>		 
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <script src="dist/js/app.min.js" type="text/javascript"></script>


   
  </body>
</html>