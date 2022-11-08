<?php 
// Establish database connection
include "database/db_connect.php";

// Check for POST and redirect to home if empty
if ($_POST) {

	// Check for rest_action:delete
	if ($_POST["rest_action"] == "delete") {

		// Get variables from POST request
		$id = $_POST['book_id'];

		// Delete Book by ID (parameterized)
		$stmt = $db->prepare('DELETE FROM books WHERE id=:id');
		$stmt->bindValue(':id',$id,SQLITE3_INTEGER);
		$stmt->execute();

		// Redirect to home page
		header('location: index.php');
	}

	// Check for rest_action:update
	if ($_POST["rest_action"] == "update") {

		// Get variables from POST request
		$id = $_POST['book_id'];
		$book_title = $_POST['book_title'];
		$author = $_POST['author'];

		// Update book record (parametized)
		$stmt = $db->prepare("UPDATE books SET book_title=:book_title, author=:author WHERE id=:id");
		$stmt->bindValue(':book_title',$book_title,SQLITE3_TEXT);
		$stmt->bindValue(':author',$author,SQLITE3_TEXT);
		$stmt->bindValue(':id',$id,SQLITE3_INTEGER);
		
		$stmt->execute();

		// Redirect to home page
		header('location: index.php');
	}

	// Check for rest_action:store
	if ($_POST["rest_action"] == "store") {

		// Get variables from POST request
		$book_title = $_POST['book_title'];
		$author = $_POST['author'];

		// Insert a new book record into database (parametized)
		$stmt = $db->prepare("INSERT INTO books (book_title, author) VALUES (:book_title, :author)");
		$stmt->bindValue(':book_title',$book_title,SQLITE3_TEXT);
		$stmt->bindValue(':author',$author,SQLITE3_TEXT);
		$stmt->execute();

		// Redirect to home page
		header('location: index.php');
	}
} else {
	// Redirect to home page
	header('location: index.php');
}
