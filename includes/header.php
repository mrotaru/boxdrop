<?php require_once( "includes/session.php" ); ?>

<div id="header">
    <div id="logo">
        <h1><span class='h1-initial'>B</span>ox<span class='h1-initial'>D</span>rop</h1>
        <a href="index.php"><span id="make-div-link"></span></a>
    </div>
    <div id="search-div">
        <input type="text" id="search" name="search" onfocus="return onClickSearchTextbox()" />
        <input type='button' class='button-small' value='Search' onclick="return onClickSearch()" />
    </div>
    <div id="small-navigation">
        <ul>
            <?php
            if( isset( $_SESSION[ 'user_name' ] ))
            {
                $user_name = $_SESSION[ 'user_name' ];
                echo( "
                    <li>logged in as: <em>{$user_name}</em></li>
                    <li><a href=\"logout.php\">Logout</a></li>"
                );
            }
            else
                echo( "
                    <li> <a href=\"login.php\">Login </a></li>
                    ");
            ?>
            <li> <a href="help.php"> Help </a></li>
            <li> <a href="index.php"> About </a></li>
            <?php
            if( isset( $_SESSION[ 'user_name' ] ))
            {
                $user_name = $_SESSION[ 'user_name' ];
                echo( "
                    <li><a href=\"show_folder.php\">Files</a></li>"
                );
            }
            ?>
        </ul>
    </div>
</div>
