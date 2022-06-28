<meta charset="utf-8">
<?php
	$host = 'localhost';
	$user = 'root';
	$pass = 'root';
	$name = 'mydb';

	$link = mysqli_connect($host, $user, $pass, $name); // присваиваем переменной обьект соединения с базой данных
	mysqli_query($link, "set names 'utf8'");

	if (!empty($_GET)) {
		$del = $_GET['del'];
		$querytwo =
		"DELETE FROM users
		WHERE id = $del";
		mysqli_query($link, $querytwo);
	}

	$query = 
	"SELECT *
	FROM users";
	$result = mysqli_query($link, $query) or die(mysqli_error($link)); // присваиваем переменной обьект запроса к бд через обьект соединения
	for ($arr = []; $row = mysqli_fetch_assoc($result); $arr[] = $row);
?>

<table>
	<tr>
		<th>id</th>
		<th>name</th>
		<th>age</th>
		<th>salary</th>
		<th>delete</th>
	</tr>
	<?php foreach ($arr as $val): ?>
		<tr>
			<td><?= $val['id']?></td>
			<td><?= $val['name']?></td>
			<td><?= $val['age']?></td>
			<td><?= $val['salary']?></td>
			<td><a href="?del=<?= $val['id'] ?>">удалить</a></td>
		</tr>
	<?php endforeach; ?>
</table>