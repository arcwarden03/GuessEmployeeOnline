

<?php
include('../config/dbconfig-Payroll.php');
session_start();

$CutOff=$_REQUEST['CutOff'];
$qLoadQ = "SELECT * from transactionmirdetailedh where idno = '" . $_SESSION['SESS_cIDNumber'] . "' and cutoff = '" . $CutOff . "' and amount > 0";
$rLoadQ=sqlsrv_query($cnPayroll, $qLoadQ);
echo '<table id="" class="table table-bordered table-striped table-hover">';
echo '<thead>';
echo '<tr>';
echo '<th>ID Number</th>';
echo '<th>Transaction Description</th>';
echo '<th>Amount</th>';
echo '<th>Nature</th>';
echo '<th>Payroll Remarks</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
while ($rowLoadQ = sqlsrv_fetch_array($rLoadQ))  
    {

       $idno = $rowLoadQ['IDno'];
       $TransactionDesc = $rowLoadQ['TransactionDesc'];
       $Amount = number_format($rowLoadQ['Amount'],2);
       $Nature = $rowLoadQ['Nature'];
       $Remarks = $rowLoadQ['Remarks'];

        echo '<tr><td>' . $idno . '</td><td>' . $TransactionDesc . '</td><td>' . $Amount . '</td><td>' . $Nature . '</td><td>' . $Remarks . '</td></tr>';
    }
echo '</tbody>';
echo '</table>';

echo '<div class="box-footer">';
echo '<form method="POST" action="../model/s_printPayslip.php" target="_blank">';
echo '<input type="hidden" name="cutoff" value="' . $CutOff . '">';
echo '<button type="submit" class="btn btn-primary">Print Payslip</button>';
echo '</form>';
echo '</div>';
?>