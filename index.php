<!DOCTYPE html>
<html>
<head>
	<title>PHP SQLite</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
    $dbh = new SQLite3('/workspace/mnt/data--capsule-bdmfjp-x/db.sqlite');
    if(!$dbh){
        echo $dbh->lastErrorMsg();
    } else {
        $query = "CREATE TABLE IF NOT EXISTS books (id INT PRIMARY KEY, name STRING, author STRING)";
        $dbh->exec($query);
    }
?>

<h1>Done</h1>

</body>
</html>
