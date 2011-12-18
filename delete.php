<?php require_once( "includes/session.php" ); ?>
<?php require_once( "includes/connection.php" ); ?>
<?php require_once( "includes/functions.php" ); ?>
<?php require_once( "includes/box_drop_functions.php" ); ?>

<?php

if( isset( $_SESSION[ 'user_id' ] ))
{
    $user_id = $_SESSION[ 'user_id' ];

    if( isset( $_GET[ 'file_id' ] ) && isset( $_GET[ 'folder_id' ] ))
    {
        $folder_id = $_GET[ 'folder_id' ];
        $file_id = $_GET[ 'file_id' ];
        $folder_name = get_folder_name_by_id( $folder_id );
        
        $result = mysql_query( "
            DELETE FROM user_${user_id}_folder_${folder_name}
            WHERE id=$file_id
            " );
        check_query( $result );
        redirect_to( "show_folder.php?folder_id=${folder_id}" );
    }
}
?>
