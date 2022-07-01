<?php session_start(); ?>

<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Админка</title>
</head>

<?php
if (!empty($_SESSION["auth"]) and $_SESSION["status"] === "admin") {
$link = mysqli_connect('localhost', 'root', 'root', 'mydb');
$query = "SELECT name, status FROM users";
$result = mysqli_query($link, $query);

for ($i = 1, $user_status = []; $row = mysqli_fetch_assoc($result); $i++) {
if (!$row) { break; }
$user_status[$row["name"]] = $row["status"];
} ?>

<table align="center">
    <col style="background: #FFC0CB;">
    <col style="background: #98FB98;">
    <?php foreach ($user_status as $key => $val) { ?>
    <tr>
        <td><?= $key ?></td>
        <td><?= $val ?></td>
        <td><a href="admin.php?id=<?php // сюда нужно передать айди удаляемого ?>">
                <button type="submit">Delete</button>
            </a></td>
    </tr>
    <?php } ?>
</table>

<?php } else { ?>
<p align="center">Выполните вход на сайт в роли админа <a href="login.php">Авторизация</a></p>
<?php }
?>