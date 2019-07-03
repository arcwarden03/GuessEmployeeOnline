
 <table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>Date</th>
			<th>Nature of Inquiry</th>
			<th>HRD REMARKS</th>
			
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
				$dHRDRemarks = $rLoad['dHRDRemarks'];
				


				 $svtx = Mir('encrypt', $cControlNumber);  
				   
                echo '<tr>';
				echo '<td>' . $dDate . '<br>
				' . $dMonth . '  ' . $dYear. ' <br>
				' . $dCutoff . '
				</td>';
				
					echo '<td>' . $dReason . ' </td>';

				echo '<td>' . $dHRDRemarks . ' </td>';
					


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
			<th>HRD Remarks</th>
			<th>HRD Action</th>
			
			<!--<th>Actions</th>-->
		</tr>
	</thead>
	<tbody>

                    
	
    <?php
     $sql = "SELECT distinct(id),(dDate),(dReason) FROM tblpayrolldetails where cControlNumber = '" . $cControlNumber. "'";

  // "select distinct(dRequestDate),(vDepartment) from cooptblpayroll where cControlNumber in (select cControlNumber from tblappcoop where vAppName = '" . trim($_SESSION['SESS_vName']) . "' and cStatus = 'PENDING' ) order by dRequestDate desc ";


        $resultx = mysql_query($sql);
        $num_of_row = mysql_num_rows($resultx);
          {
        

        if (isset($_POST['submit']))
         {
            $id = $_POST['did'];
           
         	 $dHRDx = $_POST['dHRD'];
            
            
            $query = mysql_query("update tblpayrolldetails set dHRDRemarks='$dHRDx' where id ='$id'");
        }
  





echo '<form method="POST">';
while ($row = mysql_fetch_assoc($resultx))


         {



       echo '<tr>';      
      echo  ' <form class="form" method="post">';
      echo '<td>' . $row['dDate'] . '</td>';
        echo '<td>' . $row['dReason']. '</td>';
     




        echo  ' <input type="hidden" name="did" value="'.$row['id'].'" readonly />';




         echo  '




          <td><input type="text" name="dHRD" value ="'.$row['dHRDRemarks'].'" / > </td>


          ';    






      echo  '<td>

     <button type="submit" type="submit" name="submit" class="btn btn-primary">Add Remarks</button>





       </td> ';
      echo '</form>';
        

echo '</tr>'; 



 
				

		









        }

    

    }








    ?> 



	</body>

</table>

























