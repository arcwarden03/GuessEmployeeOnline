
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>Date</th>
			<th>Month & Year</th>
			<th>CutOff</th>
			<th>Nature of Inquiry</th>
			<th>Additional Remarks</th>
			
		</tr>
	</thead>
	<tbody>
	<?php
		$fLoad = "Select * from cooptblpayroll where cControlNumber = '" . $cControlNumber . "'";
		$rsltLoad = mysql_query($fLoad) or die(mysql_error());
		while ($rLoad = mysql_fetch_array($rsltLoad))     
			{
				$nAutoNum = $rLoad['id'];
				
				$dDate = $rLoad['dDate'];
				$dMonth = $rLoad['dMonth'];
				$dYear = $rLoad['dYear'];
				$dCutoff = $rLoad['dCutoff'];
				$dReason = $rLoad['dReason'];
				$dAddRemarks = $rLoad['dAddRemarks'];
				   
                echo '<tr>';
				echo '<td>' . $dDate . '</td>';
				echo '<td>' . $dMonth . ' , ' . $dYear. '  </td>';
				echo '<td>' . $dCutoff . ' of the Month</td>';
				echo '<td>' . $dReason . ' </td>';
				echo '<td>' . $dAddRemarks. ' </td>';
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
		$fAllAPp = "Select * from tblappcoop where cControlNumber = '" . $cControlNumber . "' order by nLevel asc";
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
