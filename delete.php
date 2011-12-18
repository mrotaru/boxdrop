<?php require_once( "includes/session.php" ); ?>
<?php require_once( "includes/connection.php" ); ?>
<?php require_once( "includes/functions.php" ); ?>
<?php require_once( "includes/box_drop_functions.php" ); ?>

<?php

if( isset( $_SESSION[ 'user_id' ] ))
{
    $user_id = $_SESSION[ 'user_id' ];
    if( isset( $user_id ))
    {
        if( isset( $_GET[ 'folder_id' ] ))
            $folder_id = $_GET[ 'folder_id' ];

        if( isset( $_GET[ 'file_id' ] ))
            $file_id = $_GET[ 'file_id' ];

        // deleting a file ?
        if( isset( $folder_id ) && isset( $file_id ))
        {
            $folder_name = get_folder_name_by_id( $folder_id );
            
            $result = mysql_query( "
                DELETE FROM user_${user_id}_folder_${folder_name}
                WHERE id=$file_id
                " );
            check_query( $result );

            redirect_to( "show_folder.php?folder_id=${folder_id}" );
        }
        // deleting a folder.
        else if( !isset( $file_id ) && isset( $folder_id ))
        {
            $folder_name = get_folder_name_by_id( $folder_id );
            if( $folder_name != 'root' )
            {
                // delete from table which holds info about all folders
                $result = mysql_query( "
                    DELETE FROM user_${user_id}_folders
                    WHERE id=$folder_id
                    " );
                check_query( $result );

                // delete the folder's table
                $result = mysql_query( "
                    DROP TABLE user_${user_id}_folder_${folder_name}
                    " );
                check_query( $result );

                redirect_to( "show_folder.php?folder_id=1" );
            }
        }
    }
}
?>
