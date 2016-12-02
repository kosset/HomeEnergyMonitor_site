<?php
	session_start();
	$cols = $_SESSION['cols'];
    $rows = $_SESSION['rows'];
    $colNames = $_SESSION['colNames'];
    $values = $_SESSION['values'];

    print $colNames[0];
    for ($i = 1; $i < ($cols); $i++) {
      print ",".$colNames[$i];
    }
    print "\n";

    for ($j = 0; $j < ($rows); $j++) {
    	print $values[$j][0];
		for ($i = 1; $i < ($cols); $i++) {
			echo ",".$values[$j][$i];
		} //end for
		echo "\n";
  	}
?>