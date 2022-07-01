<?php session_start(); ?>
<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Список пользователей</title>
</head>

<body>
    <header align="center"><b>
            <?php if (isset($_SESSION["auth"]) and isset($_SESSION["status"])) echo $_SESSION["name"]." - ".$_SESSION["status"]; ?>
        </b><?php if (isset($_SESSION["status"]) && $_SESSION["status"] == "admin") { ?><a
            href="admin.php">Админка</a><?php } ?></header>

    <?php
$link = mysqli_connect('localhost', 'root', 'root', 'mydb');
mysqli_query($link, "set names 'utf8'");

$query = "SELECT * FROM users";
$queryresult = mysqli_query($link, $query);

for ($i = 1; $row = mysqli_fetch_assoc($queryresult); $i++) {
	if (!$row) { break; } ?>
    <p align="center"><a href="show.php?id=<?= $row["id"] ?>"> <?= $row["name"] ?></a></p>
    <?php }
?>