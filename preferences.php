<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>

<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <div id="container">
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
                    <li> <a href="login.php">Login </a></li>
                    <li> <a href="preferences.php"> Preferences </a></li>
                    <li> <a href="help.php"> Help </a></li>
                    <li> <a href="index.php"> About </a></li>
                </ul>
            </div>
        </div>
        
        <div id="navigation">
            <ul>
                <li> <a href="">User</a></li>
                <li> <a href="">Display</a></li>
                <li> <a href="">Security</a></li>
            </ul>
        </div>

        <div id="content">
        </div>
        <div id="footer">
            Copyright © 2011 Mihai Rotaru. All rights reserved.<br/>
            [ <a href="mailto:mihai.rotaru@gmx.com">contact</a> ]
        </div>
    </div>
</body>

</html>
