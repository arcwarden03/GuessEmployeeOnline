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


$qPayslip = "select b.compdes,a.* from transactionmirh a ";
$qPayslip = $qPayslip . "left join compmaster b on a.company=b.comp ";
$qPayslip = $qPayslip . "where idno = '" . $_SESSION['SESS_cIDNumber'] . "' and remarks = '" . $cutoff . "'";
$rPayslip=sqlsrv_query($cnPayroll, $qPayslip);
while ($rowP = sqlsrv_fetch_array($rPayslip))  
    {
    	$Company = $rowP['compdes'];
    	$FullName = $rowP['FullName'];
    	$cIDNumber = $rowP['IDno'];
    	$DeptName = $rowP['DeptName'];
    	$BasicPay = number_format($rowP['BasicPay'],2);
    	$AdjustmentsT = number_format($rowP['AdjustmentsT'],2);
    	$LeaveAmount = number_format($rowP['LeaveAmount'],2);
    	$Leave = number_format($rowP['Leave'],2);
    	$AmountOT = number_format($rowP['AmountOT'],2);
    	$AmountSL = number_format($rowP['AmountSL'],2);
    	$TotalOT = number_format($rowP['TotalOT'],2);
    	$HolidaySL = number_format($rowP['HolidaySL'],2);
     	$Holiday = number_format($rowP['Holiday'],2);
    	$HolidayAmount = number_format($rowP['HolidayAmount'],2);
    	$BasicPay = number_format($rowP['BasicPay'],2);
    	$Absent = number_format($rowP['Absent'],2);
    	$AAmount = number_format($rowP['AAmount'],2);
    	$Undertime = number_format($rowP['Undertime'],2);
    	$UAmount = number_format($rowP['UAmount'],2);
    	$Late = number_format($rowP['Late'],2);
    	$LAmount = number_format($rowP['LAmount'],2);
    	$GrossTaxable = number_format($rowP['GrossTaxable'],2);
    	$TAX = number_format($rowP['TAX'],2);
    	$SSSee = number_format($rowP['SSSee'],2);
    	$PAGIBIG = number_format($rowP['PAGIBIG'],2);
    	$PhilHealthee = number_format($rowP['PhilHealthEE'],2);
    	$AdjustmentsD = number_format($rowP['AdjustmentsD'],2);
    	$Loans = number_format($rowP['Loans'],2);
    	$SSSLoan = number_format($rowP['SSSLoan'],2);
    	$PAGLoan = number_format($rowP['PAGLoan'],2);
    	$AdjustmentsR = number_format($rowP['AdjustmentsR'],2);
    	$GrossDeduction = number_format($rowP['GrossDeduction'],2);
    	$NetIncome = number_format($rowP['NetIncome'],2);

		$TotalLoans = $rowP['Loans']+$rowP['SSSLoan']+$rowP['PAGLoan'];

    }


$pdf->SetFont('Arial','B',11);
$pdf->SetXY(11, 13);
$pdf->Write(0, $Company);

$pdf->SetFont('Arial','',7);
$pdf->SetXY(11, 21);
$pdf->Write(0, $cutoff);

//begin left
$pdf->SetFont('Arial','',6);
$pdf->SetXY(26, 26);
$pdf->Write(0, $cIDNumber);

$pdf->SetXY(26, 29);
$pdf->Write(0, $FullName);

$pdf->SetXY(26, 32);
$pdf->Write(0, $DeptName);

$pdf->SetXY(69, 40);
$pdf->Write(0, $BasicPay);

$pdf->SetXY(69, 46);
$pdf->Write(0, $AdjustmentsT);

$pdf->SetXY(48, 49);
$pdf->Write(0, $Leave);

$pdf->SetXY(69, 49);
$pdf->Write(0, $LeaveAmount);

$pdf->SetXY(48, 52);
$pdf->Write(0, number_format($TotalOT+$HolidaySL,2));

$pdf->SetXY(69, 52);
$pdf->Write(0, $AmountOT+$AmountSL);

$pdf->SetXY(48, 55);
$pdf->Write(0, $Holiday);

$pdf->SetXY(69, 55);
$pdf->Write(0, $HolidayAmount);

$pdf->SetXY(48, 63);
$pdf->Write(0, $Absent);

$pdf->SetXY(69, 63);
$pdf->Write(0, $AAmount);

$pdf->SetXY(48, 66);
$pdf->Write(0, $Undertime);

$pdf->SetXY(69, 66);
$pdf->Write(0, $UAmount);

$pdf->SetXY(48, 69);
$pdf->Write(0, $Late);

$pdf->SetXY(69, 69);
$pdf->Write(0, $LAmount);

$pdf->SetFont('Arial','B',7);
$pdf->SetXY(65, 74);
$pdf->Write(0, $GrossTaxable);
//end left

//begin middle
$pdf->SetFont('Arial','',6);
$pdf->SetXY(132, 36);
$pdf->Write(0, $TAX);

$pdf->SetXY(132, 39);
$pdf->Write(0, $SSSee);

$pdf->SetXY(132, 42);
$pdf->Write(0, $PAGIBIG);

$pdf->SetXY(132, 45);
$pdf->Write(0, $PhilHealthee);

$pdf->SetXY(132, 48);
$pdf->Write(0, $AdjustmentsD);


$pdf->SetXY(132, 51);
$pdf->Write(0, number_format($TotalLoans,2));

$pdf->SetXY(132, 60);
$pdf->Write(0, $AdjustmentsR);

$pdf->SetFont('Arial','B',7);
$pdf->SetXY(127, 67);
$pdf->Write(0, $GrossDeduction);
//end middle

//Begin Loan extraction
$qLoans = "select * from transactionmirdetailedh ";
$qLoans = $qLoans . "where idno = '" . $_SESSION['SESS_cIDNumber'] . "' and cutoff = '" . $cutoff . "' and nature = 'Loan'";
$rLoans=sqlsrv_query($cnPayroll, $qLoans);
$position=34;
$pdf->SetFont('Arial','',6);
while ($rowL = sqlsrv_fetch_array($rLoans))  
    {
    	$TransactionDesc = $rowL['TransactionDesc'];
    	$Amount = number_format($rowL['Amount'],2);
    	
		$pdf->SetXY(144, $position);
		$pdf->Write(0, $TransactionDesc);

		$pdf->SetXY(183, $position);
		$pdf->Write(0, $Amount);

		$position=$position+3;
    }
//end loans

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(170, 70);
$pdf->Write(0, $NetIncome);

//Begin Adjustments deductible
$qDeduct = "select * from transactionmirdetailedh ";
$qDeduct = $qDeduct . "where idno = '" . $_SESSION['SESS_cIDNumber'] . "' and cutoff = '" . $cutoff . "' and nature ='AdjustmentD'";
$rDeduct=sqlsrv_query($cnPayroll, $qDeduct);
$cntAdjustments=85;
$TotalD=0;
$pdf->SetFont('Arial','',6);
while ($rowD = sqlsrv_fetch_array($rDeduct))  
    {
    	$TransactionDesc = $rowD['TransactionDesc'];
    	$Amount = number_format($rowD['Amount'],2);
  
  		$pdf->SetXY(10, $cntAdjustments);
		$pdf->Write(0, $TransactionDesc);

		$pdf->SetXY(49, $cntAdjustments);
		$pdf->Write(0, "0.00");

		$pdf->SetXY(64, $cntAdjustments);
		$pdf->Write(0, "0.00");

		$pdf->SetXY(79, $cntAdjustments);
		$pdf->Write(0, $Amount);

		$cntAdjustments=$cntAdjustments+3;

		$TotalD = $rowD['Amount']+$TotalD;
    }

$pdf->SetFont('Arial','B',7);
$pdf->SetXY(77, 127);
$pdf->Write(0, number_format($TotalD,2));

//end deductible
//Begin Adjustments Taxable
$qTax = "select * from transactionmirdetailedh ";
$qTax = $qTax . "where idno = '" . $_SESSION['SESS_cIDNumber'] . "' and cutoff = '" . $cutoff . "' and nature ='AdjustmentT'";
$rTax=sqlsrv_query($cnPayroll, $qTax);
$pdf->SetFont('Arial','',6);
$TotalT=0;
while ($rowT = sqlsrv_fetch_array($rTax))  
    {
    	$TransactionDesc = $rowT['TransactionDesc'];
    	$Amount = number_format($rowT['Amount'],2);
  
  		$pdf->SetXY(10, $cntAdjustments);
		$pdf->Write(0, $TransactionDesc);

		$pdf->SetXY(49, $cntAdjustments);
		$pdf->Write(0, $Amount);

		$pdf->SetXY(64, $cntAdjustments);
		$pdf->Write(0, "0.00");

		$pdf->SetXY(79, $cntAdjustments);
		$pdf->Write(0, "0.00");

		$cntAdjustments=$cntAdjustments+3;
		$TotalT = $rowD['Amount']+$TotalT;
    }
$pdf->SetFont('Arial','B',7);
$pdf->SetXY(47, 127);
$pdf->Write(0, number_format($TotalT,2));

//end deductible
//Begin Adjustments Reimbursable
$qReim = "select * from transactionmirdetailedh ";
$qReim = $qReim . "where idno = '" . $_SESSION['SESS_cIDNumber'] . "' and cutoff = '" . $cutoff . "' and nature ='AdjustmentR'";
$rReim=sqlsrv_query($cnPayroll, $qReim);
$pdf->SetFont('Arial','',6);
$TotalR=0;
while ($rowR = sqlsrv_fetch_array($rReim))  
    {
    	$TransactionDesc = $rowR['TransactionDesc'];
    	$Amount = number_format($rowR['Amount'],2);
  
  		$pdf->SetXY(10, $cntAdjustments);
		$pdf->Write(0, $TransactionDesc);

		$pdf->SetXY(49, $cntAdjustments);
		$pdf->Write(0, "0.00");

		$pdf->SetXY(64, $cntAdjustments);
		$pdf->Write(0, $Amount);

		$pdf->SetXY(79, $cntAdjustments);
		$pdf->Write(0, "0.00");

		$cntAdjustments=$cntAdjustments+3;
		$TotalR = $rowD['Amount']+$TotalR;
    }
//end deductible
$pdf->SetFont('Arial','B',7);
$pdf->SetXY(62, 127);
$pdf->Write(0, number_format($TotalR,2));


//Begin OT
$qOT = "select * from transactionmirdetailedh ";
$qOT = $qOT . "where idno = '" . $_SESSION['SESS_cIDNumber'] . "' and cutoff = '" . $cutoff . "' and nature ='OT'";
$rOT=sqlsrv_query($cnPayroll, $qOT);
$cntOT=85;
$pdf->SetFont('Arial','',6);
while ($rowR = sqlsrv_fetch_array($rOT))  
    {
    	$TransactionDesc = $rowR['TransactionDesc'];
    	$Amount = number_format($rowR['Amount'],2);
  
  		$pdf->SetXY(92, $cntOT);
		$pdf->Write(0, $TransactionDesc);

		$pdf->SetXY(110, $cntOT);
		$pdf->Write(0, $Amount);

		$cntOT=$cntOT+3;
    }
    $pdf->SetFont('Arial','B',7);
$pdf->SetXY(107,127);
$pdf->Write(0, $AmountOT+$AmountSL);
//end OT


//Begin Leave
$qLeave = "select * from transactionmirdetailedh ";
$qLeave = $qLeave . "where idno = '" . $_SESSION['SESS_cIDNumber'] . "' and cutoff = '" . $cutoff . "' and nature ='Leave'";
$rLeave=sqlsrv_query($cnPayroll, $qLeave);
$cntLeave=85;
$pdf->SetFont('Arial','',6);
while ($rowLeave = sqlsrv_fetch_array($rLeave))  
    {
    	$TransactionDesc = $rowLeave['TransactionDesc'];
    	$Amount = number_format($rowLeave['Amount'],2);
  
  		$pdf->SetXY(123, $cntLeave);
		$pdf->Write(0, $TransactionDesc);

		$pdf->SetXY(148, $cntLeave);
		$pdf->Write(0, $Amount);

		$cntLeave=$cntLeave+3;
    }
//end deductible
$pdf->SetFont('Arial','B',7);
$pdf->SetXY(147, 127);
$pdf->Write(0, $LeaveAmount);

//Begin Holiday
$qholiday = "select * from transactionmirdetailedh ";
$qholiday = $qholiday . "where idno = '" . $_SESSION['SESS_cIDNumber'] . "' and cutoff = '" . $cutoff . "' and nature ='Holiday' and amount>0";
$rHoliday=sqlsrv_query($cnPayroll, $qholiday);
$cntLeave=85;
$pdf->SetFont('Arial','',6);
while ($rowHoliday = sqlsrv_fetch_array($rHoliday))  
    {
    	$TransactionDesc = $rowHoliday['TransactionDesc'];
    	$Amount = number_format($rowHoliday['Amount'],2);
  
  		$pdf->SetXY(160, $cntLeave);
		$pdf->Write(0, $TransactionDesc);

		$pdf->SetXY(187, $cntLeave);
		$pdf->Write(0, $Amount);

		$cntLeave=$cntLeave+3;
    }
//end deductible
$pdf->SetFont('Arial','B',7);
$pdf->SetXY(180, 127);
$pdf->Write(0, $HolidayAmount);


$pdf->Output();
?>