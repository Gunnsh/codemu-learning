<!DOCTYPE HTML>
<html>
	<head>
		<style>
			.error {color: #FF0000;}
		</style>
	</head>
<body>

<?php
$nameErr = $passErr = $secpassErr = $emailErr = $dateErr = "";
$name = $pass = $secpass = $email = $date = $country = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["name"])) {
		$nameErr = "Введите логин";
	} else {
		$name = test_input($_POST["name"]);
		if (!preg_match("/^\w*$/", $name)) {
			$nameErr = "Логин должен содержать только латинские буквы, цифры и '_'";
		}
		if (strlen($name) > 10 or strlen($name) < 4) {
			$nameErr = "Логин должен быть больше 3 и меньше 11 символов";
		}
	}

	if (empty($_POST["password"])) {
		$passErr = "Введите пароль";
	} else {
		$pass = $_POST["password"];
		if (strlen($pass) > 12 or strlen($pass) < 6) {
			$passErr = "Пароль должен быть больше 5 и меньше 13 символов";
		}
	}

	if (empty($_POST["secondpass"])) {
		$secpassErr = "Введите пароль";
	} else {
		$secpass = $_POST["secondpass"];
		if ($_POST["password"] != $_POST["secondpass"]) {
			$secpassErr = "Пароли не совпадают";
		}
	}

	if (empty($_POST["email"])) {
		$emailErr = "Введите email";
	} else {
		$email = test_input($_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailErr = "Некорректный email";
		}
	}

	if (empty($_POST["date"])) {
		$dateErr = "Выберите дату";
	} else {
		$date = $_POST["date"];
	}

	if (!empty($_POST["country"])) {
		$country = $_POST["country"];
	}
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>

<h2>Регистрация аккаунта</h2>
<p><span class="error">* обязательные поля</span></p>
<form method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
	Логин: <input name="name" value="<?= $name ?>">
	<span class="error">* <?= $nameErr ?></span><br><br>
	Пароль: <input name="password" value="<?= $pass ?>">
	<span class="error">* <?= $passErr ?></span><br><br>
	Подтвердите пароль: <input name="secondpass" value="<?= $secpass ?>">
	<span class="error">* <?= $secpassErr ?></span><br><br>
	Email: <input name="email" value="<?= $email ?>">
	<span class="error">* <?= $emailErr ?></span><br><br>
	Дата рождения: <input type="date" name="date" value="<?= $date ?>">
	<span class="error">* <?= $dateErr ?></span><br><br>
	Страна: <select name="country">
		<?php if (!empty($country)) echo "<option>".$country."</option>"; ?>
		<option>...</option>
		<option>Несколько вариантов реализации</option>
		<option>списка стран</option>
		<option>1. Инклудить второй файл пхп с массивом стран</option>
		<option>2. Залить в бд таблицу стран</option>
		<option>получить из бд в массив</option>
		<option>форичем каждую страну вставить в селект как опшин</option>
	</select><br><br>
	<input type="submit" value="Отправить">
</form>

<?php
if (($nameErr && $passErr && $secpassErr && $emailErr && $dateErr) == "") {
	$host = 'localhost';
	$user = 'root';
	$passconnect = 'root';
	$nameconnect = 'mydb';

	$link = mysqli_connect($host, $user, $passconnect, $nameconnect);
	mysqli_query($link, "set names 'utf8'");

	if (($name && $pass && $email && $date) != "") {
		if ($country != "...") {
			$query = "INSERT INTO users SET name='$name', password='$pass', email='$email', birthdate='$date', country='$country'";
			mysqli_query($link, $query);
		} elseif ($country == "...") {
			$query = "INSERT INTO users SET name='$name', password='$pass', email='$email', birthdate='$date'";
			mysqli_query($link, $query);
		}
	}
}
?>