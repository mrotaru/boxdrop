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
require_once( "includes/box_drop_functions.php" );

// delete 'users' table
//------------------------------------------------------------------------------
$res = mysql_query( "DROP TABLE IF EXISTS users" );
check_query( $res );

// delete any folders user 1 created
//------------------------------------------------------------------------------
$res = mysql_query( "
    SELECT id, name
    FROM user_1_folders
    WHERE 1
    " );
//check_query( $res );

if( $res )
    while( $folder = mysql_fetch_array( $res ))
    {
        $folder_id   = $folder[0];
        $folder_name = $folder[1];
        $res2 = mysql_query( "
            DROP TABLE `user_1_folder_$folder_name`
            " );
        check_query( $res2 );
    }

// delete 'folders' table for user 1
//------------------------------------------------------------------------------
$res = mysql_query( "DROP TABLE IF EXISTS user_1_folders" );
check_query( $res );

// create 'users' table
//------------------------------------------------------------------------------
$res = mysql_query( "
    CREATE TABLE users (
    id int(11) NOT NULL auto_increment,
    username varchar(30) NOT NULL,
    email varchar(30) NOT NULL,
    hashed_password varchar(40) NOT NULL,
    PRIMARY KEY (id))
    ");
check_query( $res );

// add user 'derp'
//------------------------------------------------------------------------------
$res = mysql_query( "
    INSERT INTO users ( username, email, hashed_password ) VALUES
    ( 'derp','derp@gmail.com','85136c79cbf9fe36bb9d05d0639c70c265c18d37' );
    ");
check_query( $res );

init_user( 1 );

?>
