<?php
session_start();
include('../config/dbconfig-Payroll.php');
require('FPDF/fpdf.php');
require('FPDI/fpdi.php');

$cutoff = $_POST['cutoff'];


$pdf = new FPDI();
$pdf->setSourceFile('../Documents/paysliprf.pdf');
$pdf->AddPage();
$tpl = $pdf->importPage(1);
$pdf->useTemplate($tpl, 5, 5, 200);
$pdf->SetFont('Arial','',7);
$pdf->SetTextColor(0,0,0);

$pdf->Output();
?>