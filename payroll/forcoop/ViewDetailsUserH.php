<b>PAYROLL INQUIRY REQUEST DETAILS </b>
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
		$fLoad = "Select * from cooptblpayrollh where cControlNumber = '" . $cControlNumber . "'";
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
		$fAllAPp = "Select * from tblappcoop where cControlNumber = '" . $cControlNumber . "' ";
		$rAllAPp = mysql_query($fAllAPp ) or die(mysql_error());
		while ($rowListAPprovers = mysql_fetch_array($rAllAPp)) 	    
			{
				$ApproverName = $rowListAPprovers['vAppName'];
				$cStatus = $rowListAPprovers['cStatus'];

				if ($rowListAPprovers['dApprovedDate']=='1900-00-00 00:00:00')
				{
					$dApprovedDate = "";
				}
				else
				{$dApprovedDate = $rowListAPprovers['dApprovedDate'];}

				echo '<tr>';
				echo '<td>' . $ApproverName . '</td>';
				echo '<td>' . $cStatus . '</td>';
				echo '<td>' . $dApprovedDate . '</td>';
								
				echo '</tr>';                   
			}
	?>
	</body>

</table>


<b>HRD Response:</b>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>Remarks</th>
			
			
		</tr>
	</thead>
	<tbody>
	<?php
		$fLoad = "Select * from cooptblpayrollh where cControlNumber = '" . $cControlNumber . "'";
		$rsltLoad = mysql_query($fLoad) or die(mysql_error());
		while ($rLoad = mysql_fetch_array($rsltLoad))     
			{
				$nAutoNum = $rLoad['id'];
				
				$dHRDRemarks = $rLoad['dHRDRemarks'];
				$dPayrollAction = $rLoad['dPayrollAction'];
				$dAddResponse = $rLoad['dAddResponse'];
				
                echo '<tr>';
				echo '<td>' . $dHRDRemarks . '</td>';
				
		        echo '</tr>'; 

			}
	?>


	</body>

</table>



<b> Reject Response:</b>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>Remarks</th>
			
			
		</tr>
	</thead>
	<tbody>
	<?php
		$fLoads = "Select * from cooptblpayrollh where cControlNumber = '" . $cControlNumber . "'";
		$rsltLoads = mysql_query($fLoads) or die(mysql_error());
		while ($rLoads= mysql_fetch_array($rsltLoads))     
			{
				
				
				$cRejectRemarks = $rLoads['cRejectRemarks'];
				
				
                echo '<tr>';
				echo '<td>' . $cRejectRemarks . '</td>';
				
		        echo '</tr>'; 

			}
	?>


	</body>

</table>

