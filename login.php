<?php session_start(); ?>

<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Авторизация</title>
    <style>
    .error {
        color: #FF0000;
    }
    </style>
</head>

<body>

    <?php
$login = $pass = "";
$loginErr = $passErr = $autoErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["login"])) {
		$loginErr = "Введите логин";
	} else {
		$login = test_input($_POST["login"]);
	}

	if (empty($_POST["pass"])) {
		$passErr = "Введите пароль";
	} else {
		$pass = $_POST["pass"];
	}
}

function test_input($date) {
	$date = trim($date);
	$date = stripslashes($date);
	$date = htmlspecialchars($date);
	return $date;
}
?>

    <form action="<?= $_SERVER["PHP_SELF"]?>" method="POST">
        <table align="center">
            <tr>
                <td></td>
                <td><span class="error">* обязательные поля</span></td>
            </tr>
            <tr>
                <td align="right">Логин: </td>
                <td><input name="login" value="<?php if (isset($_POST["login"])) echo $login; ?>">
                    <span class="error">* <?= !empty($autoErr) ? $autoErr : $loginErr ?></span>
                </td>
            </tr>
            <tr>
                <td align="right">Пароль: </td>
                <td><input type="password" name="pass" value="<?php if (isset($_POST["pass"])) echo $pass; ?>">
                    <span class="error">* <?= $passErr ?></span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Отправить"> <a href="register.php">Зарегистрироваться</a></td>
            </tr>
        </table>
    </form>
</body>

<?php
if (($loginErr && $passErr && $autoErr) == "") {
	$link = mysqli_connect('localhost', 'root', 'root', 'mydb');

	if (($login && $pass) != "") {
		$query = "SELECT * FROM users WHERE name='$login'";
		$resquery = mysqli_fetch_assoc(mysqli_query($link, $query));

		if ($resquery !== null) {
			$hash = $resquery["password"];

			if (password_verify($_POST["pass"], $hash)) {
				$_SESSION["auth"] = true;
				$_SESSION["id"] = $resquery["id"];
				$_SESSION["status"] = $resquery["status"];
				header("Location: show.php?id={$resquery['id']}");
			} else { ?>
<p align="center">"Введены неправильные данные"
<p>
    <?php }
		} else { ?>
<p align="center">"Введены неправильные данные"
<p>
    <?php }
	}
}
?>