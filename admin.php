<?php session_start(); ?>

<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Админка</title>
    <style type="text/css">
    .ass {
        font-family: Verdana, Arial, Helvetica, sans-serif;
        color: #333366;
        float: left;
        font-size: 14px;
        width: 150px;
    }
    </style>
</head>

<body>
    <header align="center"><b>
            <?php if (isset($_SESSION["auth"]) and isset($_SESSION["status"])) echo $_SESSION["name"]." - ".$_SESSION["status"]; ?>
        </b><?php if (isset($_SESSION["status"]) && $_SESSION["status"] == "admin") { ?><a
            href="admin.php">Админка</a><?php } ?></header>

    <?php
if (!empty($_SESSION["auth"]) and $_SESSION["status"] === "admin") {
	$link = mysqli_connect('localhost', 'root', 'root', 'mydb');
	$query = "SELECT users.id, name, password, status
	FROM users
	LEFT JOIN statuses
	ON users.status_id=statuses.id";
	$result = mysqli_query($link, $query);

	for ($i = 1, $user_status = []; $row = mysqli_fetch_assoc($result); $i++) {
		if (!$row) { break; }
		$user_status[] = $row;
	}
?>

    <table class="ass">
        <?php foreach ($user_status as $val) { ?>
        <tr <?= $val["status"] === "admin" ? "style=\"background: #FFC0CB;\"" : "style=\"background: #98FB98;\"" ?>>
            <td><?= $val["name"] ?></td>
            <td><?= $val["status"] ?></td>
            <td><a href="admin.php?id=<?= $val["id"] ?>">
                    <button type="submit">Delete</button>
                </a></td>
            <td><a href="admin.php?change=<?= $val["status"] ?>&id=<?= $val["id"] ?>">
                    <button
                        type="submit"><?= $val["status"] === "admin" ? "Сделать юзером" : "Сделать админом" ?></button>
                </a></td>
        </tr>
        <?php } ?>
    </table>

    <?php
	if (isset($_GET["id"])) {
		$id = $_GET["id"];
		if (isset($_GET["change"])) {
			$status = $_GET["change"];
			if ($status === "admin") {
				$query = "UPDATE users SET status='user' WHERE id=$id";
			} else {
				$query = "UPDATE users SET status='admin' WHERE id=$id";
			}
		} else {
			$query = "DELETE FROM users WHERE id=$id";
		}
		mysqli_query($link, $query);
		header("Location: admin.php");
	}
} else { ?>
    <p align="center">Выполните вход на сайт в роли админа <a href="login.php">Авторизация</a></p>
    <?php }
?>