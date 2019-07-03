

       
 <table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>Date</th>
			<th>Nature of Inquiry</th>
			<th>Payroll Remarks</th>
			<th>Payroll Action</th>
			<th>Additional Response</th>
			<th>HRD Remarks</th>
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
				$dHRDRemarks = $rLoad['dHRDRemarks'];


				 $x = Mir('encrypt', $cControlNumber);  
				   
                echo '<tr>';
				echo '<td>' . $dDate . '<br>
				' . $dMonth . '  ' . $dYear. ' <br>
				' . $dCutoff . '
				</td>';
				
					echo '<td>' . $dReason . ' </td>';

					echo '<td>' . $dPayrollRemarks . ' </td>';
					echo '<td>' . $dPayrollAction . ' </td>';
					echo '<td>' . $dAddResponse. ' </td>';
					echo '<td>' . $dHRDRemarks. ' </td>';


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
			<th>Filed Request</th>
			<th>Payroll Remarks</th>
			<th>Payroll Action</th>
			<th>Additional Response</th>
			<th>Option</th>
			<!--<th>Actions</th>-->
		</tr>
	</thead>
	<tbody>

                    
	
    <?php
     $sql = "SELECT * FROM tblpayrolldetails where cControlNumber = '" . $cControlNumber. "'";
        $resultx = mysql_query($sql);
        $num_of_row = mysql_num_rows($resultx);
          {
        

        if (isset($_POST['submit']))
         {
            $id = $_POST['did'];
            $dRemarksx = $_POST['dRemarks'];
            $dActionx = $_POST['dAction'];
         	 $dAddx = $_POST['dAdd'];
            
            
            $query = mysql_query("update tblpayrolldetails set dPayrollRemarks='$dRemarksx',dPayrollAction='$dActionx',dAddResponse='$dAddx' where id ='$id'");
        }
  


while ($row = mysql_fetch_assoc($resultx))


         {



       echo '<tr>';      
      echo  ' <form class="form" method="post">';
       echo '<td>' . $row['dDate'] .' <br> '.$row['dReason'] . '</td>';
  
     




        echo  ' <input type="hidden" name="did" value="'.$row['id'].'" readonly />';


//payroll remarks
      
        //echo  '<td> <input type="text" name="dRemarks" value ="'.$row['dPayrollRemarks'].'" / > 


echo  '<td>

				 
                    <select class="form-control select" name="dRemarks" value ="'.$row['dPayrollRemarks'].'" / style="width:150px;"> 
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
                     <option name="1" value="Due to late approval of leave">No Remarks needed.</option>

                    </option>

                    </select>

                   
 </td>
        ';
 

 //payroll remarks


 //payroll action       

        //echo  ' <td><input type="text" name="dAction" value ="'.$row['dPayrollAction'].'" / >



 echo' <td>
		          
                   <select class="form-control select" name="dAction" value ="'.$row['dPayrollAction'].'" / style="width:150px;">
                   	<option name="1" value="">Select Remarks</option>	
                    <option name="1" value="Salary Adjusted">Salary Adjusted</option>
                    <option name="1" value="Not for Salary adjustment">Not for Salary adjustment</option>
                    <option name="1" value="Pending for Salary Adjustment">Pending for Salary Adjustment</option>
                    </option>

                    </select>

                   

					 </td>';    

//payroll action


//payroll response


         echo  ' <td><input type="text" name="dAdd" value ="'.$row['dAddResponse'].'" / style="width:150px;"> </td>';    

//payroll response





      echo  '<td>

     <button type="submit" type="submit" name="submit" class="btn btn-primary">Update Request</button>


       </td> ';
      echo '</form>';
        

echo '</tr>'; 








        }

    

    }








    ?> 



	</body>

</table>


  
















