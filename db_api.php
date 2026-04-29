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
        mode VARCHAR(10),
        moves INT,
        complete_time TIME,
        this_time TIMESTAMP
        )";
$conn->query($sql)

// api: functions for interacting with the database

// insert_user: takes an inputted name and inserts a new entry into the database
// returns: new id
// when to use: index.php: a user inputs their name to start a game (create a session for that user with their id as a variable, end session if game is won)
function insert_user($name) {
    $conn = $GLOBALS['conn'];

    $sql = "INSERT INTO scores (username) VALUES (?)";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $name);
        $stmt->execute();
        return $conn->insert_id;
    }
    else {
        return -1; // if value is -1, use error handling
    }
}

// update_user: takes an id from a session variable to update their mode, moves, etc.
// Parameters: 
// $col_to_update: the name of the column that will be updated ("mode", "moves", "complete_time", or "this_time")
// $new_value: the new value of the column to update
// when to use: index.php: mode is posted, moves is updated, or the game ends (and completion time/timestamp (this_time) is recorded)
function update_user($id, $col_to_update, $new_value) {
    $sql = "UPDATE scores SET ?=? WHERE id=?";
    if($stmt = $conn->prepare($sql)) {
        if ($col_to_update === "moves"){
            $stmt->bind_param("sii", $col_to_update, $new_value, $id);
        } else {
            $stmt->bind_param("ssi", $col_to_update, $new_value, $id);
        }

        $stmt->execute();
    }
}

// select_users: select list of all users' scores, ordered by least number of moves
// returns: result (must be iterated through in a while loop to get associative array of each row)
// when to use: generating leaderboard (each row of result is a row in the table)
function select_users() {
    $sql = "SELECT * FROM scores ORDER BY moves";
    return $conn->query($sql);
}

// there is no need for deleting score entries