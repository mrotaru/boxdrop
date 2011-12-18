<?php require_once( "includes/session.php" ); ?>
<?php require_once( "includes/connection.php" ); ?>
<?php require_once( "includes/functions.php" ); ?>
<?php require_once( "includes/box_drop_functions.php" ); ?>

<?php

if( isset( $_POST[ 'submit' ] ))
{




    redirect_to( "files.php" );
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

            <form method="post" action="new_folder.php" enctype="multipart/form-data"> 
                 <div id="form-container">
                    <fieldset>
                        <legend>New Folder Name</legend>
                        <label for="folder_name">Description:</label> 
                        <input type="text" name="folder_name" size="40"/> 
                        <br/>
                        <p>
                            <input type='submit' name='submit' class='button' value='Create'" />
                        </p>
                    </fieldset>
                 </div>
             </form>

        </div>

        <?php include( "includes/footer.php" ); ?>
    </div>
</body>

</html>
