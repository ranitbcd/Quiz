<?php
require('fpdf.php');
?>
<?php
class PDF extends FPDF
{
// Page footer
function Footer()
{
	// Position at 1.5 cm from bottom
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Page number
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

function BasicTable($header)
{
	include('../lib/connect.php');
	$obj=new connect();
	$res='';
	$search_name='';
	$select=0;
	if(isset($_GET['search']))
	{
		$select=$_GET['search'];
		$search_name=$_GET['txtsearch'];
	}
	$res=$obj->GET_CLOSING_STOCK_DETAILS($select,$search_name);
	$date2=$_GET['date2'];
	// Header
	
	$str="CLOSING STOCK REPORT AS ON DATE ".$date2;
	$this->Cell(103,7,$str,1);
	$this->Ln();
	$size=array(7,17,24,30,25,20,18,12,18,20);
	$count=sizeof($header);
	for($i=0;$i<$count;$i++)
	{
		$a=$size[$i];
		$this->Cell($a,7,$header[$i],1);
	}
	$this->Ln();
	//Data
	$i=0;
	$tot_qnty=0;
	while($arr=mysql_fetch_array($res))
	{
				$i++;
				$qnty=$arr['qnty']-$arr['sales_qnty'];
				$amount=0;
				if($qnty>0)
				{
					$amount=$qnty*$arr['price'];
					$tot_qnty+=$qnty;
					$MID=substr($arr['model_id'],1,5);
				$this->Cell($size[0],7,$i,1);
				//$this->Cell($size[1],7,$arr['model_id'],1);
				$this->Cell($size[1],7,$MID,1);
				$this->Cell($size[2],7,$arr['iname'],1);
				$this->Cell($size[3],7,$arr['cat_name'],1);
				$this->Cell($size[4],7,$arr['cmp_name'],1);
				$this->Cell($size[5],7,$arr['pur_from'],1);
				$this->Cell($size[6],7,$arr['color'],1);
				$this->Cell($size[7],7,$qnty,1,0,'C');
				
				$this->Cell($size[8],7,$arr['price'],1,0,'R');
				$this->Cell($size[9],7,number_format($amount,2),1,0,'R');
				$this->Ln();
				}
		}
		
					$this->Cell($size[0],7,'',1);
					$this->Cell($size[1],7,'',1);
					$this->Cell($size[2],7,'',1);
					$this->Cell($size[3],7,'',1);
					$this->Cell($size[4],7,'',1);
					$this->Cell($size[5],7,'',1);
					$this->Cell($size[6],7,'',1);
					$this->Cell($size[7],7,$tot_qnty,1,0,'C');
					$this->Cell($size[8],7,'',1);
					$this->Cell($size[9],7,'',1);
			
}



}

$pdf = new PDF('P','mm','A4');
// Column headings
$header = array('SL','MODEL ID','MODEL NAME','CATEGORY','COMP NAME','PUR FROM','COLOR',	'QNTY','PRICE','AMOUNT');

$pdf->SetFont('Arial','',9);
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->BasicTable($header);
$pdf->Output();
?>
