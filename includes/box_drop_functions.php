<?php
//
//  This file is intended to contain the functions that are specific to
//  box_drop, and therefore are not suitable candidates for the general
//  'functions.php' file.
//

// create the default ( root ) folder, if it doesn't exist
// create the table holding information about all the folders of the current user
function init_user( $user_id )
{
    // create a table for the folders the current user has
    $result = mysql_query( "
        CREATE TABLE IF NOT EXISTS user_${user_id}_folders (
            id int(11) NOT NULL auto_increment,
            name varchar(255) NOT NULL,
            size int(11),
            nr_files int(6),
            public boolean,
            PRIMARY KEY (id))
            " );
    check_query( $result );

    // create the root folder
    $result = mysql_query( "
        CREATE TABLE IF NOT EXISTS user_${user_id}_folder_root (
            id int(11) NOT NULL auto_increment,
            filename varchar(255) NOT NULL,
            filetype varchar(30),
            filesize int(11) NOT NULL,
            data LONGBLOB NOT NULL,
            description varchar(100),
            PRIMARY KEY (id))
        " );
    check_query( $result );

    // add the root folder to the table of folders
    $result = mysql_query( "
        INSERT INTO user_${user_id}_folders
        ( id, name, size, nr_files, public )
        VALUES (
            '',
            'root',
            0,
            0,
            false
        )
        " );
    check_query( $result );
}

// register a new user
function register( $username, $email, $password )
{
    $result = mysql_query( "
        INSERT INTO users VALUES
        ( '', '" . $username . "', '" . $email . "', '" . $password . "')
        " );
    check_query( $result );

    // get the user's id
    $result = mysql_query( "
        SELECT id, username FROM users
        WHERE username = '${username}'
        " );
    check_query( $result );
    $user_id_name = mysql_fetch_array( $result );
    $user_id = $user_id_name[ 'id' ];

    // create root folder, and table for other folders
    init_user( $user_id );
}

function make_new_folder( $user_id, $folder_name )
{
    // check if not already existing
    $result = mysql_query( "
        SELECT *
        FROM user_${user_id}_folders
        WHERE name = '$folder_name'
        " );
    check_query( $result );
    if( mysql_num_rows( $result ) != 0 )
        return 1;

    // create the folder
    $result = mysql_query( "
        CREATE TABLE IF NOT EXISTS user_${user_id}_folder_$folder_name (
            id int(11) NOT NULL auto_increment,
            filename varchar(255) NOT NULL,
            filetype varchar(30),
            filesize int(11) NOT NULL,
            data LONGBLOB NOT NULL,
            description varchar(100),
            PRIMARY KEY (id))
        " );
    check_query( $result );

    // add the folder to the table of folders
    $result = mysql_query( "
        INSERT INTO user_${user_id}_folders
        ( id, name, size, nr_files, public )
        VALUES (
            '',
            '${folder_name}',
            0,
            0,
            false
        )
        " );
    check_query( $result );
}

function get_folder_name_by_id( $folder_id )
{
    $user_id = $_SESSION[ 'user_id' ];
    if( isset( $user_id ))
    {
        $result = mysql_query( "
            SELECT name
            FROM user_${user_id}_folders
            WHERE id = ${folder_id}
            " );
        check_query( $result );
        $result_array = mysql_fetch_array( $result );
        return( $result_array[ 'name' ] );
    }

}

function get_filename_by_id( $folder_id, $file_id )
{
    if( isset( $_SESSION[ 'user_id' ] ))
    {
        $user_id = $_SESSION[ 'user_id' ];
        $folder_name = get_folder_name_by_id( $folder_id );

        $result = mysql_query( "
            SELECT filename
            FROM user_${user_id}_folder_${folder_name}
            WHERE id = ${file_id}
            " );
        check_query( $result );
        
        $result_array = mysql_fetch_array( $result );
        return( $result_array[ 'filename' ] );
    }
}

?>
