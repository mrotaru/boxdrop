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

        <?php
            // is this user in the database ?
            $username = $_POST["username"];
            $password = $_POST["password"];
            
            $query = 
                "SELECT * from users
                 WHERE username = '${username}'";
            $found_user = mysql_query( $query );
            check_query( $found_user );
    
            // check if user is in the database
            if( mysql_num_rows( $found_user ) == 0 )
            {
                echo( "User does not exist." );
            } 
            else 
            {
                // check password
                $query = 
                    "SELECT * from users
                    WHERE username = '${username}' 
                    AND password ='${password}'";
                $users_password = mysql_query( $query );
                check_query( $users_password );

                if( mysql_num_rows( $users_password ) !=0  ) 
                {
                    echo( "you are logged in!<br/>
                        but nothing happened; functionality under construction" );
                } 
                else 
                {
                    echo("Incorrect password." );
                }
                
            }

            ?>

        </div>

        <?php include( "includes/footer.php" ); ?>
    </div>
</body>

</html>
