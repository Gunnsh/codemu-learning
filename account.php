<?php session_start(); ?>

<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Редактировать профиль</title>
</head>

<body>
    <header align="center"><b>
            <?php if (isset($_SESSION["status"])) echo $_SESSION["name"]." - ".$_SESSION["status"]; ?>
        </b><?php if (isset($_SESSION["status"]) && $_SESSION["status"] == "admin") { ?><a
            href="admin.php">Админка</a><?php } ?></header>

    <?php
$link = mysqli_connect('localhost', 'root', 'root', 'mydb');
mysqli_query($link, "set names 'utf8'");

$id = $_SESSION["id"];
$query = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_fetch_assoc(mysqli_query($link, $query));
?>

    <table align="center">
        <form action="" method="POST">
            <tr>
                <td align="right">Логин: </td>
                <td><input name="name" value="<?= $result["name"] ?>"></td>
            </tr>
            <tr>
                <td align="right">Email: </td>
                <td><input name="email" value="<?= $result["email"] ?>"></td>
            </tr>
            <tr>
                <td align="right">Дата рождения: </td>
                <td><input name="birthdate" type="date" value="<?= $result["birthdate"] ?>"></td>
            </tr>
            <tr>
                <td align="right">Страна проживания: </td>
                <td><input name="country" value="<?= $result["country"] ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit"></td>
            <tr>
        </form>
    </table>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST["name"];
	$email = $_POST["email"];
	$birth = $_POST["birthdate"];
	$country = $_POST["country"];

	$query = "UPDATE users SET name='$name', email='$email', birthdate='$birth', country='$country' WHERE id=$id";
	$result = mysqli_query($link, $query);
	if ($result) { ?>
    <p align="center">Данные сохранены успешно!
    <p>
        <?php }
}
?>

    <p align="center"><a href="changePass.php">Сменить пароль</a>
    <p>
    <p align="center"><a href="delete.php">Удалить аккаунт</a>
    <p>