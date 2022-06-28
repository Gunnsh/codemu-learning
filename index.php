<?php
	$host = 'localhost';
	$user = 'root';
	$pass = 'root';
	$name = 'mydb';

	$link = mysqli_connect($host, $user, $pass, $name);
	mysqli_query($link, "set names 'utf8'");

	$query = "SELECT * FROM users";
	$result = mysqli_query($link, $query);

	for ($arr = []; $row = mysqli_fetch_assoc($result); $arr[] = $row);
	foreach ($arr as $row): ?>
		<p><?= $row['name'] ?></p><br>
		<a href="show.php?id=<?= $row['id'] ?>">Профиль</a>
		<a href="edit.php?id=<?= $row['id'] ?>">Редактировать</a>
	<?php endforeach;
?>