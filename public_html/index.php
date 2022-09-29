<?php include "database/db_connect.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Book Recommendations</title>
	<!-- 
	<link rel="stylesheet" href="https://fonts.xz.style/serve/inter.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@exampledev/new.css@1.1.2/new.min.css"> -->


</head>

<body>

	<?php
	// initialize variables
	$book_title = "";
	$author = "";
	$update = false;

	// Check for rest action
	if ($_POST) {

		// Check if Edit has been called
		if ($_POST["rest_action"] == "edit") {

			// Get book by ID
			$id = $_POST['book_id'];
			$update = true;
			$query = "SELECT * FROM books WHERE id=$id";
			$result = $db->query($query);
			$book = $result->fetchArray();
		}
	}
	?>

	<?php
	// Get all books
	$query = "SELECT * FROM books";

	$results = $db->query($query);
	?>
	<header>
		<h1>Book Recommendations CRUD demo</h1>
	</header>

	<section>
		<table>
			<thead>
				<tr>
					<th>Book Title</th>
					<th>Author</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>

			<?php while ($row = $results->fetchArray()) { ?>
				<tr>
					<td><?php echo $row['book_title']; ?></td>
					<td><?php echo $row['author']; ?></td>
					<td>

						<form method="POST">
							<input type="hidden" name="book_id" value="<?php echo $row['id'] ?>">
							<input type="hidden" name="rest_action" value="edit">
							<button>Edit</button>
						</form>

					</td>
					<td>

						<form action="app.php" method="POST">
							<input type="hidden" name="book_id" value="<?php echo $row['id'] ?>">
							<input type="hidden" name="rest_action" value="delete">
							<button>Delete</button>
						</form>

					</td>
				</tr>
			<?php } ?>
		</table>
	</section>

	<section>
		<form method="post" action="app.php">

			<p>
				<label for="book_title">Book Title</label> <br>
				<input type="text" name="book_title" value="<?php echo $book["book_title"] ?? '' ?>">
			</p>

			<p>
				<label for="author">Author</label> <br>
				<input type="text" name="author" value="<?php echo $book["author"] ?? '' ?>">
			</p>

			<p>
				<?php if ($update == true) : ?>
					<input type="hidden" name="book_id" value="<?php echo $id; ?>">
					<input type="hidden" name="rest_action" value="update">
					<button type="submit" name="update">Update</button>
				<?php else : ?>
					<input type="hidden" name="rest_action" value="store">
					<button type="submit" name="save">Save</button>
				<?php endif ?>
			</p>

		</form>
	</section>




</body>

</html>