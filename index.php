<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>

<?php require_once( "includes/connection.php" ); ?>
<?php
//require( "includes/constants.php" );
?>
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
            
//            // delete table
//            echo(" DELETING TABLE users ------------------------</br>");
//            $res = mysql_query( "DROP TABLE users" );
//            check_query( $res );

//            // create table
//            echo(" CREATING TABLE USERS 0000000-----------------</br>");
//            $res = mysql_query( " CREATE TABLE users (
//                                        id int(11) NOT NULL auto_increment,
//                                        username varchar(30) NOT NULL,
//                                        email varchar(30) NOT NULL,
//                                        password varchar(30) NOT NULL,
//                                        PRIMARY KEY (id)
//                                    )");
//            check_query( $res );

            ?>

            <input type='button' class='button' value='Login'    onclick="return onClickLogin()" />
            <input type='button' class='button' value='Register' onclick="return onClickRegister()" />

        </div>

        <?php include( "includes/footer.php" ); ?>
    </div>
</body>
        
</html>
