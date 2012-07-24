--
-- Create the application's database, initializing it with a user named 'derp'
--

-- delete database, if existing
DROP DATABASE IF EXISTS `m00292261_box_drop`;

-- remove database user
DROP USER 'm00292261'@'localhost';

-- create database
CREATE DATABASE IF NOT EXISTS `m00292261_box_drop`;

-- create database user
CREATE USER 'm00292261'@'localhost' IDENTIFIED BY 'asdasd';

-- give all privileges for username-prefix databases
GRANT ALL PRIVILEGES ON `m00292261\_%` . * TO 'm00292261'@'localhost';

-- use database
USE `m00292261_box_drop`;

-- users table
CREATE TABLE IF NOT EXISTS `users` (
    id int(11) NOT NULL auto_increment,
    username varchar(30) NOT NULL,
    email varchar(30) NOT NULL,
    hashed_password varchar(40) NOT NULL,
    PRIMARY KEY (id)
    );

-- add some users
INSERT INTO `users` ( username, email, hashed_password ) VALUES (
    'derp','derp@gmail.com','85136c79cbf9fe36bb9d05d0639c70c265c18d37'
);

-- create derp's table for folders
CREATE TABLE IF NOT EXISTS user_1_folders (
    id int(11) NOT NULL auto_increment,
    name varchar(255) NOT NULL,
    size int(11),
    nr_files int(6),
    public boolean,
    PRIMARY KEY (id)
);

-- create derp's root folder
CREATE TABLE IF NOT EXISTS user_1_folder_root (
    id int(11) NOT NULL auto_increment,
    filename varchar(255) NOT NULL,
    filetype varchar(30),
    filesize int(11) NOT NULL,
    data LONGBLOB NOT NULL,
    description varchar(100),
    PRIMARY KEY (id)
);

-- add the root folder to the table of folders
INSERT INTO user_1_folders
        ( id,  name , size, nr_files, public )
VALUES  ( '', 'root', 0   , 0       , false  );
