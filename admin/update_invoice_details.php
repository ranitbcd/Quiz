<?php
	session_start();
	include('lib/connect.php');
	$obj=new connect();
	$result=0;
?>
<?php
	$invoice_no=$_POST['invoice_no'];
	$obj->DELETE_SALES_DETAILS($invoice_no);
	$invoice_date=$_POST['invoice_date'];
	$customer_name=strtoupper(trim($_POST['customer_name']));
	$address=strtoupper(trim($_POST['address']));
	$contact_no=$_POST['contact_no'];
	$gender=$_POST['gender'];
	
	$dvsph=$_POST['txt_dvsph'];
	$dvcyl=$_POST['txt_dvcyl'];
	$dvaxis=$_POST['txt_dvaxis'];
	
	
	$dvsph1=$_POST['txt_dvsph1'];
	$dvcyl1=$_POST['txt_dvcyl1'];
	$dvaxis1=$_POST['txt_dvaxis1'];
	
	
	$nvsph=$_POST['txt_nvsph'];
	$nvcyl=$_POST['txt_nvcyl'];
	$nvaxis=$_POST['txt_nvaxis'];
	
	$nvsph1=$_POST['txt_nvsph1'];
	$nvcyl1=$_POST['txt_nvcyl1'];
	$nvaxis1=$_POST['txt_nvaxis'];	
	
	$ipd=$_POST['ipd'];
	$frame_amount=$_POST['frame_amt'];
	$lens_amount=$_POST['lens_amt'];
	
	$gross_amt=$_POST['gross_amt'];
	$vat=$_POST['vat'];
	$disc=$_POST['disc'];
	$round_off=$_POST['round_off'];
	$net_amt=$_POST['net_amt'];+
	$receive_amt=$_POST['receive_amt'];
	$due_amt=$_POST['due_amt'];
	$sales_person=strtoupper(trim($_POST['sales_person']));
	$delivery_date=$_POST['date2'];
	
	
	$n=$obj->SAVE_SALES_REGISTER($invoice_no,$invoice_date,$customer_name,$address,$contact_no,$gender,$dvsph,$dvcyl,$dvaxis,$dvsph1,$dvcyl1,$dvaxis1,$nvsph,$nvcyl,$nvaxis,$nvsph1,$nvcyl1,$nvaxis1,$frame_amount,$lens_amount,$gross_amt,$vat,$disc,$round_off,$net_amt,$receive_amt,$due_amt,$sales_person,$delivery_date,$ipd);
	echo $n;
	if($n>0)
	{
		$res=$obj->GET_INVOICE_TMP_DETAILS();
		while($arr=mysql_fetch_array($res))
		{
			$obj->SAVE_SALES_DETAILS($invoice_no,$invoice_date,$arr['mid'],$arr['mname'],$arr['comp_name'],$arr['qnty'],$arr['rate'],$arr['lens_type'],$arr['lens_amount']);
			$obj->UPDATE_SALES_QNTY($arr['mid'],$arr['qnty']);
		}
		
		$obj->CLEAR_INVOICE_TMP();
		$obj->UPDATE_INVOICE_NO();
		unset($_SESSION['invoice_no']);
		unset($_SESSION['cname']);
		unset($_SESSION['ipd']);
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
		$result=1;
		header('Location:sales_report.php');
	}
	
?>