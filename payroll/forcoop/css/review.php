<?php
	session_start();
	include ('config.php');
	include ('MirFunctions.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GUESS? | Uniform Issuance</title>
<link rel="stylesheet" href="css/MirStyle.css" type="text/css" />
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="js/thickbox.css" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/thickbox.js"></script>
<script language="javascript" type="text/javascript">

<script>
function LoadEmployee(str)
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
			document.getElementById("vDepartment").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","s_LoadDept.php?q="+str,true);
		xmlhttp.send();
	}
	
function LoadInformation(str)
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
			document.getElementById("users").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","s_LoadInformation.php?q="+str,true);
		xmlhttp.send();
	}
</script>

</head>
<body>
	<div class="Center">
		<img src="../../Image/menu.png"><br>
		<?php include('Menu.php');?><br>
		<div class="BodyContent">
			<div class="BodyContentShow">
			** You may please enter either the employees name or department. 
       <form action="review.php" method="POST">
			<table>
            	<tr><td>Department</td><td>Name</td></tr>
                <tr><td><input type="text" name="vDepartment" maxlength="30" size="100px" ></td><td><input type="text" name="vName" maxlength="30" size="50px"></td><td><input type="submit" name="search" value="search"></td></tr>
            </table></form>
         
  <?php  
		error_reporting(0);
		
		$vName=$_POST['vName'];
		$vDepartment=$_POST['vDepartment'];

			
		$qryEmployeeView = "SELECT * from tUsers ";
		if ($vDepartment != '' || $vName != '' ) {
				$qryEmployeeView = $qryEmployeeView . "where ";
				
				if ($vName != '') {$qryEmployeeView = $qryEmployeeView . "vName like '%" . $vName  . "%' ";}
				
				if ($vName != '' && $vDepartment != '') {
					$qryEmployeeView = $qryEmployeeView . "and vDepartment like '%$vDepartment%' ";
					} else { if ($vDepartment != '') {$qryEmployeeView = $qryEmployeeView . "vDepartment like '%$vDepartment%'  ";}}
		}	
			$qryEmployeeView = $qryEmployeeView . " order by vname desc";

		$rsltEmployeeView = mysql_query($qryEmployeeView);
		while ($row = mysql_fetch_array($rsltEmployeeView))  {

			echo "<br>[ <a href=\"reviewresults.php?height=450&amp;width=1100&cIDNumber=" . $row['cIDNumber'] . "\" target=\"_blank\">" . $row['vName'] . "</a> ]</td>";
		}
	
			?>			

          		
        	</div>
		</div>
	</div>
	<center><br><div style=" font-size:10px; color:#800000; top:94%;"> Copyright &copy; 2016 Guess? I.T. Uniform Acquisition System™ | Raymir Kristoffer A. Pedrique </div>
</center>
</body>
</html>