<?php include "database/db_connect.php";

// Check for POST and redirect to home if empty
if ($_POST) {

	// Check for delete
	if ($_POST["rest_action"] == "delete") {
		$id = $_POST['book_id'];
		$query = "DELETE FROM books WHERE id=$id";
		$db->exec($query);
		header('location: index.php');
	}

	// Check for update
	if ($_POST["rest_action"] == "update") {

		$id = $_POST['book_id'];
		$book_title = $_POST['book_title'];
		$author = $_POST['author'];
	
		$query = "UPDATE books SET book_title='$book_title', author='$author' WHERE id=$id";
		$db->exec($query);
		header('location: index.php');
	}

	// Check for store
	if ($_POST["rest_action"] == "store") {

		$book_title = $_POST['book_title'];
		$author = $_POST['author'];
	
		// Makes query with post data
		$query = "INSERT INTO books (book_title, author) VALUES ('$book_title', '$author')";
		$db->exec($query);
	
	
		header('location: index.php');
	}


} else {
	header('location: index.php');
}
