<?php require_once( "includes/session.php" ); ?>
<?php require_once( "includes/connection.php" ); ?>
<?php require_once( "includes/functions.php" ); ?>
<?php require_once( "includes/box_drop_functions.php" ); ?>

<?php

if( isset( $_SESSION[ 'user_id' ] ))
{
    if( isset( $_SESSION[ 'user_id' ] ))
    {
        $user_id = $_SESSION[ 'user_id' ];
        if( isset( $_POST[ 'submit'] ))
        {
            if(isset( $_POST[ 'folder_id' ] ) && isset( $_POST[ 'file_id' ])) 
            {
                if( isset( $_POST[ 'new_name' ] ))
                {
                    $folder_id = $_POST[ 'folder_id' ];
                    $file_id   = $_POST[ 'file_id' ];
                    $new_name  = $_POST[ 'new_name' ];
                    $folder_name = get_folder_name_by_id( $folder_id );

                    $result = mysql_query( "
                        UPDATE user_${user_id}_folder_${folder_name}
                        SET filename = '$new_name' 
                        WHERE id = '$file_id'
                        " );
                    check_query( $result );
                    
                    redirect_to( "show_folder.php?folder_id=${folder_id}" );
                }
            }
        }
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>

<?php include( "includes/head.php" ); ?>

<body>
    <div id="container">
        <?php include( "includes/header.php" ); ?>

        <div id="content-no-margin">

        <form action="rename.php" method="post" name="rename_form">
            <fieldset>
                <?php

                if( isset( $_GET[ 'folder_id' ] ))
                    $folder_id = $_GET[ 'folder_id' ];
                
                if( isset( $_GET[ 'file_id' ] ))
                    $file_id = $_GET[ 'file_id' ];

                $filename = get_filename_by_id( $folder_id, $file_id );
                echo( "<legend>New name for file '{$filename}'</legend>" );
                ?>

                <label for="new_name"></label>
                <input type="text" name="new_name"/><br/>
                <?php
                    if( isset( $folder_id ))
                        echo( "<input type=\"hidden\" name=\"folder_id\" value={$folder_id} />" );
                    if( isset( $file_id ))
                        echo( "<input type=\"hidden\" name=\"file_id\" value={$file_id} />" );
                ?>
                <br/>
                <input type='submit' name="submit" class='button' value='Rename'/>
            </fieldset>
        </form>

        </div>

        <?php include( "includes/footer.php" ); ?>
    </div>
</body>

</html>
