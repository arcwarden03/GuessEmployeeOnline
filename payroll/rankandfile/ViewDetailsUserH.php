PAYROLL INQUIRY REQUEST DETAILS
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>Date</th>
			<th>Month & Year</th>
			<th>CutOff</th>
			<th>Nature of Inquiry</th>
			
		</tr>
	</thead>
	<tbody>
	<?php
		$fLoad = "Select * from tblpayrolldetailsh where cControlNumber = '" . $cControlNumber . "'";
		$rsltLoad = mysql_query($fLoad) or die(mysql_error());
		while ($rLoad = mysql_fetch_array($rsltLoad))     
			{
				$nAutoNum = $rLoad['id'];
				
				$dDate = $rLoad['dDate'];
				$dMonth = $rLoad['dMonth'];
				$dYear = $rLoad['dYear'];
				$dCutoff = $rLoad['dCutoff'];
				$dReason = $rLoad['dReason'];
				   
                echo '<tr>';
				echo '<td>' . $dDate . '</td>';
				echo '<td>' . $dMonth . ' , ' . $dYear. '  </td>';
				echo '<td>' . $dCutoff . ' of the Month</td>';
				echo '<td>' . $dReason . ' </td>';
		        echo '</tr>'; 

			}
	?>
	</body>

</table>


<hr>

<b>APPROVER DETAILS:</b>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Status</th>
			<th>Approve Date</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$fAllAPp = "Select * from tblapprovers where cControlNumber = '" . $cControlNumber . "' order by nLevel asc";
		$rAllAPp = mysql_query($fAllAPp ) or die(mysql_error());
		while ($rowListAPprovers = mysql_fetch_array($rAllAPp)) 	    
			{
				$ApproverName = $rowListAPprovers['vAppName'];
				$cStatus = $rowListAPprovers['cStatus'];

				if ($rowListAPprovers['dApproveDate']=='1900-00-00 00:00:00')
				{
					$dApproveDate = "";
				}
				else
				{$dApproveDate = $rowListAPprovers['dApproveDate'];}

				echo '<tr>';
				echo '<td>' . $ApproverName . '</td>';
				echo '<td>' . $cStatus . '</td>';
				echo '<td>' . $dApproveDate . '</td>';
								
				echo '</tr>';                   
			}
	?>
	</body>

</table>


<b>Payroll Response:</b>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>Payroll Remarks</th>
			<th>Payroll Action</th>
			<th>Payroll Additional Response</th>
			
		</tr>
	</thead>
	<tbody>
	<?php
		$fLoad = "Select * from tblpayrolldetailsh where cControlNumber = '" . $cControlNumber . "'";
		$rsltLoad = mysql_query($fLoad) or die(mysql_error());
		while ($rLoad = mysql_fetch_array($rsltLoad))     
			{
				$nAutoNum = $rLoad['id'];
				
				$dPayrollRemarks = $rLoad['dPayrollRemarks'];
				$dPayrollAction = $rLoad['dPayrollAction'];
				$dAddResponse = $rLoad['dAddResponse'];
				
                echo '<tr>';
				echo '<td>' . $dPayrollRemarks . '</td>';
				echo '<td>' . $dPayrollAction . ' </td>';
				echo '<td>' . $dAddResponse . ' </td>';
				
		        echo '</tr>'; 

			}
	?>
	</body>

</table>

