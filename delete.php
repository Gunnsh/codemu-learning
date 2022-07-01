<?php session_start(); ?>

<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Удаление аккаунта</title>
    <style>
    .error {
        color: #FF0000;
    }
    </style>
</head>

<?php
$pass = $passErr = "";
$id = $_SESSION["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["pass"])) {
        $passErr = "Введите пароль";
    } else {
        $pass = $_POST["pass"];
    }
}
?>

<body>
    <table align="center">
        <form action="" method="POST">
            <tr>
                <td align="right">Пароль: </td>
                <td><input type="password" name="pass">
                    <span class="error"> * <?= $passErr ?></span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Удалить аккаунт"></td>
            <tr>
        </form>
    </table>

<?php
if (($passErr == "") and ($pass != "")) {
    $link = mysqli_connect('localhost', 'root', 'root', 'mydb');
    $query = "SELECT password FROM users WHERE id=$id";
    $result = mysqli_fetch_assoc(mysqli_query($link, $query));
    $pass = password_verify($pass, $result["password"]);

    if ($pass === true) {
        $query = "DELETE FROM users WHERE id=$id";
        mysqli_query($link, $query); ?>
    <p align="center">Данные успешно удалены!</p>
    <?php } else { ?>
    <p align="center">Введены неправильные данные :(</p>
    <?php }
}
?>