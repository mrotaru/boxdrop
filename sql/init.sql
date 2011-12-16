--
-- Create inital database and table
--

-- create database
-- CREATE DATABASE box_drop;

-- USE box_drop;

-- users table
CREATE TABLE users (
    CREATE TABLE users (
    id int(11) NOT NULL auto_increment,
    username varchar(30) NOT NULL,
    email varchar(30) NOT NULL,
    hashed_password varchar(40) NOT NULL,
    PRIMARY KEY (id))
    );

-- add some users
INSERT INTO users ( username, email, hashed_password ) VALUES
( 'derp','derp@gmail.com','85136c79cbf9fe36bb9d05d0639c70c265c18d37' );
