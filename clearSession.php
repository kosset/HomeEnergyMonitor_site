<?php
    session_start();
    unset( $_SESSION[ 'cols' ] );
    unset( $_SESSION[ 'rows' ] );
    unset( $_SESSION[ 'colNames' ] );
    unset( $_SESSION[ 'values' ] );
    unset($_SESSION['queryText']);
    header( "Location: data.php" );
?>