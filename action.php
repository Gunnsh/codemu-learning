<?php
session_start();

$_SESSION['flash'][] = 'сообщение2';
header("Location: index.php");
?>