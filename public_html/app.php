<?php 
// Establish database connection
include "database/db_connect.php";

// Check for POST and redirect to home if empty
if ($_POST) {

	// Check for rest_action:delete
	if ($_POST["rest_action"] == "delete") {

		// Get variables from POST request
		$id = $_POST['book_id'];

		// Delete book by ID
		$query = "DELETE FROM books WHERE id=$id";
		$db->exec($query);

		// Redirect to home page
		header('location: index.php');
	}

	// Check for rest_action:update
	if ($_POST["rest_action"] == "update") {

		// Get variables from POST request
		$id = $_POST['book_id'];
		$book_title = $_POST['book_title'];
		$author = $_POST['author'];

		// Update record (book)
		$query = "UPDATE books SET book_title='$book_title', author='$author' WHERE id=$id";
		$db->exec($query);

		// Redirect to home page
		header('location: index.php');
	}

	// Check for rest_action:store
	if ($_POST["rest_action"] == "store") {

		// Get variables from POST request
		$book_title = $_POST['book_title'];
		$author = $_POST['author'];

		// Insert a new record (book) into database
		$query = "INSERT INTO books (book_title, author) VALUES ('$book_title', '$author')";
		$db->exec($query);

		// Redirect to home page
		header('location: index.php');
	}
} else {
	// Redirect to home page
	header('location: index.php');
}
