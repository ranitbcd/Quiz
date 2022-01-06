<?php
require('code128.php');
include('../lib/connect.php');
$obj=new connect();
$pdf=new PDF_Code128('L','mm',array(70,90));// Height and Width
$pdf->AddPage();
//$pdf->SetFont('Arial','B',7);

//A set
if(isset($_POST['slno']))
{
	$arr=$_POST['slno'];
	$x=50;
	$y=2;
	foreach($arr as $value)
	{
		$pdf->SetFont('Arial','B',6);
		$rec=explode('=',$value);
		$code=$rec[0];
		$obj->UPDATE_PRINT_STATUS($code);
		$pdf->SetXY($x+30,$y+1);
		$pdf->Write(2,"CHATTERJEE");
		$pdf->SetXY($x+30,$y+3);
		$pdf->Write(4,"OPTICALS");
		
		$pdf->Code128($x,$y,$code,25,5);
		$pdf->SetXY($x,$y+6);
		$pdf->Write(2,$code.' Rs.'.$rec[1]);
		//$pdf->Write(2,$code.' Rs.'.$rec[1]);
		$y+=10;
	}
}
else if(isset($_GET['mid']))
{
	$value=$_GET['mid'];
	$x=5;
	$y=2;
	$pdf->SetFont('Arial','B',6);
		$rec=explode('=',$value);
		$code=$rec[0];
		$obj->UPDATE_PRINT_STATUS($code);
		$pdf->SetXY($x+30,$y+1);
		$pdf->Write(2,"CHATTERJEE");
		$pdf->SetXY($x+30,$y+3);
		$pdf->Write(4,"OPTICALS");
		
		$pdf->Code128($x,$y,$code,25,5);
		$pdf->SetXY($x,$y+6);
		$pdf->Write(2,$code.' Rs.'.$rec[1]);
		//$pdf->Write(2,$code.' Rs.'.$rec[1]);
		$y+=10;
}
$pdf->Output();

?>
