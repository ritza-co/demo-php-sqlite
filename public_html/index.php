<?php include "database/db_connect.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Book Recommendations</title>

	<link rel="stylesheet" href="https://fonts.xz.style/serve/inter.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@exampledev/new.css@1.1.2/new.min.css">
	

</head>

<body>

	<?php
	// initialize variables
	$name = "";
	$author = "";
	$update = false;

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$query = "SELECT rowid, name, author FROM books WHERE rowid=$id";
		$result = $dbh->query($query);

		$entry = $result->fetchArray();
		$name = $entry['name'];
		$author = $entry['author'];
	}
	?>

	<?php // Makes query with rowid
	$query = "SELECT name, author FROM books";

	$results = $db->query($query);


	?>
	<header>
		<h1>Book Recommendations CRUD demo</h1>
	</header>


	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Author</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>

		<?php while ($row = $results->fetchArray()) { ?>
			<tr>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['author']; ?></td>
				<td>
					<a href="index.php?edit=<?php echo $row['rowid']; ?>" class="edit_btn">Edit</a>
				</td>
				<td>
					<a href="app.php?del=<?php echo $row['rowid']; ?>" class="del_btn">Delete</a>
				</td>
			</tr>
		<?php } ?>
	</table>

	<form method="post" action="app.php">

		<input type="hidden" name="id" value="<?php echo $id; ?>">

		<p>
			<label for="book_title">Book Title</label>
			<input type="text" name="book_title" value="<?php echo $name; ?>">
		</p>

		<p>
			<label for="author">Author</label>
			<input type="text" name="author" value="<?php echo $author; ?>">
		</p>

		<p>
			<?php if ($update == true) : ?>
				<button type="submit" name="update">Update</button>
			<?php else : ?>
				<button type="submit" name="save">Save</button>
			<?php endif ?>
		</p>

	</form>

</body>
<footer></footer>

</html>