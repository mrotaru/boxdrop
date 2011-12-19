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
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password1 = $_POST["password1"];
            $password2 = $_POST["password2"];
            
            try
            {
                // --> check: required fields are not empty  ------------------
                if( !filled_out( $_POST ))
                {
                    throw new Exception
                        ( "Please fill in all the fields." );
                }

                // --> check: chosen user name is not taken -------------------
                $query = "
                    SELECT * FROM users 
                    WHERE username = '$username'
                    ";
                $found_user = mysql_query( $query );
                check_query( $found_user );
        
                if( mysql_num_rows( $found_user ) != 0 )
                {
                    throw new Exception (
                        "User name is already taken; please go back and choose a different one." );
                } 

                // --> check: valid email address -----------------------------
                if( !valid_email( $email ))
                {
                    throw new Exception (
                        "Please make sure a valid e-mail address is entered." );
                }
                
                // --> check: password is not too short or too long -----------
                if( strlen( $password1 ) < 6 || strlen( $password1 ) > 15 )
                {
                    throw new Exception (
                        "The password must have between 6 and 15 characters." );
                }

                // --> check: password is the same in the two input boxes -----
                if( $password1 != $password2 )
                {
                    throw new Exception
                        ( "The passwords are not the same; please go back and make sure the same password is
                        entered in both the 'Password' fields." );
                }

                $hashed_password = sha1( $password1 );
                register( $username, $email, $hashed_password );

                // login the user

                // get his id
                $result = mysql_query( "
                    SELECT id, username FROM users
                    WHERE username = '${username}'
                    " );
                check_query( $result );
               
                $user_id_name = mysql_fetch_array( $result );
                
                $_SESSION['user_id'] = $user_id_name[ 'id' ];
                $_SESSION['user_name'] = $user_id_name[ 'username' ];

            }
            catch( Exception $e )
            {
                echo $e->getMessage();
                exit;
            }

            echo( "Successfully registered !" );

            ?>

        </div>

        <?php include( "includes/footer.php" ); ?>
    </div>
</body>

</html>
