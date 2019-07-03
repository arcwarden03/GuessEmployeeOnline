<html>
<head>
    <title>EDIT Patient data</title>
</head>
<body> 
    <br>
    <a href="Patients.php">Edit Patients</a><br>
    <a href="PatientRequest.php">Patient Request</a><br>
    <a href="PatientConfirmed.php">Booked Patients</a>
    <?php
        
        $sql = "SELECT * FROM tblpayrolldetails;";
        $result = mysql_query($sql);
        $num_of_row = mysql_num_rows($result);

        if (isset($_GET['submit'])) {
            $id = $_GET['did'];
            $fname = $_GET['dfname'];
            $lname = $_GET['dlname'];
            $email = $_GET['demail'];
            $phone = $_GET['dphone'];
            $address = $_GET['daddress'];
            $query = mysql_query("update patients set fName='$fname', lName='$lname', email='email', phone='$phone', address='$address' where patientID ='$id'");
        }

        echo "<table border=1>";
        echo " <tr> <td> Patient ID </td>  ";
        echo "<td> First name </td>";
        echo "<td> last name </td>";
        echo "<td> email </td>";
        echo "<td> phone number</td>";
        echo "<td> address </td>";
        echo "<td> date of birth </td> ";
        echo "<td> update </td></tr>";

    


echo "<form method='GET'>";
while ($row = mysql_fetch_assoc($result)) {
      echo  "<tr> <form class='form' method='get'>";
      echo  "<td> <input type='text' name='did' value='".$row['patientID']."' readonly /></td>";
      echo  "<td> <input type='text' name='dfname' value ='".$row['fName']."' /></td>";
      echo  "<td> <input type='text' name='dlname' value = '".$row['lName']."' /></td>";
      echo  "<td> <input type='text' name='demail' value = '".$row['email']."' /></td>";
      echo  "<td> <input type='text' name='dphone' value = '".$row['phone']."' /></td>";
      echo  "<td> <input type='text' name='daddress' value ='".$row['address']."' /></td>";
      echo  "<td> <input type='text' name='ddob'  value ='".$row['dob']."' readonly /></td>"; 
      echo  "<td>  <input class='submit' type='submit' name='submit' value='update' /> </td> </tr>";
}
echo "</form>";


 ?>








</body>
</html>



 
   <?php
        
        $sql = "Select * from tblpayrolldetails";
        $result = mysql_query($sql);
        $num_of_row = mysql_num_rows($result);

        if (isset($_POST['submit'])) {
            $id = $_POST['did'];
            $fname = $_POST['dfname'];
          
            $query = mysql_query("update tblpayrolldetails set cIDNumber='$fname' where id ='$id'");
        }

        echo "<table border=1>";
        echo " <tr> <td> Patient ID </td>  ";
        echo "<td> First name </td>";
      
        echo "<td> update </td></tr>";

    

echo "<form method='POST'>";
while ($row = mysql_fetch_assoc($result)) {
      echo  "<tr> <form class='form' method='get'>";
      echo  "<td> <input type='text' name='did' value='".$row['id']."' readonly /></td>";
      echo  "<td> <input type='text' name='dfname' value ='".$row['cIDNumber']."' /></td>";

      echo  "<td>  <input class='submit' type='submit' name='submit' value='update' /> </td> </tr>";
}
echo "</form>";


 ?>





<?php
        
        $sql = "Select * from tblpayrolldetails";
        $result = mysql_query($sql);
        $num_of_row = mysql_num_rows($result);

      

        echo "<table border=1>";
        echo " <tr> <td> Patient ID </td>  ";
        echo "<td> First name </td>";
      
        echo "<td> update </td></tr>";

    

echo "<form method='POST'>";
while ($row = mysql_fetch_assoc($result)) {
      echo  "<tr> <form class='form' method='get'>";
      echo  "<td> <input type='text' name='did' value='".$row['id']."' readonly /></td>";
      echo  "<td> <input type='text' name='dfname' value ='".$row['cIDNumber']."' /></td>";

      echo  "<td>  <input class='submit' type='submit' name='submit' value='update' /> </td> </tr>";
}
echo "</form>";


 ?>



<?php

  if (isset($_POST['submit']))
   {
            $id = $_POST['did'];
            $fname = $_POST['dfname'];
          
            $query = mysql_query("update tblpayrolldetails set cIDNumber='$fname' where id ='$id'");
        }


?>




<?php


        $sql = "SELECT * FROM tblpayrolldetails where cControlNumber = '" . $cControlNumber. "'";
        $result = mysql_query($sql);
        $num_of_row = mysql_num_rows($result);
          {
        

        if (isset($_POST['submit']))
         {
            $id = $_POST['did'];
            $fname = $_POST['dfname'];
            
            
            $query = mysql_query("update tblpayrolldetails set dPayrollRemarks='$fname' where id ='$id'");
        }
  

echo '<form method="POST">';
while ($row = mysql_fetch_assoc($result))


         {
      echo  ' <form class="form" method="post">';
    
      echo  ' <input type="text" name="did" value="'.$row['id'].'" readonly />';
      echo  ' <input type="text" name="dfname" value ="'.$row['dPayrollRemarks'].'" />';

      echo '<td><input type="text" name="" value="'.$row['dPayrollRemarks'].'"></td>';
    
      echo  '<input class="submit" type="submit" name="submit" value="update"> ';
      echo '</form>';
        
        }

    

    }
                        


                        

 ?>






<?php


   if (isset($_POST['submit']))
{

 $id = $_POST['did'];
            $fname = $_POST['dfname'];
            
            
            $query = mysql_query("update tblpayrolldetails set dPayrollRemarks='$fname' where id ='$id'");

$retval = mysql_query($con,$sql );
if(! $retval )
{
  die('Could not update data: ' . mysql_error());
}
echo "Updated data successfully\n";


}



$result = mysql_query($con,"SELECT * FROM tblpayrolldetails ")
or die("Error: ".mysql_error($con));

while($row = mysql_fetch_array($result))
  {
  echo '<form action="" method="post">';
  echo '<div style="float:left">';
  echo '<table border="1" bordercolor="#000000">';
  echo '<tr>';
  echo '<td>link</td>';
  echo '<td><input type="text" name="did" value="'.$row['id'].'" readonly /></td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td>img</td>';
  echo '<td><input type="text" name="" value="'.$row['dPayrollRemarks'].'"></td>';
  echo '</tr>';
  echo '<tr>';

  echo '</table></div>';
  
 echo  "  <input class='submit' type='submit' name='submit' value='update' /> ";
  echo '</form><br /><br /><br /><br /><br /><br /><br /><br />';
  }



?>