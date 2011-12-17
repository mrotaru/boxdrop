<?php
//
//  This file is intended to contain the functions that are specific to
//  box_drop, and therefore are not suitable candidates for the general
//  'functions.php' file.
//

// create the default ( root ) folder, if it doesn't exist
function ensure_default_folder()
{
    // make sure the user is logged in
    if( isset( $_SESSION[ 'user_id' ] ))
    {
        $user_id = $_SESSION[ 'user_id' ];
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
    }
}

function make_new_folder( $foler_name )
{
}

function show_files()
{
    if( isset( $_SESSION[ 'user_id' ] ))
    {
        // get info about all the files uploaded by the current user
        $user_id = $_SESSION[ 'user_id' ];
        $result = mysql_query( "
            SELECT filename, filesize, description, id 
            FROM user_${user_id}_folder_root
            WHERE 1
            " );
        check_query( $result );

        if( $result )
        {
            // table header
            echo( "
                <table> 
                <tr>
                <th>Name</th>
                <th>Size</th>
                <th>Description</th>
                <th colspan='3'>Actions</th>
                </tr>
                " );

            // display a row for each file
            while( $file = mysql_fetch_array( $result ) )
            {
                echo( "
                    <tr>
                    <td>{$file[0]}</td>
                    <td>{$file[1]}</td>
                    <td>{$file[2]}</td>
                    <td class='download-cell action-cell'>
                        <a href='download.php?id={$file[3]}'>Download</a>
                    </td>
                    <td class='delete-cell action-cell'>
                    	<a href='delete.php?id={$file[3]}'>Delete</a>
                    </td>
                    <td class='rename-cell action-cell'>
                    	<a href='rename.php?file_id={$file[3]}'>Rename</a>
                    </td>
                    </tr>
                    " );
            }
            echo( "</table>" );
        }
        echo( "<br/>" );
    }
}

function get_filename_by_id( $id )
{
    if( isset( $_SESSION[ 'user_id' ] ))
    {
        $user_id = $_SESSION[ 'user_id' ];
        $result = mysql_query( "
            SELECT filename
            FROM user_${user_id}_folder_root
            WHERE id = ${id}
            " );
        check_query( $result );
        $result_array = mysql_fetch_array( $result );
        return( $result_array[ 'filename' ] );
    }
}

?>
