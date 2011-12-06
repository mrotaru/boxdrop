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
            <h2>Welcome to BoxDrop!</h2>
            <p>
            BoxDrop is a service which allows you to have your files at hand,
            wherever you are and from a wide range of devices, including PC,
            Mac, and smartphones.
            </p>

            <p>
            You need to be logged in to use the service.
            </p>

            <?php
//            show_databases();
            ?>

            <input type='button' class='button' value='Login'    onclick="return onClickLogin()" />
            <input type='button' class='button' value='Register' onclick="return onClickRegister()" />

        </div>

        <?php include( "includes/footer.php" ); ?>
    </div>
</body>
        
</html>
