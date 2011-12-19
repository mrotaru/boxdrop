<?php require_once( "includes/session.php" ); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<?php require_once( "includes/connection.php" ); ?>
<?php require_once( "includes/functions.php" ); ?>
<?php include( "includes/head.php" ); ?>

<body>
    <div id="container">
        <?php include( "includes/header.php" ); ?>

        <div id="content-no-margin">
            <h2>Welcome to BoxDrop!</h2>
            <p>
            BoxDrop is a service which allows you to have your files at hand,
            wherever you are and from a wide range of devices, including PC,
            Mac, and smartphones.
            </p>

            <?php
                if( !isset( $_SESSION[ 'user_name' ] ))
                    echo( "
                        <p>
                        You need to be logged in to use the service.
                        </p>

                        <input type='button' class='button' value='Login'    onclick='return onClickLogin()' />
                        <input type='button' class='button' value='Register' onclick='return onClickRegister()' />
                    ");
            ?>


        </div>

        <?php include( "includes/footer.php" ); ?>
    </div>
</body>
        
</html>
