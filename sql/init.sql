--
-- Create inital database and users table
--

-- create database user
CREATE USER 'm00292261'@'localhost' IDENTIFIED BY 'asdasd';

-- give all privileges for username-prefix databases
GRANT ALL PRIVILEGES ON `m00292261\_%` . * TO 'm00292261'@'localhost';

-- create and begin using the database
CREATE DATABASE IF NOT EXISTS `m00292261_box_drop`;
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
INSERT INTO `users` ( username, email, hashed_password ) VALUES
( 'derp','derp@gmail.com','85136c79cbf9fe36bb9d05d0639c70c265c18d37' );
