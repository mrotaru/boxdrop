<?php require_once( "includes/session.php" ); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<?php require_once( "includes/connection.php" ); ?>
<?php require_once( "includes/functions.php" ); ?>
<?php require_once( "includes/box_drop_functions.php" ); ?>
<?php include( "includes/head.php" ); ?>

<body>
    <div id="container">
        <?php include( "includes/header.php" ); ?>

        <div id="content-no-margin">

            <?php
            echo( "Your files and folders:" );
            show_folder( 1 );
            ?>
                
            <input type='button' class='button' value='Upload' onclick="window.location='upload.php';" />
            <input type='button' class='button' value='New Folder' onclick="window.location='new_folder.php'" />

        </div>

        <?php include( "includes/footer.php" ); ?>
    </div>
</body>
        
</html>
