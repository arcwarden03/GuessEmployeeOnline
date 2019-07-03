<?php
                       include('DBConnect4.php');
                        session_start();
                       
                        $query = "SELECT * from cooptemptable where cidnumber = '" . $_SESSION['SESS_cIDNumber'] . "'"; 
                        
                        $result = mysql_query($query) or die(mysql_error());
                        $maxi=mysql_num_rows($result);

                        while ($row = mysql_fetch_array($result)){
                            //get id data for removing by line
                          $cSysIDx = $row['EmployeeID'];
                           $dDate = trim($row['dDate']);
                              $dReason = trim($row['dReason']);


                    echo"<tr>";
                    echo" <td><font size=\"2px\">$row[EmployeeID] <br>
                    $row[vName]</font></td>";
                    
                    echo"<td>";

                    echo"<div class=\"form-group\">";

                    echo"<font size=\"2px\">  $row[dDate]</font><br>";
                    echo"<font size=\"2px\">  $row[dReason]</font>";

                    echo"<br>";
                    echo"<font size=\"2px\"> Cutoff: $row[dMonth] , $row[dYear] - $row[dCutoff]</font>";



                    echo"</div>";


                    echo"</td>";


                    echo" <td><font size=\"2px\">$row[dAddRemarks] <br>
                    </font></td>";
                    


                   echo"<td>";
              

                   echo'<form method="GET" action="RemoveQue.php" role="form">
                                              <input type="text" style="display:none;" name="hID" value="' . rtrim($row['EmployeeID']) . '">
                                              <input type="text" style="display:none;" name="hDate" value="' . rtrim($row['dDate']) . '">
                                              <input type="text" style="display:none;" name="hReason" value="' . rtrim($row['dReason']) . '">
                                              <button type="submit" name="btndel" class="btn btn-danger btn-xs">
                                                  <i class="fa fa-times"></i> Remove
                                              </button>
                                          </form>';

                   
                     echo"</td>";


                     echo"</tr>";



                    echo"";

}





              ?>