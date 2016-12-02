<?php
	session_start();

	$db = new SQLite3('78M6610PSU.db');
	$isChecked = false;

	$queryText = 'SELECT DateTime';
	if (!empty($_POST['vrms'])) {
		$queryText .= ', Vrms';
		$isChecked = true;
	}
	if (!empty($_POST['irms'])) {
		$queryText .= ', Irms';
		$isChecked = true;
	}
	if (!empty($_POST['p'])) {
		$queryText .= ', P';
		$isChecked = true;
	}
	if (!empty($_POST['q'])) {
		$queryText .= ', Q';
		$isChecked = true;
	}
	if (!empty($_POST['s'])) {
		$queryText .= ', S';
		$isChecked = true;
	}
	if (!empty($_POST['pf'])) {
		$queryText .= ', pf';
		$isChecked = true;
	}
	if (!empty($_POST['vrmsharm'])) {
		$queryText .= ', Vharmonic';
		$isChecked = true;
	}
	if (!empty($_POST['irmsharm'])) {
		$queryText .= ', Iharmonic';
		$isChecked = true;
	}
	if (!empty($_POST['pharm'])) {
		$queryText .= ', Pharmonic';
		$isChecked = true;
	}
	if (!empty($_POST['qharm'])) {
		$queryText .= ', Qharmonic';
		$isChecked = true;
	}
	if (!empty($_POST['sharm'])) {
		$queryText .= ', Sharmonic';
		$isChecked = true;
	}
	if (!empty($_POST['vrmshigh'])) {
		$queryText .= ', VrmsHigh';
		$isChecked = true;
	}
	if (!empty($_POST['vrmslow'])) {
		$queryText .= ', VrmsLow';
		$isChecked = true;
	}
	if (!empty($_POST['irmshigh'])) {
		$queryText .= ', IrmsHigh';
		$isChecked = true;
	}
	if (!empty($_POST['irmslow'])) {
		$queryText .= ', IrmsLow';
		$isChecked = true;
	}
	if (!empty($_POST['pav'])) {
		$queryText .= ', Paverage';
		$isChecked = true;
	}


	$queryText .= ' FROM data';
	if (!empty($_POST["fromdatetime"]))  {
		$temp = explode("T", $_POST['fromdatetime']);
		$from = $temp[0].' '.$temp[1];
		$whereClause = ' WHERE DateTime >= "'.$from.'"';
	}
	if (!empty($_POST['todatetime']))  {
		$temp = explode("T", $_POST['todatetime']);
		$to = $temp[0].' '.$temp[1];
		$whereClause = ' WHERE DateTime <= "'.$to.'"';
	}
	if ((!empty($_POST['fromdatetime'])) && (!empty($_POST['todatetime']))) {
		$whereClause = ' WHERE DateTime BETWEEN "'.$from.'" AND "'.$to.'"';
	}
	$queryText .= $whereClause;
	
	$queryText .=' ORDER BY id DESC';
	if (!empty($_POST['quantitylimit'])) {
		$limit = $_POST['quantitylimit'];
		$queryText .=' LIMIT '.$limit;
	}
		// echo $queryText;

	if ($isChecked){

		$results = $db->query($queryText);

		$cols = $results->numColumns();
		for ($i = 0; $i < ($cols); $i++) {
	    	$colNames[$i] = $results->columnName($i);
	    }

	    $rows = 0;
		while ($row = $results->fetchArray()){
			for ($i = 0; $i < ($cols); $i++) { 
				$values[$rows][$i] = $row[$i];
			} //end for
			$rows++;
		}
		$_SESSION['queryText'] = $queryText;
		$_SESSION['cols'] = $cols;
		$_SESSION['rows'] = $rows;
		$_SESSION['colNames'] = $colNames;
		$_SESSION['values'] = $values;
	}

	$db->close();

	unset($_SESSION['submitFormBtn']);

	header( "Location: data.php" );
?>