<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Список пользователей</title>
	</head>
<body>

<?php
$link = mysqli_connect('localhost', 'root', 'root', 'mydb');
mysqli_query($link, "set names 'utf8'");

$query = "SELECT * FROM users";
$queryresult = mysqli_query($link, $query);

for ($i = 1; $row = mysqli_fetch_assoc($queryresult); $i++) {
	if (!$row) { break; } ?>
	<p align="center"><a href="show.php?id=<?= $row["id"] ?>"> <?= $row["name"] ?></a></p>
<?php }
?>