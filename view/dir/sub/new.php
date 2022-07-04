<?php
$content = '
    <form method="post">
        <input name="name">
        <input name="country">
        <input type="submit">
    </form>'; // полная херня, надо в отдельный файл выносить эту форму

$name = $_POST['name'];
$country = $_POST['country'];

$link = mysqli_connect('localhost', 'root', 'root', 'mydb');
$query = "INSERT INTO users (name, country) VALUES ('$name', '$country')";
mysqli_query($link, $query);

$res = [
    'title' => 'Регистрация нового пользователя',
    'content' => $content
];

return $res;
?>