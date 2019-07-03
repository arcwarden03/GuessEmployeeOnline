<?php
	include('DBConnect3.php');
	session_start();



  if(isset($_POST['submit2'])){


     
    $cIDnumber = $_SESSION['SESS_cIDNumber'];
    
    //$lname = mysqli_real_escape_string($conn,$_POST['lname']);

    $insert_query = "INSERT INTO tblpayroll (id,cControlNumber) VALUES ('$id','$cControlNumber')";
    
    if(mysqli_query($conn, $insert_query)) { ?>
      <script>window.location = 'shuji.php'</script>
      
     
    } 
  }
    
      <?php
    }
  }

?> 

<!-- -->






	
	

?>