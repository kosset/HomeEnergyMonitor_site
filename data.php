<?php
  include "header.php";
?>

<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php">ΟΕΗΕ&trade;</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="home.php"><span class="glyphicon glyphicon-home"></span> Αρχική</a></li>
        <li class="active"><a href="data.php"><span class="glyphicon glyphicon-dashboard"></span> Μετρήσεις</a></li>
        <li><a href="about.php"><span class="glyphicon glyphicon-info-sign"></span> Πληροφορίες</a></li>
        <li><a href="contact.php"><span class="glyphicon glyphicon-envelope"></span> Επικοινωνία</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>

<div id="wrapper">

  <!-- Sidebar -->
  <div id="sidebar-wrapper">
    <div class="sidebar-nav">

      <div class="sidebar-brand">
        Ρυθμίσεις
        <button href="#menu-toggle" id="menu-toggle2"><span class="glyphicon glyphicon-remove-circle"></span></button>
      </div>
      <form role="form" action="loadFromDB.php" method="post" id="sidebar-form">
        <p>Επιλέξτε ποια/ες θέλετε να δείτε:</p>
        <div class="form-group">
          <div class="checkbox">
          <label><input id="vrmsID" type="checkbox" name="vrms" value="vrms" >Τάση (rms)</label>
          <label><input id="vrmslowID" type="checkbox" name="vrmslow" value="vrmslow">min</label>
          <label><input id="vrmshighID" type="checkbox" name="vrmshigh" value="vrmshigh">max</label>
          </div>
          <div class="checkbox">
          <label><input id="irmsID" type="checkbox" name="irms" value="irms">Ρεύμα (rms)</label>
          <label><input id="irmslowID" type="checkbox" name="irmslow" value="irmslow">min</label>
          <label><input id="irmshighID" type="checkbox" name="irmshigh" value="irmshigh">max</label>
          </div>
          <div class="checkbox">
          <label><input id="pID" type="checkbox" name="p" value="p">Ενεργή Ισχύς</label>
          </div>
          <div class="checkbox">
          <label><input id="qID" type="checkbox" name="q" value="q">Άεργη Ισχύς</label>
          </div>
          <div class="checkbox">
          <label><input id="sID" type="checkbox" name="s" value="s">Φαινόμενη Ισχύς</label>
          </div>
          <div class="checkbox">
          <label><input id="pfID" type="checkbox" name="pf" value="pf">Συντελεστής Ισχύος</label>
          </div>
          <div class="checkbox">
          <label><input id="vrmsharmID" type="checkbox" name="vrmsharm" value="vrmsharm">Τάση (rms,αρμονική)</label>
          </div>
          <div class="checkbox">
          <label><input id="irmsharmID" type="checkbox" name="irmsharm" value="irmsharm">Ρεύμα (rms,αρμονική)</label>
          </div>
          <div class="checkbox">
          <label><input id="pharmID" type="checkbox" name="pharm" value="pharm">Ενεργή Ισχύς (αρμονική)</label>
          </div>
          <div class="checkbox">
          <label><input id="qharmID" type="checkbox" name="qharm" value="qharm">Άεργη Ισχύς (αρμονική)</label>
          </div>
          <div class="checkbox">
          <label><input id="sharmID" type="checkbox" name="sharm" value="sharm">Φαινόμενη Ισχύς (αρμονική)</label>
          </div>
          <div class="checkbox">
          <label><input id="pavID" type="checkbox" name="pav" value="pav">Μέση Ενεργή Ισχύς</label>
          </div>
        </div>
        <div class="form-group">
          <label>Από <input class="form-control" type="datetime-local" name="fromdatetime" id="fromdatetimeInput"></label>
          <label> έως <input class="form-control" type="datetime-local" name="todatetime" id="todatetimeInput" ><label>
          <label class="form-inline"><br>τις τελευταίες <input class="form-control" type="number" name="quantitylimit" id="quantityInput" min="1" style="width:125px"></label>
          <div class="btn-group btn-sm">
            <button type="submit" value="submit" class="btn btn-default" form="sidebar-form" id="submitFormBtn" name="submitFormBtn">Υποβολή</button>
            <button type="reset" value="reset" class="btn btn-default" form="sidebar-form" id="resetFormBtn">Επαναφορά</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- /#sidebar-wrapper -->

<!-- Page Content -->
  <div id="page-content-wrapper">
    <div class="container-fluid" role="main">

      <!-- Control Buttons -->
      <form role="form" id="clearData" action="clearSession.php" method="post"></form>
      <form role="form" id="updateData" action="reloadFromDB.php" method="post"></form>
      <form role="form" id="exportData" action="exportCSV.php" method="post"></form>
      <div class="btn-group">
        <a class="btn btn-default" href="#menu-toggle" id="menu-toggle"><span class="glyphicon glyphicon-cog"></span> Ρυθμίσεις</a>
        <button type="submit" class="btn btn-default" form="clearData" ><span class="glyphicon glyphicon-remove"></span> Καθαρισμός</button>
        <button type="submit" class="btn btn-default" form="updateData"><span class="glyphicon glyphicon-refresh"></span> Ανανέωση</button>
        <button type="submit" class="btn btn-default" form="exportData"><span class="glyphicon glyphicon-export"></span> Εξαγωγή</button>
      </div>

      <!-- Tables with Measurements  -->
      <div class="page-header" id="measurements">
          <h1>Πίνακας</h1>
      </div>
      <!-- Menu Toggle Script -->

      <div class="row">
          <div class="col-sm-12">
            <span id="dataTable">
           <?php 
            if ((isset($_SESSION['cols'])) && (isset($_SESSION['rows'])) && (isset($_SESSION['colNames'])) && (isset($_SESSION['values']))) {
             include "viewTable.php"; 
           }
           else{
            echo "Επιλέξτε κάποιες μεταβλητές για να δείτε τις τιμές τους.";
           }?>
           </span>
          </div>
      </div>

      <!-- Graphs with Measurements -->
      <div class="page-header">
        <h1>Διαγράμματα</h1>
      </div>   
      <!-- load the d3.js library --> 
      <script src="lib/d3.min.js" type="text/javascript"></script> 
      <div class="row graphs">
        <div class="col-md-6" id="svg1"></div>
        <div class="col-md-6" id="svg2"></div>
      </div>
      <div class="row graphs">
        <div class="col-md-6" id="svg3"></div>
        <div class="col-md-6" id="svg4"></div>
      </div>
      <div class="row graphs">
        <div class="col-md-6" id="svg5"></div>
        <div class="col-md-6" id="svg6"></div>
      </div>
      <div class="row graphs">
        <div class="col-md-6" id="svg7"></div>
        <div class="col-md-6" id="svg8"></div>
      </div>
      <div class="row graphs">
        <div class="col-md-6" id="svg9"></div>
        <div class="col-md-6" id="svg10"></div>
      </div>
      <div class="row graphs">
        <div class="col-md-12" id="svg11"></div>
      </div>
      <?php 
        if ((isset($_SESSION['cols'])) && (isset($_SESSION['rows'])) && (isset($_SESSION['colNames'])) && (isset($_SESSION['values']))) {
          $cols = $_SESSION['cols'];
          $colNames = $_SESSION['colNames'];
          echo "<script>var block = 0;</script>";
          for ($i=1; $i < ($cols); $i++) {
            if (($colNames[$i]=="Paverage") || ($colNames[$i]=="VrmsHigh") || ($colNames[$i]=="VrmsLow") || ($colNames[$i]=="IrmsHigh") || ($colNames[$i]=="IrmsLow")) {
              continue;
            }
            echo "<script>block++;</script>";
            include "graphs/".$colNames[$i].".php";
          }
        }
        else {
          echo "Επιλέξτε κάποιες μεταβλητές για να δείτε τα διαγράμματά τους.";
        }?>
    </div>
  </div>
  <!-- /#page-content-wrapper -->
</div>
<!-- /#wrapper -->

<!-- Settings Form Javascript -->
<script type="text/javascript" src="js/settingsForm.js"></script>

</body>
</html>