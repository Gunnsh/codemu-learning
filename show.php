<?php session_start(); ?>

<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Профиль</title>
</head>

<body>
    <header align="center"><b>
            <?php if (isset($_SESSION["auth"]) and isset($_SESSION["status"])) echo $_SESSION["name"]." - ".$_SESSION["status"]; ?>
        </b><?php if (isset($_SESSION["status"]) && $_SESSION["status"] == "admin") { ?><a
            href="admin.php">Админка</a><?php } ?></header>

    <?php
$id = $_SESSION["id"];

$link = mysqli_connect('localhost', 'root', 'root', 'mydb');
mysqli_query($link, "set names 'utf8'");
$query = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_fetch_assoc(mysqli_query($link, $query));

$username = $result["name"];
$age = date('Y', time()) - date('Y', strtotime($result["birthdate"]));
if (isset($result["country"])) {
	$country = $result["country"];
}
?>

    <table align="center">
        <tr>
            <td>Здравствуйте, <?= $username ?></td>
        </tr>
        <tr>
            <td>Вам <?= $age ?></td>
        </tr>
        <tr>
            <td>Страна проживания: <?php if (isset($country)) echo $country; ?></td>
        </tr>
        <tr>
            <td><a href="account.php">Редактировать</a></td>
        </tr>
    </table>