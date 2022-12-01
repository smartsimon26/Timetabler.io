<?php
require_once("pdf.php");
$connect = mysqli_connect("localhost", "root", "", "timetabler");
$db_handle = $connect;
$result = $db_handle->query("SELECT id, unit_code, lecturer, allocated_day,allocated_timeshift, allocated_venue FROM lectures");
$header = $db_handle->query("SELECT `COLUMN_NAME` 
FROM `INFORMATION_SCHEMA`.`COLUMNS` 
WHERE `TABLE_SCHEMA`='timetabler' 
    AND `TABLE_NAME`='lectures' 
	and ((`ORDINAL_POSITION`>=1 and `ORDINAL_POSITION`<=3) 
	or (`ORDINAL_POSITION`>=7 and `ORDINAL_POSITION`<=9));");

require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);		
foreach($header as $heading) {
	foreach($heading as $column_heading)
		$pdf->Cell(25,12,$column_heading,1);
}
foreach($result as $row) {
	$pdf->SetFont('Arial','',8);	
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(25,12,$column,1);
}
$pdf->Output();
?>
