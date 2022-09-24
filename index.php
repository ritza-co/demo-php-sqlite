<?php  include('app.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP SQLite</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>

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