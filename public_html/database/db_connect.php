<?php 

// Database name
$database_name = getcwd()."/database/my_db.db";


// Database Connection
$db = new SQLite3($database_name);

// Create Table "books" in Database (if doesn't exist)
$query = "CREATE TABLE IF NOT EXISTS books (id INTEGER PRIMARY KEY, book_title STRING, author STRING)";

$db->exec($query);
