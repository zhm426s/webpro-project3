<?php
include_once "db_userpass.php";

$conn = new mysqli("localhost", $user, $pass);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS aguragai1";
if ($conn->query($sql) === TRUE) {
    echo "Database created or already exists<br>";
} else {
    die("Error creating database: " . $conn->error);
}

// Select DB
$conn->select_db("aguragai1");

// Create users table
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
)";
$conn->query($sql);

// Create scores table
$sql = "CREATE TABLE IF NOT EXISTS scores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    mode VARCHAR(20),
    moves INT,
    time INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($sql);

echo "Tables created successfully";
?>