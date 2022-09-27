<?php include('dbconfig.php');

    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $query = "DELETE FROM books WHERE rowid=$id";
		$dbh->exec($query);
        header('location: index.php');
    }

	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$author = $_POST['author'];
	
		$query = "UPDATE books SET name='$name', author='$author' WHERE rowid=$id";
		$dbh->exec($query);
		header('location: index.php');
	}

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$author = $_POST['author'];

        // Makes query with post data
        $query = "INSERT INTO books (name, author) VALUES ('$name', '$author')";
        $dbh->exec($query);
        header('location: index.php');
	}
?>
