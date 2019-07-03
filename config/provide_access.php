<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 <!-- Alertify -->
 <link rel="stylesheet" href="../themes/alertify.core.css" />
 <link rel="stylesheet" href="../themes/alertify.default.css" id="toggleCSS" />
<title>Login Check</title>
</head>
	
<?php

	session_start();


	switch(trim($_SESSION['SESS_cU_AccountType']))
		{
			case "User":
			header("location: ../accounts/usr/views/rnf-usr_page.php");
			break;
			exit();
			case "Approver":
			header("location: ../accounts/app/views/app-usr_page.php");
			break;
			exit();
			case "COO":
			header("location: ../accounts/coo/views/coo-usr_page.php");
			break;
			exit();
		}

?>

<body>
</body>
</html>
