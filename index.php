<?php include('dbconfig.php');

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
<!DOCTYPE html>
<html>

<head>
	<title>PHP SQLite</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

	<?php // Makes query with rowid
	$query = "SELECT rowid, name, author FROM books";

	$results = $dbh->query($query); ?>

	<h1>Book Recommendations</h1>

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
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>Author</label>
			<input type="text" name="author" value="<?php echo $author; ?>">
		</div>
		<div class="input-group">
			<?php if ($update == true) : ?>
				<button class="btn" type="submit" name="update" style="background: #556B2F;">Update</button>
			<?php else : ?>
				<button class="btn" type="submit" name="save">Save</button>
			<?php endif ?>
		</div>
	</form>
</body>

</html>