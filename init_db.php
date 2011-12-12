<?php
// -----------------------------------------------------------------------------
// 
// Reset the database: delete and re-create the 'users' table
//
// Normally, these operations could be graciously executed by connecting to the
// database directly via the MySQL console and passing it an 'init.sql', but 
// unfortunatelly this is not possible on the farspace servers...
//
// -----------------------------------------------------------------------------

require_once( "includes/connection.php" );
require_once( "includes/functions.php" );

// delete 'users' table
//------------------------------------------------------------------------------
$res = mysql_query( "DROP TABLE users" );
check_query( $res );

// create 'users' table
//------------------------------------------------------------------------------
$res = mysql_query( " CREATE TABLE users (
    id int(11) NOT NULL auto_increment,
    username varchar(30) NOT NULL,
    email varchar(30) NOT NULL,
    password varchar(30) NOT NULL,
    PRIMARY KEY (id)
)");
check_query( $res );

// add user 'derp'
//------------------------------------------------------------------------------
$res = mysql_query( "
    INSERT INTO users ( username, email, password ) VALUES
    ( 'derp','derp@gmail.com','asdasd' );
    ");

?>
