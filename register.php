<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Регистрация аккаунта</title>
    <style>
    .error {
        color: #FF0000;
    }
    </style>
</head>

<body>

<?php
include 'countries.php';

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
			$nameErr = "Логин должен быть больше 4 и меньше 10 символов";
		}
	}

	if (empty($_POST["password"])) {
		$passErr = "Введите пароль";
	} else {
		$pass = $_POST["password"];
		if (strlen($pass) > 12 or strlen($pass) < 6) {
			$passErr = "Пароль должен быть больше 6 и меньше 12 символов";
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

    <form method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
        <table align="center" cellspacing="0" cellpadding="4">
            <tr>
                <td></td>
                <td><span class="error">* обязательные поля</span></td>
            </tr>
            <tr>
                <td align="right" width="100">Логин: </td>
                <td><input name="name" value="<?= $name ?>">
                    <span class="error">* <?= $nameErr ?></span>
                </td>
            </tr>
            <tr>
                <td align="right">Пароль: </td>
                <td><input type="password" name="password"
                        value="<?php if (isset($_POST["password"])) echo $_POST["password"]; ?>">
                    <span class="error">* <?= $passErr ?></span>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <nobr>Подтвердите пароль: </nobr>
                </td>
                <td><input type="password" name="secondpass"
                        value="<?php if (isset($_POST["secondpass"])) echo $_POST["secondpass"]; ?>">
                    <span class="error">* <?= $secpassErr ?></span>
                </td>
            </tr>
            <tr>
                <td align="right">Email: </td>
                <td><input name="email" value="<?= $email ?>">
                    <span class="error">* <?= $emailErr ?></span>
                </td>
            </tr>
            <tr>
                <td align="right">Дата рождения: </td>
                <td><input type="date" name="date" value="<?= $date ?>">
                    <span class="error">* <?= $dateErr ?></span>
                </td>
            <tr>
                <td align="right">Страна: </td>
                <td><select name="country">
                        <?php if (!empty($country)) echo "<option>".$country."</option>"; ?>
                        <option>...</option>
                        <?php foreach ($countries as $val) { ?>
                        <option><?= $val ?></option>
                        <? } ?>
                    </select></td>
            <tr>
                <td></td>
                <td><input type="submit" value="Отправить"> Зарегистрированы? <a href="login.php">Авторизуйтесь!</a>
                </td>
            </tr>
        </table>
    </form>

<?php
if (($nameErr && $passErr && $secpassErr && $emailErr && $dateErr) == "") {
	$link = mysqli_connect('localhost', 'root', 'root', 'mydb');
	mysqli_query($link, "set names 'utf8'");

	if (($name && $pass && $email && $date) != "") {
		$pass = password_hash($pass, PASSWORD_DEFAULT);
		if ($country != "...") {
			$query = "INSERT INTO users SET name='$name', password='$pass', email='$email', birthdate='$date', country='$country', status_id='2'"; ?>
    <p align="center">Успешная регистрация!</p>
    <?php } elseif ($country == "...") {
			$query = "INSERT INTO users SET name='$name', password='$pass', email='$email', birthdate='$date', status_id='2'"; ?>
    <p align="center">Успешная регистрация!</p>
    <?php }
		mysqli_query($link, $query);
	}
}
?>