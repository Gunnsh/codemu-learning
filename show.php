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
	$resarr = mysqli_fetch_assoc($result);
?>

<div>
	<p>
		имя: <span class="name"><?= $resarr['name'] ?></span>
	</p>
	<p>
		возраст: <span class="age"><?= $resarr['age'] ?></span>,
		зарплата: <span class="salary"><?= $resarr['salary'] ?></span>,
	</p>
</div>

<a href="index.php">back</a>