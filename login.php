<?php 
session_start();

if (empty($_POST)) { ?>
<h2>Вы не авторизованы!</h2>
<form action="" method="POST">
	<p>Введите логин</p>
	<input name="name">
	<p>Введите пароль</p>
	<input name="password" type="password">
	<input type="submit">
</form>
<?php
}
if (!empty($_POST['name']) and !empty($_POST['password'])) {
	$login = $_POST['name'];
	$password = $_POST['password'];

	$host = 'localhost';
	$user = 'root';
	$pass = 'root';
	$name = 'mydb';

	$link = mysqli_connect($host, $user, $pass, $name); // присваиваем переменной обьект соединения с базой данных
	mysqli_query($link, "set names 'utf8'");
	$query = "SELECT * FROM users WHERE name='$login' AND password='$password'";
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_assoc($result);

	if (!empty($row)) {
		$_SESSION['auth'] = true;
		$_SESSION['login'] = $login;
		header("Location: 1.php");
	} else {
		echo "Неверно введен логин или пароль";
	};
};
?>
Хотите <a href="register.php">зарегистрироваться</a>?