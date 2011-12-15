<?php require_once( "includes/session.php" ); ?>

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

            <form method="post" action="process_upload.php" enctype="multipart/form-data"> 
                 <div id="form-container">
                    <fieldset>
                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/> 
                        <label for="form_file">File to upload:</label> 
                        <input type="file" name="form_file" size="40"/> 
                        <br/>
                        <label for="form_description">Description:</label> 
                        <input type="text" name="form_description" size="40"/> 
                        <br/>
                        <p>
                            <input type='submit' name='submit' class='button' value='Upload' onclick="window.location='upload_process.php'" />
                        </p>
                    </fieldset>
                 </div>
             </form>

        </div>

        <?php include( "includes/footer.php" ); ?>
    </div>
</body>

</html>
