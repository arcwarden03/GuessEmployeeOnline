<?php
	echo '<b>APPROVER DETAILS:</b>';
	echo '<br>';

	echo '<table class="table table-bordered table-striped">';
	echo '<thead>';
		echo '<tr>';
			echo '<th>Name</th>';
			echo '<th>Status</th>';
			echo '<th>Approve Date</th>';
		echo '</tr>';
	echo '</thead>';
	echo '<tbody>';
		$fillAPP = "Select * from tApprover where cSysID = '" . trim($cSysIDx) . "'";
		$rsltx = sqlsrv_query($conn, $fillAPP);
		while ($rowx = sqlsrv_fetch_array($rsltx))  
		{
			$apName = $rowx['vAppName'];
			$apStat = $rowx['cStatus'];
			$apDate = $rowx['dApproveDate'];

				if (trim($apDate)=='1900-01-01'){
					$apDate = 'N/A';
				} else {
					$apDate = $rowx['dApproveDate'];
				}

					echo '<tr>';
						echo '<td>' . $apName . '</td>';
						echo '<td>' . $apStat . '</td>';
						echo '<td>' . $apDate . '</td>';
					echo '</tr>';        	            
		}
	echo '</tbody>';
	echo '</table>';
	echo '</br>'
?>
