<?php require_once( "includes/session.php" ); ?>
<?php require_once( "includes/connection.php" ); ?>
<?php require_once( "includes/functions.php" ); ?>

<?php

if( isset( $_SESSION[ 'user_id' ] ))
{
    $user_id = $_SESSION[ 'user_id' ];

    if( isset( $_GET[ 'id' ] ))
    {
        $id = $_GET[ 'id' ];
        $result = mysql_query( "
            DELETE FROM user_${user_id}_folder_root
            WHERE id=$id
            " );
        check_query( $result );
        redirect_to( "files.php" );
    }
}
?>
