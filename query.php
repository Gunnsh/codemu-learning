<meta charset="utf-8">
<?php
	$host = 'localhost';
	$user = 'root';
	$pass = 'root';
	$name = 'mydb';

	$link = mysqli_connect($host, $user, $pass, $name); // присваиваем переменной обьект соединения с базой данных
	mysqli_query($link, "set names 'utf8'");

	$query = "SELECT * FROM users ORDER BY name, salary"; // запрос в виде строки
//	mysqli_query($link, $query);
	$result = mysqli_query($link, $query) or die(mysqli_error($link)); // присваиваем переменной обьект запроса к бд через обьект соединения

	for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
//	$row = mysqli_fetch_assoc($result);
	foreach ($data as $val) {
		foreach ($val as $key => $elem) {
			echo $key.' - '.$elem.'<br>';
		}
		echo '<br>';
//		echo $val.'<br>';
	}
?>