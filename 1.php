<?php
session_start();
if (!empty($_SESSION['auth']) and $_SESSION['auth'] === true) {
    echo "Вас зовут ".$_SESSION['login'];
    echo " Вы авторизованы!";
    echo $_SESSION['id']; ?>
    <a href="logout.php">Выйти из профиля</a>
<?php } else {
    echo "Вы не авторизованы :("; ?>
    Вернитесь на страницу <a href="login.php">авторизации</a>
<?php }
?>