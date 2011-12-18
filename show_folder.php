<?php require_once( "includes/session.php" ); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>

<?php require_once( "includes/connection.php" ); ?>
<?php require_once( "includes/functions.php" ); ?>
<?php require_once( "includes/box_drop_functions.php" ); ?>
<?php include( "includes/head.php" ); ?>

<body>
    <div id="container">
        <?php include( "includes/header.php" ); ?>

        <div id="content-no-margin">

            <?php

            $user_id = $_SESSION[ 'user_id' ];
            if( $user_id )
            {
                echo( "Your files and folders:" );

                // show root folder, by default
                if( !isset( $_GET[ 'folder_id' ] ))
                    $folder_id = 1;
                else
                    $folder_id = $_GET[ 'folder_id' ];

                // get info about all the files in the folder
                $folder_name = get_folder_name_by_id( $folder_id );
                $result_files = mysql_query( "
                    SELECT filename, filesize, description, id 
                    FROM user_${user_id}_folder_${folder_name}
                    WHERE 1
                    " );
                check_query( $result_files );

                // for the root folder
                if( $folder_id == 1 ) 
                {
                    // get the list of folders
                    $result_folders = mysql_query( "
                        SELECT id, name, size
                        FROM user_${user_id}_folders
                        WHERE 1
                        " );
                    check_query( $result_folders );
                }


                if( mysql_num_rows( $result_files ) != 0 )
                {
                    // table header
                    echo( "
                        <table> 
                        <tr>
                        <th>Name</th>
                        <th>Size</th>
                        <th>Description</th>
                        <th colspan='3'>Actions</th>
                        </tr>
                        " );

                    // for the root folder
                    if( $folder_id == 1 )
                        // display a fow for each folder
                        while( $folder = mysql_fetch_array( $result_folders ) )
                        {
                            if( $folder[0] != 1 ) // skip the root folder
                            echo( "
                                <tr>
                                <td>
                                    <a class='dir' href='show_folder.php?folder_id=$folder[0]'>
                                    {$folder[1]}</a>
                                </td>
                                <td>{$folder[2]}</td>
                                <td></td>
                                <td class='download-cell action-cell'>
                                </td>
                                <td class='delete-cell action-cell'>
                                    <a href='delete.php?folder_id={$folder[0]}'>Delete</a>
                                </td>
                                <td class='rename-cell action-cell'>
                                    <a href='rename.php?folder_id={$folder[0]}'>Rename</a>
                                </td>
                                </tr>
                                " );
                        }


                    // display a row for each file
                    while( $file = mysql_fetch_array( $result_files ) )
                    {
                        echo( "
                            <tr>
                            <td>{$file[0]}</td>
                            <td>{$file[1]}</td>
                            <td>{$file[2]}</td>
                            <td class='download-cell action-cell'>
                                <a href= 'download.php?folder_id=${folder_id}&amp;file_id={$file[3]}'>Download</a>
                            </td>
                            <td class='delete-cell action-cell'>
                                <a href='delete.php?folder_id=${folder_id}&amp;file_id={$file[3]}'>Delete</a>
                            </td>
                            <td class='rename-cell action-cell'>
                                <a href='rename.php?folder_id=${folder_id}&amp;file_id={$file[3]}'>Rename</a>
                            </td>
                            </tr>
                            " );
                    }
                    echo( "</table>" );
                }
                echo( "<br/>" );
            }
            
            ?>
                
            <?php

            // "Upload" button
            echo ("
                <input type='button' class='button' value='Upload'
                onclick=\"window.location='upload.php?folder_id=$folder_id';\" />
              ");

            // "New Folder" button
            if( $folder_id == 1 )
                echo( "
                    <input type='button' class='button' value='New Folder' 
                    onclick=\"window.location='new_folder.php?folder_id=$folder_id'\" />
                  ");
            ?>

        </div>

        <?php include( "includes/footer.php" ); ?>
    </div>
</body>
        
</html>
