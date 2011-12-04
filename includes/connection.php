<?php

// create database connection
$connection = mysql_connect( "localhost", "root", "" );
if( !$connection )
{
    die( "Cannot connect to database: " . mysql_error());
}

// select a database
$db_select = mysql_select_db( "test", $connection );
if( !$db_select )
{
    die( "Cannot select database: " . mysql_error());
}

?>
