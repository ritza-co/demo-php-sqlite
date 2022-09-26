<!DOCTYPE html>
<html>
<head>
	<title>PHP SQLite</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
$myfile = fopen("/workspace/mnt/data--capsule-bdmfjp-x/newfile.txt", "w") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\n";
fwrite($myfile, $txt);
fclose($myfile);
?>

<h1>Done</h1>

</body>
</html>
