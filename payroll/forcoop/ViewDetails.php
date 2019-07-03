
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
		$fLoad = "Select distinct(cControlNumber) as cControlNumber,dDate,dMonth,dYear,dCutoff,dReason,dAddRemarks from cooptblpayroll  where cControlNumber = '" . trim($cControlNumber) . "'";
		$rsltLoad = mysql_query($fLoad) or die(mysql_error());
		while ($rLoad = mysql_fetch_array($rsltLoad))     
			{
				$nAutoNum = $rLoad['id'];
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
				echo '<td>' . $dAddRemarks . ' </td>';
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
		$fAllAPp = "Select distinct(vAppName) as vAppName, cStatus, dApprovedDate from tblappcoop where cControlNumber = '" . trim($cControlNumber) . "' order by nLevel asc";
		$rAllAPp = mysql_query($fAllAPp ) or die(mysql_error());
		while ($rowListAPprovers = mysql_fetch_array($rAllAPp)) 	    
			{
				$ApproverName = $rowListAPprovers['vAppName'];
				$cStatus = $rowListAPprovers['cStatus'];

				if ($rowListAPprovers['dApprovedDate']=='1900-00-00 00:00:00')
				{
					$dApproveDate = "";
				}
				else
				{$dApproveDate = $rowListAPprovers['dApprovedDate'];}

				echo '<tr>';
				echo '<td>' . $ApproverName . '</td>';
				echo '<td>' . $cStatus . '</td>';
				echo '<td>' . $dApproveDate . '</td>';
								
				echo '</tr>';                   
			}
	?>
	</body>

</table>




<font color='red'>( <i> NOTE: IF YOU ARE GOING TO REJECT REQUEST KINDLY PUT REMARK FIRST BEFORE CLICKING THE REJECT BUTTON!</i>)</font>
 
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>Remarks</th>
			<th>Action</th>
			
			<!--<th>Actions</th>-->
		</tr>
	</thead>
	<tbody>

                    
	
    <?php
     $sql = "SELECT * FROM cooptblpayroll where cControlNumber = '" . $cControlNumber. "'";
        $resultx = mysql_query($sql);
        $num_of_row = mysql_num_rows($resultx);
          {
        

        if (isset($_POST['submit']))
         {
            $id = $_POST['did'];
           
         	 $dHRDx = $_POST['dHRD'];
            
            
            $query = mysql_query("update cooptblpayroll set cRejectRemarks='$dHRDx' where id ='$id'");

           			
					
        }
  





echo '<form method="POST">';
while ($row = mysql_fetch_assoc($resultx))


         {



       echo '<tr>';      
      echo  ' <form class="form" method="post">';
      
     echo  ' <input type="hidden" name="did" value="'.$row['id'].'" readonly />';
   echo'<td><input type="text" name="dHRD" value ="'.$row['cRejectRemarks'].'" / > </td>';


      

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
