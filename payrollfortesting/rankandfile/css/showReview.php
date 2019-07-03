<?php
	include ('config.php');
	include ('Auth.php');
	include ('MirFunctions.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GUESS? | Uniform Issuance</title>
<link rel="stylesheet" href="../Approver/css/MirStyle.css" type="text/css" />

<link rel="stylesheet" type="text/css" href="../Approver/thickbox.css" />
<script language="javascript" type="text/javascript" src="../Approver/js/thickbox/jquery.js"></script> 
<script language="javascript" type="text/javascript" src="../Approver/js/thickbox/thickbox.js"></script>

<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}

function UpdateStyle(str,num)
	{
		var xmlhttp;
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("x").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","s_UpdateStyle.php?q="+str+"&y="+num,true);
		xmlhttp.send();
		
	}

function UpdateStatus(str,num)
	{
		var xmlhttp;
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("y").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","s_UpdateStatus.php?q="+str+"&y="+num,true);
		xmlhttp.send();
		
	}


</script>
</head>
<body>
	<div class="BodyContent">
		<div class="BodyContentShow"><center><h3 style="color:#800000">REQUEST DETAILS</h3></center>
		
			<?php
				$cID = $_GET['x'];
				$query = "SELECT * from ttransactionmirh where nautonum = " . $cID . ""; 
				$result = mysql_query($query) or die(mysql_error());
				$maxi=mysql_num_rows($result);
				while ($row = mysql_fetch_array($result))  
					{
						$nAutoNum = $row['nAutoNum'];
						$cIDNumber = $row['cIDNumber'];
						$Company = $row['cCompany'];
						$vName = $row['vName'];
						$vDepartment = $row['vDepartment'];
						@$cUsername = $row['cUsername'];
						@$cPassword = $row['cPassword'];
						@$cType = $row['cType'];
						@$cWorkBase = $row['cBase'];
						$vDesignation = $row['vDesignation'];
						$cControlNumber= $row['cControlNumber'];
						$cApprover1 = nl2br($row['cApprover1']);
						$dApprover1 = nl2br($row['dApprover1']);
						$cApprover1Status = $row['cApprover1Status'];
						$cHRDApprover = $row['cHRDApprover'];
						$dHRApprover1 = nl2br($row['dHRApprover1']);
						@$cWHSApprover1 = $row['cWHSApprover1'];
						$dRequestDate = $row['dRequestDate'];
						$dDateDelivered = $row['dDateDelivered'];
						$vHRApprover1Remarks = $row['vHRApprover1Remarks'];
					}
			?>
		
			
			<form method="POST" action="../Approver/s_UpdateUser.php">
			<br>
			<table width="100%" border="0px">
				<tr><td class="RequestLabel" style="width: 180px">Request Date</td><td class="ResultLabel"><input name="Company" type="text" class="ResultLabel" style="width:400px;" value="<?php echo $dRequestDate; ?>" readonly="readonly"></td></tr>
				<tr><td class="RequestLabel" style="width: 180px">Release/Archive Date</td><td class="ResultLabel"><input name="Company" type="text" class="ResultLabel" style="width:400px;" value="<?php echo $dDateDelivered; ?>" readonly="readonly"></td></tr>

			</table>
			<br>
			<table width="100%" border="0px">
				<tr><td class="RequestLabel" style="width: 180px">Company</td><td class="ResultLabel"><input name="Company" type="text" class="ResultLabel" style="width:400px;" value="<?php echo $Company; ?>" readonly="readonly"></td></tr>
				<tr><td class="RequestLabel" style="width: 180px">Control Number</td><td class="ResultLabel"><input name="cControlNumber" type="text" class="ResultLabel" style="width:400px;" value="<?php echo $cControlNumber; ?>" readonly="readonly"></td></tr>
				<tr><td class="RequestLabel" style="width: 180px">ID Number</td><td class="ResultLabel"><input name="cIDNumber" type="text" class="ResultLabel" style="width:400px;" value="<?php echo $cIDNumber; ?>"  readonly="readonly"></td></tr>
				<tr><td class="RequestLabel" style="width: 180px">Full Name</td><td class="ResultLabel"><input name="vName" type="text" class="ResultLabel" style="width:400px;" value="<?php echo $vName; ?>" readonly="readonly"></td></tr>
				<tr><td class="RequestLabel" style="width: 180px">Department</td><td class="ResultLabel"><input name="vDepartment" type="text" class="ResultLabel" style="width:400px;" value="<?php echo $vDepartment; ?>" readonly="readonly"></td></tr>
				<tr><td class="RequestLabel" style="width: 180px">Designation</td><td class="ResultLabel"><input name="vDesignation" type="text" class="ResultLabel" style="width:400px;" value="<?php echo $vDesignation; ?>" readonly="readonly"></td></tr>
			</table>
			
			<br>
			<table width="100%" border="0px">
			<tr><td class="RequestLabel" style="width: 10%; text-align:center;">Style</td>
				<td class="RequestLabel" style="width: 5%; text-align:center;">QTY</td>
				<td class="RequestLabel" style="width: 5%; text-align:center;">Size</td>
				<td class="RequestLabel" style="width: 15%; text-align:center;">WHS Allocated Style</td>
				<td class="RequestLabel" style="width: 20%; text-align:center;">WHS Status</td>
				<td class="RequestLabel" style="width: 20%; text-align:center;">WHS Approver STS</td>

</tr>
				
				<?php	
					$functionqry = "Select * from tTransactionmirDetailedh where cControlNumber = '" . $cControlNumber . "'";
					$result = mysql_query($functionqry ) or die(mysql_error());
					while ($row = mysql_fetch_array($result)) 		
						{
							$cAutoNum = $row['nAutoNum'];
							$cStyle = $row['cStyle'];
							$nQuantity = $row['nQuantity'];
							$cSize = $row['cSize'];
							$vRemarks = $row['vRemarks'];
							$vWhsRemarks = $row['vWhsRemarks'];
							$cStatus = $row['cStatusWHS'];
							$cDIVStatus = $row['cDIVStatus'];
							
							
							echo '<tr class="trSelection" style="text-align:center">';
							echo '<td style="width:20px;">' . $cStyle . '</td>';
							echo '<td style="width:100px;">' . $nQuantity . '</td>';
							echo '<td style="width:100px;">' . $cSize . '</td>';
							echo '<td style="width:100px;">' . $vWhsRemarks . '</td>';
							echo '<td style="width:100px;">' . $cStatus . '</td>';
							echo '<td style="width:100px;">' . $cDIVStatus . '</td>';
							echo '</tr>';
						}
				?>
			
			</table>

			<br>
			<table width="100%" border="0px">	
				<tr><td class="RequestLabel" style="width: 180px">Immediate Superior Approval</td><td class="ResultLabel"><input name="cApprover1" type="text" class="ResultLabel" style="width:400px;" value="<?php echo $cApprover1; ?>"  readonly="readonly"></td></tr>
				<tr><td class="RequestLabel" style="width: 180px">Status</td><td class="ResultLabel"><input name="cApprover1" type="text" class="ResultLabel" style="width:400px;" value="<?php echo $cApprover1Status . "- [" . $dApprover1 . "]"; ?>" readonly="readonly"></td></tr>
				<tr><td class="RequestLabel" style="width: 180px">HRD Manager Approval Status</td><td class="ResultLabel"><input name="cApprover2" type="text" class="ResultLabel" style="width:400px;" value="<?php echo $cHRDApprover . "- [" . $dHRApprover1 . "]"; ?>"  readonly="readonly"></td></tr>
			</table>
			<br>
			<p class="RequestLabel">HRD Remarks</p>
			<?php 
				echo $vHRApprover1Remarks;
			?>
			</form>
		</div>
	</div>
		<br><center>
		</center>
</body>
</html>