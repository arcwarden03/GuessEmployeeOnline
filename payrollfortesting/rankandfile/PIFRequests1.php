<?php
include ('../model/MirFunctions.php');
include('header.php');
?>
      <ol class="breadcrumb">
        <li class="Active"><a href="usr_page.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <!--<li class="active">Modals</li>-->
      </ol>
    </section>
    <section class="content container-fluid"> 
  <!--Active requests-->
  <div class="box box-danger">
    <div class="box-header"><h3 class="box-title">Pending Requests</h3></div>
          <div class="box-body">
            <table id="" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Control Number</th>
                  <th>Request Date</th>
                  <th>Where is my request?</th>
                  <th>Options</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $functionqry = "Select * from tTransactionmir where cIDNumber = '" . $_SESSION['SESS_cIDNumber'] . "'";
                  $result = mysql_query($functionqry ) or die(mysql_error());
                  $maxi=mysql_num_rows($result);
                  while ($row = mysql_fetch_array($result))     
                  {
                      $nAutoNum = $row['nAutoNum'];
                      $cControlNumber = $row['cControlNumber'];
                      $dRequestDate = $row['dRequestDate'];
                      $cCurrentServer = $row['cCurrentServer'];

                    echo '<tr>';
                    echo '<td>' . $cControlNumber . '</td>';
                    echo '<td>' . $dRequestDate . '</td>';
                    echo '<td>' . $cCurrentServer . '</td>';
                    echo '<td><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#message' . $nAutoNum  . '"><i class="fa fa-file-text-o"></i> View Details</button>';

                  /*--------------------------BEGIN MODAL----------------------------------------*/
                  /*--------------------------this handles the pop up message--------------------*/
                    echo '<div id="message' . $nAutoNum . '" class="modal fade" role="dialog">
                <div class="modal-dialog"  style="width:1000px">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Request Details</h4>
                    </div>
                    <div class="modal-body">
                      <strong>Control Number: </strong> ' . $cControlNumber  . '<br><br>';

                      include ('rnf-ShowFiledusr.php');
                      echo '<br><br>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                  </div>

                </div>
              </div></td>';

              /*--------------------------END MODAL----------------------------------------*/

                   echo '</tr>';                   
                  } 


                ?>
              </body>
            </table>
        </div>
    </div>


<!--Served requests-->
  <div class="box box-danger">
    <div class="box-header"><h3 class="box-title">Archived/Served Requests</h3></div>
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Control Number</th>
                  <th>Request Date</th>
                  <th>Date Fullfiled</th>
                  <th>Options</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $functionqry = "Select * from tTransactionmirh where cIDNumber = '" . $_SESSION['SESS_cIDNumber'] . "' order by dRequestDate desc";
                  $result = mysql_query($functionqry ) or die(mysql_error());
                  $maxi=mysql_num_rows($result);
                  while ($row = mysql_fetch_array($result))     
                  {
                      $nAutoNum = $row['nAutoNum'];
                      $cControlNumber = $row['cControlNumber'];
                      $dRequestDate = $row['dRequestDate'];
                      $cCurrentServer = $row['cCurrentServer'];
                      $cApprover1 = $row['cApprover1Status'];
                      $cHRDApprover = $row['cHRDApprover'];
                      $dDateDelivered = $row['dDateDelivered'];


                    echo '<tr>';
                    echo '<td>' . $cControlNumber . '</td>';
                    echo '<td>' . $dRequestDate . '</td>';
                    echo '<td>' . $dDateDelivered . '</td>';
                    echo '<td><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#message' . $nAutoNum  . '"><i class="fa fa-file-text-o"></i> View Details</button>';


                  /*--------------------------BEGIN MODAL----------------------------------------*/
                  /*--------------------------this handles the pop up message--------------------*/
                    echo '<div id="message' . $nAutoNum . '" class="modal fade" role="dialog">
                <div class="modal-dialog"  style="width:1000px">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Request Details</h4>
                    </div>
                    <div class="modal-body">
                      <strong>Control Number: </strong> ' . $cControlNumber  . '<br><br>';

                      include ('rnf-ShowFiledusrh.php');
                      echo '<br><br>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                  </div>

                </div>
              </div></td>';

              /*--------------------------END MODAL----------------------------------------*/
                    echo '</tr>';   


                  }
                ?>
              </body>
            </table>
        </div>
    </div>


      <!--this section will show all details-->
        <div class="modal fade" id="modal-default">
          <div class="modal-dialog" style="width: 80%">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Details</h4>
              </div>
              <div class="modal-body">
                <p>

                <?php
                  $functionqry = "Select * from tTransactionmir where cIDNumber = '" . $_SESSION['SESS_cIDNumber'] . "' order by dRequestDate desc";
                  $result = mysql_query($functionqry ) or die(mysql_error());
                  $maxi=mysql_num_rows($result);
                  while ($row = mysql_fetch_array($result))     
                  {
                      $nAutoNum = $row['nAutoNum'];
                      $cControlNumber = $row['cControlNumber'];
                      $dRequestDate = $row['dRequestDate'];
                      $cCurrentServer = $row['cCurrentServer'];
                      $cApprover1 = $row['cApprover1Status'];
                      $cHRDApprover = $row['cHRDApprover'];

                    echo '<tr>';
                    echo '<td>' . $cControlNumber . '</td>';
                    echo '<td>' . $dRequestDate . '</td>';
                    echo '<td>' . $cApprover1 . '</td>';
                    echo '<td>' . $cHRDApprover . '</td>';
                    echo '<td><a href="showDetails.php?height=450&amp;width=500&x=' . $nAutoNum . '" class="thickbox Actions" title="View request details.">[View Details]</a></td>';
                    echo '</tr>';                   
                  }
                ?>

               </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
<?php 

include ('footer.php');
?>