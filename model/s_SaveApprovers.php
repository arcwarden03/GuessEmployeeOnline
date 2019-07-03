<?php
session_start();
include('../views/Auth.php');
include ('../config/dbconfig-SQL.php');

$qryDelete = "delete from tOnlineGlobalApproval where cidnumber = '" . $_SESSION['SESS_cIDNumber'] . "'";
$rDelete=sqlsrv_query($conn, $qryDelete);
					/*----------------------------------------------*/
					//save approvers
					$cnt=1;
					$approvers=0;
					$nLevel = 0;
						while ($cnt<=5)
						{
							if(isset($_POST['App' . $cnt]))
							{

								$App[] = $_POST['App' . $cnt];
								if ($_POST['App' . $cnt] == 'N/A' || $_POST['App' . $cnt] == '')
								{

								}
								else
								{
									$nLevel = $nLevel + 1;

									$qryAdd ="insert into tOnlineGlobalApproval (cIDNumber, vAppName, nLevel) ";
									$qryAdd = $qryAdd . "Values (";
									$qryAdd = $qryAdd . "'" . $_SESSION['SESS_cIDNumber'] . "',";
									$qryAdd = $qryAdd . "'" . $_POST['App' . $cnt] . "',";
									$qryAdd = $qryAdd . "'" . $nLevel . "')";	
									$qryAddResult=sqlsrv_query($conn, $qryAdd);
									$approvers = $approvers + 1;
								}
							}
								$cnt = $cnt + 1;
						}
						if ($approvers==0)
						{
							$_SESSION['U_ErrorMessage'] = "Unable to save Approvers! please call IT for support";
							session_write_close();
							header("location: ../views/globalapprovals.php");	
						}
						else
						{
							$_SESSION['U_ValidMessage'] = "Approver(s) successfully saved.";
							session_write_close();
							header("location: ../views/globalapprovals.php");
						}

		

?>


