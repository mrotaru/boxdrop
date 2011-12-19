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
            <form id="login" action="process_login.php" method="post" name="login">
                <fieldset>
                    <legend>Login Details</legend>
                    <label for="username">User ID: </label><input type="text" id="username" name="username"/><br/>
                    <label for="password">Password:</label><input type="password" name="password"/><br/>
                   <input type='submit' id='login-button' name="submit" class='button' value='Login'/>
                </fieldset>
            </form>
        </div>

        <?php include( "includes/footer.php" ); ?>
    </div>
</body>

</html>
