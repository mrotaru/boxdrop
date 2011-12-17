<?php
//
//  This file is intended to contain the functions that are specific to
//  box_drop, and therefore are not suitable candidates for the general
//  'functions.php' file.
//

function upload_file()
{
    // this option is only available to logged-in users


    // check if the root_folder table exists; create if not


    // get meta-data about the file, and put it into the table
    

    // place the file

}

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
        $user_id = $_SESSION[ 'user_id' ];
        // show all the files uploaded by the current user
        $result = mysql_query( "
            SELECT filename, filesize, description, id 
            FROM user_${user_id}_folder_root
            WHERE 1
            " );
        //check_query( $result );

        if( $result )
        {
            echo( "
                <table> 
                <tr>
                <th>Name</th>
                <th>Size</th>
                <th>Description</th>
                <th colspan='2'>Actions</th>
                </tr>
                " );

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
                    </tr>
                    " );
            }
            echo( "</table>" );
        }
        echo( "<br/>" );
    }
}

?>
