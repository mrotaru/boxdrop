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
            <form id="register" action="process_register.php" method="post" name="register">
                <fieldset>
                    <legend>Your Details</legend>
                    <label for="username">    User ID: </label><input type="text" id="username" name="username"><br/>
                    <label for="email">   Email: </label><input type="text" id="email" name="email"><br/>
                    <label for="password">Password:</label><input type="password" name="password1"><br/>
                    <label for="password">Password:</label><input type="password" name="password2"><br/>
                    <input type='submit' id='register-button' class='button' value='Register'/>
                </fieldset>
        </div>

        <?php include( "includes/footer.php" ); ?>
    </div>
</body>

</html>
