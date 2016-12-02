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
        <li class="active"><a href="home.php"><span class="glyphicon glyphicon-home"></span> Αρχική</a></li>
        <li><a href="data.php"><span class="glyphicon glyphicon-dashboard"></span> Μετρήσεις</a></li>
        <li><a href="about.php"><span class="glyphicon glyphicon-info-sign"></span> Πληροφορίες</a></li>
        <li><a href="contact.php"><span class="glyphicon glyphicon-envelope"></span> Επικοινωνία</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>

<div class="container">      
  <!-- Main jumbotron for a primary marketing message -->
  <div class="jumbotron">
    <div class="row">
      <div class="col-md-6">
        <h1 >Οικιακός<br>Επιτηρητής<br>Ηλεκτρικής<br>Ενέργειας<br><small style="color:DarkCyan">με Arduino Yún</small></h1>
      </div>
      <div class="col-md-6">
        <img src="images/hem.png" class="img-responsive" alt="HEM image" width="400" height="400" style="float:right;margin-top:40px">
      </div>
    </div>
    <blockquote class="blockquote-reverse">
        <p style="font-size:18px; text-align:right; line-height:18px">"You can't manage what you can't measure."</p>
        <footer>Philip Drucker</footer>
    </blockquote>
  </div>
</div>

<?php
    include "footer.php";
?>