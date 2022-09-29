<?php include "database/db_connect.php"; 

    if (isset($_GET['del'])) {

        $id = $_GET['del'];
        $query = "DELETE FROM books WHERE rowid=$id";
		$db->exec($query);
        header('location: index.php');

    }

	if (isset($_POST['update'])) {

		$id = $_POST['id'];
		$book_title = $_POST['book_title'];
		$author = $_POST['author'];
	
		$query = "UPDATE books SET book_title='$book_title', author='$author' WHERE rowid=$id";
		$db->exec($query);
		header('location: index.php');

	}

	if (isset($_POST['save'])) {

		$book_title = $_POST['book_title'];
		$author = $_POST['author'];

        // Makes query with post data
        $query = "INSERT INTO books (book_title, author) VALUES ('$book_title', '$author')";
        $db->exec($query);
        header('location: index.php');
		
	}
