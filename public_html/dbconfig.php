<?php
class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open($_ENV["PERSISTENT_STORAGE_DIR"] . '/combadd.sqlite');
    }
}
$dbh = new MyDB();
if (!$dbh) {
    echo $dbh->lastErrorMsg();
} else {
    $query = "CREATE TABLE IF NOT EXISTS books (name STRING, author STRING)";
    $dbh->exec($query);
}
