<?php
require('fpdf.php');
$text = iconv('UTF-8','TIS-620', "รายชื่อทดสอบภาษาไทย");
$pdf=new FPDF();
$pdf->AddPage();

$pdf->AddFont('THSarabunNew','','THSarabunNew.php');//ธรรมดา
$pdf->SetFont('THSarabunNew','',20);
$pdf->Cell(0,0,$text);
$pdf->Cell(1,1,$text);
$pdf->Ln(15);



$pdf->Output();
?>
