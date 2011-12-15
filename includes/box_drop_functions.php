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
            CREATE TABLE user_${user_id}_folder_root (
                id int(11) NOT NULL auto_increment,
                filename varchar(255) NOT NULL,
                filetype varchar(30),
                filesize int(11) NOT NULL,
                data LONGBLOB NOT NULL,
                description varchar(100),
                PRIMARY KEY (id))
            " );
//        if( !$result )
//            echo( mysql_error());
    }
}

function make_new_folder( $foler_name )
{
}

function show_files()
{
    // show all the files uploaded by the current user
}

?>
