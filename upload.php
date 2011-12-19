<?php require_once( "includes/session.php" ); ?>
<?php require_once( "includes/connection.php" ); ?>
<?php require_once( "includes/functions.php" ); ?>
<?php require_once( "includes/box_drop_functions.php" ); ?>

<?php

$upload_errors = array(
    // http://www.php.net/manual/en/features.file-upload.errors.php
    UPLOAD_ERR_OK 			=> "No errors.",
    UPLOAD_ERR_INI_SIZE  	=> "Larger than upload_max_filesize.",
    UPLOAD_ERR_FORM_SIZE 	=> "Larger than form MAX_FILE_SIZE.",
    UPLOAD_ERR_PARTIAL 		=> "Partial upload.",
    UPLOAD_ERR_NO_FILE 		=> "No file.",
    UPLOAD_ERR_NO_TMP_DIR   => "No temporary directory.",
    UPLOAD_ERR_CANT_WRITE   => "Can't write to disk.",
    UPLOAD_ERR_EXTENSION 	=> "File upload stopped by extension."
);

//show_files_superglobal( "form_file" );
//show_post_superglobal();
//show_get_superglobal();

if(isset($_POST['submit'])) 
{

    // errors ?
    if( $_FILES[ "form_file" ][ "error" ] != 0 )
    {
		$error = $_FILES[ "form_file" ][ "error" ];
		$message = "ERROR: " . $upload_errors[ $error ];
    }
    else
    {
        // to which folder are we uploading ?
        if( !isset( $_POST['folder_id' ] ))
        {
            $folder_id = 1;
            $folder_name = 'root';
        }
        else
        { 
            $folder_id = $_POST[ 'folder_id' ];
            $folder_name = get_folder_name_by_id( $folder_id );
        }

        // get info from the _FILES superglobal
        $file_name = $_FILES[ "form_file" ][ "name" ];
        $file_type = $_FILES[ "form_file" ][ "type" ];
        $file_size = $_FILES[ "form_file" ][ "size" ];
        $file_description = $_POST[ "form_description" ];

        // get the raw data
        $form_file = $_FILES[ "form_file" ][ "tmp_name" ];
        $file_data = addslashes( 
                        fread( 
                            fopen( $form_file, "r"), filesize( $form_file )
                            )
                         );

        // upload to database
        $user_id = $_SESSION[ 'user_id' ];
        $result = mysql_query("
            INSERT INTO user_${user_id}_folder_${folder_name}
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
        $message = "upload successful";
    }

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<?php include( "includes/head.php" ); ?>

<body>
    <div id="container">
        <?php include( "includes/header.php" ); ?>

        <div id="content-no-margin">

            <?php if(!empty($message)) { echo "<p>{$message}</p>"; } ?>

            <form method="post" action="upload.php" enctype="multipart/form-data"> 
                 <div id="form-container">
                    <fieldset>

                        <?php

                        // to which folder are we uploading ?
                        if( isset( $_POST[ 'folder_id' ] ))
                            $folder_id = $_POST[ 'folder_id' ];
                        else if( isset( $_GET[ 'folder_id' ] ))
                            $folder_id = $_GET[ 'folder_id' ];
                        else if ( !isset( $folder_id ))
                            $folder_id = 1;

                        $folder_name = get_folder_name_by_id( $folder_id );
                        echo( "<legend>Upload to: ${folder_name}</legend>" );
                        
                        // a hidden filed with the folder_id
                        echo( "
                            <input type='hidden' name='folder_id' value='${folder_id}'
                            " );
                        ?>

                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000"/> 
                        <label for="form_file">File to upload: (1MB max)</label> 
                        <input type="file" name="form_file" size="40"/> 
                        <br/>
                        <label for="form_description">Description:</label> 
                        <input type="text" name="form_description" size="40"/> 
                        <br/>
                        <p>
                            <?php
                                echo ("
                                    <input type='button' class='button' value='<< Back'
                                    onclick=\"window.location='show_folder.php?folder_id=$folder_id';\" />
                                  ");
                            ?>

                            <input type='submit' name='submit' class='button' value='Upload'
                            onclick=\"window.location='upload.php'\" />
                        </p>
                    </fieldset>
                 </div>
             </form>

        </div>

        <?php include( "includes/footer.php" ); ?>
    </div>
</body>

</html>
