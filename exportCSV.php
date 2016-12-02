<?php
// output headers so that the file is downloaded rather than displayed
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=data.csv');

	// create a file pointer connected to the output stream
	$output = fopen('php://output', 'w');

	// fetch the data
	$db = new SQLite3('78M6610PSU.db');
	$results = $db->query('SELECT * FROM data');

	// loop over the rows, outputting them
	$cols = $results->numColumns();
	for ($i = 0; $i < ($cols); $i++) {
		$colNames[$i] = $results->columnName($i);
	}
	fputcsv($output, $colNames);

	while ($row = $results->fetchArray(SQLITE3_ASSOC)){
		fputcsv($output, $row);
	}
	$db->query('DELETE FROM data');	

	$db->close();
	header( "Location: data.php" );
?>