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
		$fillAPP = "Select * from tApproverH where cSysID = '" . trim($cSysIDx) . "'";
		$rsltx = sqlsrv_query($conn, $fillAPP);
		while ($rowz = sqlsrv_fetch_array($rsltx))  
		{
			$apName = $rowz['vAppName'];
			$apStat = $rowz['cStatus'];
			$apDate = $rowz['dApproveDate'];

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
