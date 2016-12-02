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
        <li><a href="data.php"><span class="glyphicon glyphicon-dashboard"></span> Μετρήσεις</a></li>
        <li class="active"><a href="about.php"><span class="glyphicon glyphicon-info-sign"></span> Πληροφορίες</a></li>
        <li><a href="contact.php"><span class="glyphicon glyphicon-envelope"></span> Επικοινωνία</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>


<div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <h1 class="page-header text-center">Ποιοι είμαστε;</h1>
        <p class="aboutPar">Είμαστε οι Σερετάκης Κωνσταντίνος και Σέτζας Κωνσταντίνος υποψήφιοι διπλωματούχοι
          της σχολής Ηλεκτρολόγων Μηχανικών και Μηχανικών Υπολογιστών του Αριστοτελείου Πανεπιστημίου Θεσσαλονίκης.</p>
          <h1 class="page-header text-center">Σκοπός</h1>
          <p class="aboutPar">Η παρούσα ιστοσελίδα δημιουργήθηκε στα πλαίσια της διπλωματικής εργασίας μας με επιβλέποντα τον κύριο Γεώργιο Ανδρέου, Λέκτορα του Α.Π.Θ.
            Μέσω αυτής δίνεται η δυνατότητα στον χρήστη να ενημερωθεί σχετικά με τις μετρήσεις του Οικιακού Μετρητή Ηλεκτρικής Ενέργειας που έχουμε κατασκευάσει.</p>
      
    </div>
  </div>
</div>   

<?php
    include "footer.php";
?>