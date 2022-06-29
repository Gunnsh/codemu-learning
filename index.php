<?php
session_start();

$host = 'localhost';
$user = 'root';
$pass = 'root';
$name = 'mydb';

$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "set names 'utf8'");
?>

<?php if (!empty($_SESSION['auth']) and $_SESSION['auth'] === true) { ?>
<form method="POST">
	<p>Ваше имя</p>
	<input name="name">
	<p>Ваш возраст</p>
	<input name="age">
	<p>Ваш доход</p>
	<input name="salary">
	<input type="submit">
</form>
<?php } else {
	echo "Эта часть для неавторизованных пользователей!";
}?>

<?php
if (!isset($_POST['name']) or $_POST['name'] == '') {
	echo "Введите правильные данные";
} else {
	$user_name = $_POST['name'];
	$user_age = $_POST['age'];
	$user_salary = $_POST['salary'];

	$query = "INSERT INTO users (name, age, salary) VALUES ('$user_name', '$user_age', '$user_salary')";
	mysqli_query($link, $query);
	
	$_SESSION['flash'] = 'форма успешно сохранена';
	header("Location: page.php");
}
echo $_SESSION['flash'];
?>