<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>

<?php require_once( "includes/functions.php" ); ?>
<?php include( "includes/head.php" ); ?>

<body>
    <div id="container">
        <?php include( "includes/header.php" ); ?>
        
        <div id="content-no-margin">
            <form id="login" name="login">
                <fieldset>
                    <legend>Login Details</legend>
                    <label for="name">    User ID: </label><input type="text" id="name" name="name"><br/>
                    <label for="password">Password:</label><input type="password" name="password"><br/>
                    <input type='button' id='login-button' class='button' value='Login'/>
                </fieldset>
            </form>
        </div>

        <?php include( "includes/footer.php" ); ?>
    </div>
</body>

</html>
