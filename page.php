<?php
session_start();

if (isset($_SESSION['flash'])) {
	echo $_SESSION['flash'];
	unset($_SESSION['flash']);
}
?>

<a href="index.php">Вернуться</a>