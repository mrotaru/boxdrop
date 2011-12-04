<?php
require( "constants.php" );

// create database connection
$connection = mysql_connect( DB_SERVER, DB_USER, DB_PASS );
if( !$connection )
{
    die( "Cannot connect to database: " . mysql_error());
}

// select a database
$db_select = mysql_select_db( DB_NAME, $connection );
if( !$db_select )
{
    die( "Cannot select database: " . mysql_error());
}

?>
