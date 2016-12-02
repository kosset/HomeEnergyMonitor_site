#!/usr/bin/php-cli
<?php
$db = new SQLite3('/mnt/sda1/arduino/www/HEM/78M6610PSU.db');
$query = "INSERT INTO data (Vrms,Irms,P,Q,S,pf,Vharmonic,Iharmonic,Pharmonic,Qharmonic,Sharmonic,VrmsHigh,VrmsLow,IrmsHigh,IrmsLow,Paverage) VALUES( ".$argv[1].",".$argv[2].",".$argv[3].",".$argv[4].",".$argv[5].",".$argv[6].",".$argv[7].",".$argv[8].",".$argv[9].",".$argv[10].",".$argv[11].",".$argv[12].",".$argv[13].",".$argv[14].",".$argv[15].",".$argv[16]." )";
$db->exec($query);
$db->close();
?>
