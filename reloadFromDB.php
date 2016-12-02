<?php
	session_start();

	if (isset($_SESSION['queryText'])) {
		$db = new SQLite3('78M6610PSU.db');
		
		$queryText = $_SESSION['queryText'];
		// echo $queryText;

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

		$_SESSION['cols'] = $cols;
		$_SESSION['rows'] = $rows;
		$_SESSION['colNames'] = $colNames;
		$_SESSION['values'] = $values;

		$db->close();
	}

	header( "Location: data.php" );
?>