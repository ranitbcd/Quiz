<?php
		session_start();
		
		include('lib/connect.php');
		$obj=new connect();
		unset($_SESSION['cname']);
		unset($_SESSION['cno']);
		unset($_SESSION['gen']);
		
		unset($_SESSION['dvsph']);
		unset($_SESSION['dvcyl']);
		unset($_SESSION['dvaxis']);
		
		unset($_SESSION['dvsph1']);
		unset($_SESSION['dvcyl1']);
		unset($_SESSION['dvaxis1']);
		
		unset($_SESSION['nvsph']);
		unset($_SESSION['nvcyl']);
		unset($_SESSION['nvaxis']);
		
		unset($_SESSION['nvsph1']);
		unset($_SESSION['nvcyl1']);
		unset($_SESSION['nvaxis1']);
		unset($_SESSION['ipd']);
		
		unset($_SESSION['lens_type']);
		unset($_SESSION['lens_price']);
		$obj->CLEAR_INVOICE_TMP();
	
		header('Location:sales_report.php');
					
?>
	