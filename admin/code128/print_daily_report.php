<?php
require('fpdf.php');
?>
<?php
class PDF extends FPDF
{


// Simple table
function BasicTable($header)
{
	include('../lib/connect.php');
	$obj=new connect();
	$res='';
	$date1=date('Y-m-d');
	$date2=date('Y-m-d');
	if(isset($_GET['date1']))
	$date1=$_GET['date1'];
	
	if(isset($_GET['date2']))
	$date2=$_GET['date2'];
	$res1=$obj->GET_RECEIVE_REPORT($date1,$date2);
	$res=$obj->GET_ALL_SALES_REGISTER_DETAILS($date1,$date2);
	// Header
	$str="DAILY REPORT AS ON DATE FROM ".$date1." TO ".$date2;
	$this->Cell(125,7,$str,1);
	$this->Ln();
	$size=array(15,30,30,50,30,30);
	$count=sizeof($header);
	for($i=0;$i<$count;$i++)
	{
		$a=$size[$i];
		$this->Cell($a,7,$header[$i],1);
	}
	$this->Ln();
	/* Data*/
	$i=0;
	$sum=0.0;
	while($arr=mysql_fetch_array($res))
	{
				$i++;
				$sum+=$arr['receive_amount'];
				
				$this->Cell($size[0],7,$i,1);
				$this->Cell($size[1],7,$arr['invoice_no'],1);
				$this->Cell($size[2],7,$arr['invoice_date'],1);
				$this->Cell($size[3],7,$arr['cname'],1);
				$this->Cell($size[4],7,"Advance On Sales",1);
				$this->Cell($size[5],7,$arr['receive_amount'],1,0,'R');
				$this->Ln();
				
	}
	while($arr=mysql_fetch_array($res1))
	{
				$i++;
				$sum+=$arr['amount'];
				
				$this->Cell($size[0],7,$i,1);
				$this->Cell($size[1],7,$arr['invoice_no'],1);
				$this->Cell($size[2],7,$arr['date1'],1);
				$this->Cell($size[3],7,$arr['cname'],1);
				$this->Cell($size[4],7,"Receive",1);
				$this->Cell($size[5],7,$arr['amount'],1,0,'R');
				$this->Ln();
				
	}
		
		$this->Cell($size[0],7,'',1);
		$this->Cell($size[1],7,'',1);
		$this->Cell($size[2],7,'',1);
		$this->Cell($size[3],7,'',1);
		$this->Cell($size[4],7,'TOTAL',1);
		$this->Cell($size[5],7,number_format($sum,2),1,0,'R');			


}
}
$pdf = new PDF('P','mm','A4');
// Column headings
$header = array('SL NO','INVOICE NO','DATE','CUSTOMER NAME','DESCRIPTION','AMOUNT');

$pdf->SetFont('Arial','',9);
$pdf->AddPage();
$pdf->BasicTable($header);
$pdf->Output();
?>
