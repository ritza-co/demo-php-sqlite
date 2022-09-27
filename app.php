<?php include('dbconfig.php');

    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $query = "DELETE FROM books WHERE id=$id";
        $_SESSION['message'] = "Book deleted!"; 
        header('location: index.php');
    }

	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$author = $_POST['author'];
	
		$query = "UPDATE books SET name='$name', author='$author' WHERE rowid=$id";
		$dbh->exec($query);
		$_SESSION['message'] = "Address updated!"; 
		header('location: index.php');
	}

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$author = $_POST['author'];

        // Makes query with post data
        $query = "INSERT INTO books (name, author) VALUES ('$name', '$author')";
        $dbh->exec($query);
        $_SESSION['message'] = "Book saved";
        // header('location: index.php');
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
$query = "SELECT * FROM books";

$results = $dbh->query($query); ?>

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
				<a href="app.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="app.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>

	<form method="post" action="app.php" >
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="">
		</div>
		<div class="input-group">
			<label>Author</label>
			<input type="text" name="author" value="">
		</div>
		<div class="input-group">
			<button class="btn" type="submit" name="save" >Save</button>
		</div>
	</form>
</body>
</html>