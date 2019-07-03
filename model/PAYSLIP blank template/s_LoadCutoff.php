

<?php
include('../config/dbconfig-Payroll.php');
session_start();

$CutOff=$_REQUEST['CutOff'];
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

echo '</tbody>';
echo '</table>';

echo '<div class="box-footer">';
echo '<form method="POST" action="../model/s_printPayslip.php" target="_blank">';
echo '<input type="hidden" name="cutoff" value="' . $CutOff . '">';
echo '<button type="submit" class="btn btn-primary">Print Payslip</button>';
echo '</form>';
echo '</div>';
?>