<?php
    class MyDB extends SQLite3
    {
    function __construct()
    {
        $this->open($_SERVER["PERSISTENT_STORAGE_DIR"] . '/combadd.sqlite');
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

    // initialize variables
	$name = "";
	$author = "";

    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $query = "DELETE FROM books WHERE id=$id";
        $_SESSION['message'] = "Book deleted!"; 
        header('location: index.php');
    }

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$author = $_POST['author'];

        // Makes query with post data
        $query = "INSERT INTO books (name, author) VALUES ('$name', '$author')";
        $dbh->exec($query);
        $_SESSION['message'] = "Book saved";
        header('location: index.php');
	}
?>