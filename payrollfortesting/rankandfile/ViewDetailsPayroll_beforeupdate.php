
 <table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>Date</th>
			<th>Nature of Inquiry</th>
			<th>Payroll Remarks</th>
			<th>Payroll Action</th>
			<th>Additional Response</th>
			<!--<th>Actions</th>-->
		</tr>
	</thead>
	<tbody>
	
	<?php
		$fLoad = "Select * from tblpayrolldetails  where cControlNumber = '" . $cControlNumber . "'";
		$rsltLoad = mysql_query($fLoad) or die(mysql_error());
		while ($rLoad = mysql_fetch_array($rsltLoad))     
			{
				$nAutoNum = $rLoad['id'];
				
				$dDate = $rLoad['dDate'];
				$dMonth = $rLoad['dMonth'];
				$dYear = $rLoad['dYear'];
				$dCutoff = $rLoad['dCutoff'];
				$dReason = $rLoad['dReason'];
				$dPayrollRemarks = $rLoad['dPayrollRemarks'];
				$dPayrollAction = $rLoad['dPayrollAction'];
				$dAddResponse= $rLoad['dAddResponse'];
				$cControlNumber = $rLoad['cControlNumber'];


				 $svtx = Mir('encrypt', $cControlNumber);  
				   
                echo '<tr>';
				echo '<td>' . $dDate . '<br>
				' . $dMonth . '  ' . $dYear. ' <br>
				' . $dCutoff . '
				</td>';
				
					echo '<td>' . $dReason . ' </td>';

					echo '<td>' . $dPayrollRemarks . ' </td>';
					echo '<td>' . $dPayrollAction . ' </td>';
					echo '<td>' . $dAddResponse. ' </td>';


				 echo '</tr>'; 


				}
	?>
	</body>

</table>
<hr>











 <b>APPROVER STATUS:</b>
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


 <table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>Date</th>
			<th>Nature of Inquiry</th>
			<th>Payroll Remarks</th>
			<th>Payroll Action</th>
			<th>Additional Response</th>
			<!--<th>Actions</th>-->
		</tr>
	</thead>
	<tbody>
	
	<?php
		$fLoad = "Select * from tblpayrolldetails  where cControlNumber = '" . $cControlNumber . "'";
		$rsltLoad = mysql_query($fLoad) or die(mysql_error());
		while ($rLoad = mysql_fetch_array($rsltLoad))     
			{
				$nAutoNum = $rLoad['id'];
				
				$dDate = $rLoad['dDate'];
				$dMonth = $rLoad['dMonth'];
				$dYear = $rLoad['dYear'];
				$dCutoff = $rLoad['dCutoff'];
				$dReason = $rLoad['dReason'];
				$cControlNumber = $rLoad['cControlNumber'];


				 $svtx = Mir('encrypt', $cControlNumber);  
				   
                echo '<tr>';
				echo '<td>' . $dDate . '<br>
				' . $dMonth . '  ' . $dYear. ' <br>
				' . $dCutoff . '
				</td>';
				
				echo '<td>' . $dReason . ' </td>';
		       

				//payroll remarks

		          echo '<td>';



		          
		          echo '  <div class="col-sm-10">
                    <select class="form-control select" name="dReason"  name="vHRDRemarks" OnChange="UpdateHRRemarks(this.value,\'' . $cControlNumber . '\')">";
                     <option name="1" value="">Select Remarks</option>	
                    <option name="1" value="Due to late approval of leave">Due to late approval of leave</option>
                    <option name="1" value="Due to wrong date filed leave">Due to wrong date filed leave</option>
                    <option name="1" value="Due to wrong filed half-day leave">Due to wrong filed half-day leave</option>

                    <option name="1" value="Due to late filling and late approval of OT">Due to late filling and late approval of OT</option>

                    <option name="1" value="Due to late approval of OT">Due to late approval of OT</option>
                    <option name="1" value="Due to late submission of approved DAS">Due to late submission of approved DAS</option>

                    <option name="1" value="Due to late submission of approved Guard logsheet">Due to late submission of approved Guard logsheet</option>

                    <option name="1" value="Due to late submission of approved Incident Report">Due to late submission of approved Incident Report</option>

                    <option name="1" value="Due to incomplete time entries (no log in/out)">Due to incomplete time entries (no log in/out)</option>
                    

                    <option name="1" value="Due to scheduled suspension but reported for work">Due to scheduled suspension but reported for work</option>

					<option name="1" value="Due to wrong coffee break in/out">Due to wrong coffee break in/out</option>
                    
                    <option name="1" value="Due to wrong lunch break in/out">Due to wrong lunch break in/out</option>
                    <option name="1" value="Due to wrong shift set up">Due to wrong shift set up</option>
                    <option name="1" value="Due to wrong day-off set up">Due to wrong day-off set up</option>
                    <option name="1" value="Due to less 4 hours work,considered as 1 day absent">Due to less 4 hours work,considered as 1 day absent</option>
                    <option name="1" value="Due to undertime more than 2 hours,considered as 1 day absent">Due to undertime more than 2 hours,considered as 1 day absent</option>
                     <option name="1" value="Incomplete attachment / no online filed">Incomplete attachment / no online filed</option>

                    </option>

                    </select>

                     </div>';

					 echo'</td>';
		      
					 //payroll remarks


		       //payroll action
		          
		          echo'<td>';
		           echo '  <div class="col-sm-10">
                   <select class="form-control select" name="dReason"  name="vHRDRemarks" OnChange="UpdateHRRemarks2(this.value,\'' . $cControlNumber . '\')">";
                   	<option name="1" value="">Select Remarks</option>	
                    <option name="1" value="Salary Adjusted">Salary Adjusted</option>
                    <option name="1" value="Not for Salary adjustment">Not for Salary adjustment</option>
                    <option name="1" value="Pending for Salary Adjustment">Pending for Salary Adjustment</option>
                    </option>

                    </select>

                     </div>';

					 echo'</td>';

				
					   
					  //payroll action


					   //payroll additional response
					 echo '<td>';

		            echo '  
		            <div class="col-sm-10">
                   <input type="text" value="" class="form-control" id="exampleInputEmail1" placeholder="Enter Response" OnChange="UpdateHRRemarks3(this.value,\'' . $cControlNumber . '\')">

                    </select>
                    </div>
                    ';

					 echo'</td>';

					 //payroll additional response
		         
		
					 echo'<td>';
					 echo'<form method="GET" action="UpdatePayroll.php">
    
                      <input type="hidden" value="' . $x  . '" name="y">
                      <button type="submit" class="btn btn-primary">Update Request</button>
                      </form>';


					 echo'</td>';





				 echo '</tr>'; 


				}
	?>
	</body>

</table>
<hr>



















