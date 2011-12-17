<?php require_once( "includes/session.php" ); ?>
<?php require_once( "includes/connection.php" ); ?>
<?php require_once( "includes/functions.php" ); ?>

<?php

if( isset( $_SESSION[ 'user_id' ] ))
{
    $user_id = $_SESSION[ 'user_id' ];

    if( isset( $user_id ))
        if( isset($_POST['submit']) && isset( $_POST[ 'file_id' ]) ) 
        {
            if( isset( $_POST[ 'new_name' ] ))
            {
                $file_id  = $_POST[ 'file_id' ];
                $new_name = $_POST[ 'new_name' ];
                $result = mysql_query( "
                    UPDATE user_${user_id}_folder_root
                    SET filename = '$new_name' 
                    WHERE id = '$file_id'
                    " );
                check_query( $result );
                redirect_to( "files.php" );
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

//                show_get_superglobal();
//                show_post_superglobal();
                
                if( isset( $_POST[ 'new_name' ] ))
                {
                    $file_id = $_POST[ 'file_id' ];
                }
                else
                {
                    $file_id = $_GET[ 'file_id' ];
                }

                echo( "<legend>New name for file #{$file_id}</legend>" );
                ?>

                <label for="new_name"></label>
                <input type="text" name="new_name"/><br/>
                <?php
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
