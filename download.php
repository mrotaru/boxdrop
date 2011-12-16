<?php require_once( "includes/session.php" ); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>

<?php require_once( "includes/connection.php" ); ?>
<?php require_once( "includes/functions.php" ); ?>
<?php include( "includes/head.php" ); ?>

<body>
    <div id="container">
        <?php include( "includes/header.php" ); ?>

        <div id="content-no-margin">

        <?php

        if( isset( $_SESSION[ 'user_id' ] ))
        {
            $user_id = $_SESSION[ 'user_id' ];
            $file_id = $_GET[ 'id' ];

            $query = "
                SELECT filename, data, filetype 
                FROM user_${user_id}_folder_root
                WHERE id=${file_id}
                "; 
            $result = mysql_query( $query ); 
            check_query( $result );

            $data = mysql_result( $result, 0, "data" ); 
            $type = mysql_result( $result, 0, "filetype" ); 
            $file_name = mysql_result( $result, 0, "filename" ); 
            
            Header( "Content-type: $type" );
            Header( "Content-disposition: attachment; filename='{$file_name}'" );
        }
        ?>

        </div>

        <?php include( "includes/footer.php" ); ?>
    </div>
</body>

</html>
