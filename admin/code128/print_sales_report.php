<?php
require('fpdf.php');
?>
<?php
class PDF extends FPDF
{


// Load data
function LoadData($file)
{
	// Read file lines
	$lines = file($file);
	$data = array();
	foreach($lines as $line)
		$data[] = explode(';',trim($line));
	return $data;
}

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
	$res=$obj->GET_ALL_SALES_REGISTER_DETAILS($date1,$date2);
	// Header
	$str="SALES REPORT AS ON DATE FROM ".$date1." TO ".$date2;
	$this->Cell(105,7,$str,1);
	$this->Ln();
	$size=array(7,15,20,30,18,15,18,10,10,18,16,18);
	$count=sizeof($header);
	for($i=0;$i<$count;$i++)
	{
		$a=$size[$i];
		$this->Cell($a,7,$header[$i],1);
	}
	$this->Ln();
	/* Data*/
	$i=0;
	$img='';
	$sum=array('frame_amt'=>0,'lens_amt'=>0.00,'gross'=>0.00,'vat'=>0.00,'disc'=>0.00,'net'=>0.00,'recv'=>0.00,'due'=>0.00);
	while($arr=mysql_fetch_array($res))
	{
				$i++;
				$sum['frame_amt']+=$arr['frame_amount'];
				$sum['lens_amt']+=$arr['lens_amount'];
				$sum['gross']+=$arr['gross_amount'];
				$sum['vat']+=$arr['vat'];
				$sum['disc']+=$arr['discount'];
				$sum['net']+=$arr['net_amount'];
				$sum['recv']+=$arr['receive_amount'];
				$sum['due']+=$arr['due_amount'];
				
				$this->Cell($size[0],7,$i,1);
				$this->Cell($size[1],7,$arr['invoice_no'],1);
				$this->Cell($size[2],7,$arr['invoice_date'],1);
				$this->Cell($size[3],7,$arr['cname'],1);
				$this->Cell($size[4],7,$arr['frame_amount'],1,0,'R');
				$this->Cell($size[5],7,$arr['lens_amount'],1,0,'R');
				$this->Cell($size[6],7,$arr['gross_amount'],1,0,'R');
				$this->Cell($size[7],7,$arr['vat'],1,0,'R');
				$this->Cell($size[8],7,$arr['discount'],1,0,'R');
				$this->Cell($size[9],7,$arr['net_amount'],1,0,'R');
				$this->Cell($size[10],7,$arr['receive_amount'],1,0,'R');
				$this->Cell($size[11],7,$arr['due_amount'],1,0,'R');
				$this->Ln();
				
		}
		
		$this->Cell($size[0],7,'',1);
		$this->Cell($size[1],7,'',1);
		$this->Cell($size[2],7,'',1);
		$this->Cell($size[3],7,'TOTAL',1);
		$this->Cell($size[4],7,number_format($sum['frame_amt'],2),1,0,'R');
		$this->Cell($size[5],7,number_format($sum['lens_amt'],2),1,0,'R');
		$this->Cell($size[6],7,number_format($sum['gross'],2),1,0,'R');
		$this->Cell($size[7],7,number_format($sum['vat'],2),1,0,'R');
		$this->Cell($size[8],7,number_format($sum['disc'],2),1,0,'R');
		$this->Cell($size[9],7,number_format($sum['net'],2),1,0,'R');
		$this->Cell($size[10],7,number_format($sum['recv'],2),1,0,'R');
		$this->Cell($size[11],7,number_format($sum['due'],2),1,0,'R');
				


}
}
$pdf = new PDF('P','mm','A4');
// Column headings
$header = array('SL','INV NO','INV DATE','CUSTOMER NAME','FRAME','LENS','GROSS','VAT','DISC','NET','RECEIVE','DUE');

// Data loading
$data = $pdf->LoadData('countries.txt');
$pdf->SetFont('Arial','',9);
$pdf->AddPage();
$pdf->BasicTable($header);
$pdf->Output();
?>
