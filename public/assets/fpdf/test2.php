<?php

/*
  An Example PDF Report Using FPDF
  by Matt Doyle

  From "Create Nice-Looking PDFs with PHP and FPDF"
  http://www.elated.com/articles/create-nice-looking-pdfs-php-fpdf/
*/

require_once( "fpdf.php" );

// Begin configuration

$textColour = array( 0, 0, 0 );
$headerColour = array( 100, 100, 100 );
$tableHeaderTopTextColour = array( 255, 255, 255 );
$tableHeaderTopFillColour = array( 125, 152, 179 );
$tableHeaderTopProductTextColour = array( 0, 0, 0 );
$tableHeaderTopProductFillColour = array( 143, 173, 204 );
$tableHeaderLeftTextColour = array( 99, 42, 57 );
$tableHeaderLeftFillColour = array( 184, 207, 229 );
$tableBorderColour = array( 50, 50, 50 );
$tableRowFillColour = array( 170, 170, 170 );
$reportName = iconv('UTF-8','TIS-620', "ประวัติการจัดการสิทธิการลา");
$columnLabels = array('id','วันที่แก้ไข','ประเภท','ผู้แก้ไข','ชื่อ','ปี','ลากิจ','เหลือ','ลาป่วย','เหลือ','พักร้อน','เหลือ' );
$colhight = 10;

$data = array(
    array( 9940, 10100, 9490, 11730, 9940, 10100, 9490, 11730, 9940, 10100, 9490, 9490 ),
    array( 19310, 21140, 20560, 22590, 21140, 20560, 22590, 21140, 20560, 22590, 21140, 9490 ),
    array( 25110, 26260, 25210, 28370, 26260, 25210, 28370, 26260, 25210, 28370, 26260, 9490 ),
    array( 27650, 24550, 30040, 31980, 24550, 30040, 31980, 24550, 30040, 31980, 24550, 9490 ),
);

// End configuration


/**
Create the title page
 **/

$pdf = new FPDF( 'P', 'mm', 'A4' );

/**
Create the page header, main heading, and intro text
 **/

$pdf->AddPage();
$pdf->SetTextColor( $headerColour[0], $headerColour[1], $headerColour[2] );
$pdf->AddFont('THSarabunNew','','THSarabunNew.php');//ธรรมดา
$pdf->AddFont('THSarabunNew','B','THSarabunNew Bold.php');//ธรรมดา
$pdf->SetFont('THSarabunNew','',22);
$pdf->Cell( 0, $colhight, $reportName, 0, 0, 'C' );
//$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
//$pdf->SetFont('THSarabunNew','',20);
//$pdf->Write( 19, "2009 Was A Good Year" );
//$pdf->Ln( 16 );
//$pdf->SetFont('THSarabunNew','',12);
//$pdf->Write( 6, "Despite the economic downturn, WidgetCo had a strong year. Sales of the HyperWidget in particular exceeded expectations. The fourth quarter was generally the best performing; this was most likely due to our increased ad spend in Q3." );
//$pdf->Ln( 12 );
//$pdf->Write( 6, "2010 is expected to see increased sales growth as we expand into other countries." );


/**
Create the table
 **/

$pdf->SetDrawColor( $tableBorderColour[0], $tableBorderColour[1], $tableBorderColour[2] );
$pdf->Ln( 15 );

// Create the table header row
$pdf->SetFont('THSarabunNew','B',15);

// Remaining header cells
$pdf->SetTextColor( $tableHeaderTopTextColour[0], $tableHeaderTopTextColour[1], $tableHeaderTopTextColour[2] );
$pdf->SetFillColor( $tableHeaderTopFillColour[0], $tableHeaderTopFillColour[1], $tableHeaderTopFillColour[2] );

for ( $i=0; $i<count($columnLabels); $i++ ) {
    $pdf->Cell( 15, $colhight, iconv('UTF-8','TIS-620', $columnLabels[$i]), 1, 0, 'C', true );
}

$pdf->Ln( 10 );

// Create the table data rows

$fill = false;
$row = 0;

foreach ( $data as $dataRow ) {

    // Create the data cells
    $pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
    $pdf->SetFillColor( $tableRowFillColour[0], $tableRowFillColour[1], $tableRowFillColour[2] );
    $pdf->SetFont('THSarabunNew','',15);

    for ( $i=0; $i<count($columnLabels); $i++ ) {
        $pdf->Cell(15, $colhight, ( '$' . number_format( $dataRow[$i] ) ), 1, 0, 'C', $fill );
    }

    $row++;
    $fill = !$fill;
    $pdf->Ln( 10 );
}

/***
Serve the PDF
 ***/

$pdf->Output( "report.pdf", "I" );

?>