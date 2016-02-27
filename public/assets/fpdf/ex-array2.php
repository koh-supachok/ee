<?php

/***************************
  Sample using a PHP array
****************************/

require('fpdm.php');

$fields = array(
	'Firstname'    => 'ภาษาไทย'
);

$pdf = new FPDM('test.pdf');
$pdf->Load($fields, true); // second parameter: false if field values are in ISO-8859-1, true if UTF-8
$pdf->Merge();
$pdf->Output();
?>
