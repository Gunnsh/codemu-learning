<?php session_start(); ?>

<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Смена пароля</title>
    <style>
    .error {
        color: #FF0000;
    }
    </style>
</head>

<?php
$oldpass = $newpass = $againnew = "";
$oldpassErr = $newpassErr = $againnewErr = "";
$id = $_SESSION["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["oldpass"])) {
        $oldpassErr = "Введите старый пароль";
    } else {
        $oldpass = $_POST["oldpass"];
    }

    if (empty($_POST["newpass"])) {
        $newpassErr = "Введите новый пароль";
    } else {
        $newpass = $_POST["newpass"];
    }

    if (empty($_POST["againnew"])) {
        $againnewErr = "Введите новый пароль еще раз";
    } else {
        $againnew = $_POST["againnew"];
    }
}
?>

<body>
    <header align="center"><b>
            <?php if (isset($_SESSION["auth"]) and isset($_SESSION["status"])) echo $_SESSION["name"]." - ".$_SESSION["status"]; ?>
        </b><?php if (isset($_SESSION["status"]) && $_SESSION["status"] == "admin") { ?><a
            href="admin.php">Админка</a><?php } ?></header>
    <table align="center">
        <form action="" method="POST">
            <tr>
                <td align="right">Пароль: </td>
                <td><input type="password" name="oldpass">
                    <span class="error"> * <?= $oldpassErr ?></span>
                </td>
            </tr>
            <tr>
                <td align="right">Новый: </td>
                <td><input type="password" name="newpass">
                    <span class="error"> * <?= $newpassErr ?></span>
                </td>
            </tr>
            <tr>
                <td align="right">Подтвердите новый: </td>
                <td><input type="password" name="againnew">
                    <span class="error"> * <?= $againnewErr ?></span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit"></td>
            <tr>
        </form>
    </table>

    <?php
if (($oldpassErr && $newpassErr && $againnewErr) == "") {
    $link = mysqli_connect('localhost', 'root', 'root', 'mydb');

    if (($oldpass && $newpass && $againnew) != "") {
        $query = "SELECT password FROM users WHERE id=$id";
        $queryresult = mysqli_fetch_assoc(mysqli_query($link, $query));
        $hashcheck = password_verify($oldpass, $queryresult["password"]);

        if ($hashcheck and ($newpass == $againnew)) {
            $newpass = password_hash($newpass, PASSWORD_DEFAULT);
            $query = "UPDATE users SET password='$newpass' WHERE id=$id";
            mysqli_query($link, $query); ?>
    <p align="center">Пароль обновлен успешно!
    <p>
        <?php } else {
            ?>
    <p align="center">Введены неправильные данные :(
    <p>
        <?php
        }
    }
}
?>