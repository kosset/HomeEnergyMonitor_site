<?php
	if ($_POST["submit"]) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'Demo Contact Form'; 
		$to = 'setkostas@gmail.com'; 
		$subject = 'Message from Contact Home Energy Monitor Application';
		
		$body ="From: $name\n E-Mail: $email\n Message:\n $message";

		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Παρακαλώ εισάγετε ένα όνομα';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Παρακαλώ εισάγετε μία έγκυρη διεύθυνση email';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Παρακαλώ εισάγετε το μήνυμα';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Λάθος αποτέλεσμα. Επαναλάβετε την πράξη.';
		}

		// If there are no errors, send the email
		if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
			if (mail($to, $subject, $body, $from)) {
				$result='<div class="alert alert-success">Επιτυχής αποστολή! Θα επικοινωνήσουμε σύντομα μαζί σας.</div>';
			} else {
				$result='<div class="alert alert-danger">Προέκυψε σφάλμα κατά την αποστολή. Παρακαλώ δοκιμάστε ξανά.</div>';
			}
		}
	}
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
        <li><a href="about.php"><span class="glyphicon glyphicon-info-sign"></span> Πληροφορίες</a></li>
        <li class="active"><a href="contact.php"><span class="glyphicon glyphicon-envelope"></span> Επικοινωνία</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>

  	<div class="container">
  		<div class="row">
  			<div class="col-md-6 col-md-offset-3">
  				<h1 class="page-header text-center">Φόρμα Επικοινωνίας</h1>
				<form class="form-horizontal" role="form" method="post" action="contact.php">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Όνομα</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" name="name" placeholder="Όνομα & Επώνυμο" value="<?php echo htmlspecialchars($_POST['name']); ?>">
							<?php echo "<p class='text-danger'>$errName</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
							<?php echo "<p class='text-danger'>$errEmail</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="message" class="col-sm-2 control-label">Κείμενο</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
							<?php echo "<p class='text-danger'>$errMessage</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="human" name="human" placeholder="Αποτέλεσμα">
							<?php echo "<p class='text-danger'>$errHuman</p>";?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<input id="submit" name="submit" type="submit" value="Αποστολή" class="btn btn-default">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<?php echo $result; ?>	
						</div>
					</div>
				</form> 
			</div>
		</div>
	</div>   
<!--     // <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    // <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script> -->
	<?php include "footer.php"; ?>
  </body>
</html>