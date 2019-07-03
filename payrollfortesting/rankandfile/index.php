<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <link rel="stylesheet" href="css/style.css">

  <script src="jquery/jquery.min.js"></script>
  <script src="jquery/bootstrap.min.js"></script>
     <!-- Alertify -->
  <link rel="stylesheet" href="plugins/alertify/alertify.core.css">
  <link rel="stylesheet" href="plugins/alertify/alertify.default.css">
  <!-- alertify script -->
  <script src="plugins/alertify/alertify.js"></script>
  <script src="plugins/alertify/alertify.min.js"></script> 
</head>

<body>

  <div class="login-screen">
  <div class="left-item">
    <div class="login-panel">
      <div class="inner-login-panel">
        <div class="content-panel">
          <h3 class="title"><p><img src="Image/my_logo.png" style="height: 70%; width: 60%"></p>Sign In</h3>
		  <form method="POST" action="loginexec.php">
            <input type="text" name="cUsername" placeholder="USERNAME" />
            <input type="password" name="cPassword" placeholder="PASSWORD" />
            <input type="submit" value="Log-In"></input>
          </form>
          <br>
          <p style="color: red; font-style: italic; font-size:12px">
          <?php
          if (isset($_SESSION['U_ErrorMessage']))
          {
            echo '<script>alertify.error(\'' . $_SESSION['U_ErrorMessage'] . '\');</script>'; 
            echo $_SESSION['U_ErrorMessage'];
          	unset($_SESSION['U_ErrorMessage']);
          }
          else
          {
          	echo '';
          }
          ?>
      	</p>
        </div>
      </div>
    </div>
  </div>

  <div class="right-item">
    <div class="slider-panel">
      <div class="inner-slider-panel">
        <!--<h1>Logo</h1>-->
        <h1>Employee Management System</h1>
      </div>
    </div>
      <center>
  		<br><div style=" font-size:10px; color:#800000; top:94%;"> Copyright &copy; 2018 Guess? I.T. Employee System™ | Raymir Kristoffer A. Pedrique </div>
  	</center>
  </div>
</div>
</div>


</body>
</html>
