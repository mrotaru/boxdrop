<?php require_once( "includes/session.php" ); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>

<?php require_once( "includes/connection.php" ); ?>
<?php require_once( "includes/functions.php" ); ?>
<?php require_once( "includes/box_drop_functions.php" ); ?>
<?php include( "includes/head.php" ); ?>

<body>
    <div id="container">
        <?php include( "includes/header.php" ); ?>

        <div id="content-no-margin">

            Uploading...
            <?php

            ensure_default_folder();

//            show_files_superglobal( "form_file" );
//            show_post_superglobal();

            // get info from the _FILES superglobal
            $file_name = $_FILES[ "form_file" ][ "name" ];
            $file_type = $_FILES[ "form_file" ][ "type" ];
            $file_size = $_FILES[ "form_file" ][ "size" ];
            $file_description = $_POST[ "form_description" ];
            
            // get the raw data
            $form_file = $_FILES[ "form_file" ][ "tmp_name" ];
            $file_data = addslashes( 
                fread( fopen( $form_file, "r"), 
                       filesize( $form_file )
                     )
                );

            // upload to database
            $user_id = $_SESSION[ 'user_id' ];
            $result = mysql_query("
                INSERT INTO user_${user_id}_folder_root
                ( filename, filetype, filesize, data, description ) 
                ". " VALUES (
                    '$file_name',
                    '$file_type',
                    '$file_size',
                    '$file_data',
                    '$file_description'
                )"
                ); 

            check_query( $result );

        ?> 

        </div>

        <?php include( "includes/footer.php" ); ?>
    </div>
</body>
        
</html>
