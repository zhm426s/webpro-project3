<?php
// include this file in all other php files

require_once "db_userpass.php";
/* for $user and $pass variables:
    make a file called db_userpass.php and have these be the contents:

    "<?php

    $user = ""; // add your GSU username
    $pass = ""; // add your sql password (should be the same as username)"

    this file is added to the .gitignore file and will not be posted
    this way passwords are protected from github
    still upload this file to codd
*/

// create connection
$server = "localhost";
$conn = new mysqli($server, $user, $pass);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// create and initialize database
$sql = "CREATE DATABASE IF NOT EXISTS pw2";

$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS scores (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        mode VARCHAR(10) NOT NULL,
        moves INT NOT NULL,
        complete_time TIME NOT NULL,
        timestamp TIMESTAMP NOT NULL
        )";
$conn->query($sql)

// api: functions for interacting with the database

