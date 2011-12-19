<div id="footer">
    Copyright 슩 2011 Mihai Rotaru. All rights reserved.<br/>
    [ <a href="mailto:mihai.rotaru@gmx.com">contact</a> ]

    <?php // close database; bad code smell
    if( isset( $connection ))
    {
        mysql_close( $connection );
    }
    ?>
</div>
