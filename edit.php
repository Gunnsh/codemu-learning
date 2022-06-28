<?php
	$host = 'localhost';
	$user = 'root';
	$pass = 'root';
	$name = 'mydb';

	$link = mysqli_connect($host, $user, $pass, $name);
	mysqli_query($link, "set names 'utf8'");

	$id = $_GET['id'];
	$query = "SELECT * FROM users WHERE id = $id";
	$result = mysqli_query($link, $query);
	$res = mysqli_fetch_assoc($result);
?>

<form action="save.php?id=<?= $_GET['id'] ?>" method="POST">
	<h3><p>Ваше имя</p></h3>
	<input name="name" value=<?= $res['name'] ?>>
	<h3><p>Ваш возраст</p></h3>
	<input name="age" value=<?= $res['age'] ?>>
	<h3><p>Ваш доход</p></h3>
	<input name="salary" value=<?= $res['salary'] ?>>
	<input type="submit">
</form>

<a href="index.php">back</a>