<?php
$url = $_SERVER['REQUEST_URI'];

if (preg_match('#/(?<slag>username\d)#', $url, $match)) {
    $page = include 'view/user.php';
}

if (preg_match('#/list#', $url, $match)) {
    $page = include 'view/dir/all.php';
}

if (preg_match('#/register#', $url, $match)) {
    $page = include 'view/dir/sub/new.php';
}

$layout = file_get_contents('layout.php');
$layout = str_replace('{{ title }}', $page['title'], $layout);
$layout = str_replace('{{ content }}', $page['content'], $layout);

echo $layout;
?>