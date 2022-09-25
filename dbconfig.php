<?php
    class MyDB extends SQLite3
    {
    function __construct()
    {
        $this->open($_ENV["PERSISTENT_STORAGE_DIR"] . '/test.db');
        //$this->open('first.db');
    }
    }
    $dbh = new MyDB();
    // Create connection
    // $dbh = new mysqli($_SERVER["DATABASE_URL"], '', '');

    // // Check connection
    // if ($dbh->connect_error) {
    // die("Connection failed: " . $dbh->connect_error);
    // }
    // echo "Connected successfully";
    if(!$dbh){
    echo $dbh->lastErrorMsg();
    } else {
        $query = "CREATE TABLE IF NOT EXISTS books (id INT PRIMARY KEY, name STRING, author STRING)";
        $dbh->exec($query);
        //echo "Opened database successfully\n";
    }
?>