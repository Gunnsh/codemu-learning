<?php
    $host = 'localhost';
    $user = 'root';
    $pass = 'root';
    $name = 'mydb';

    $link = mysqli_connect($host, $user, $pass, $name);
    mysqli_query($link, "set names 'utf8'");

    $id = $_GET['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $salary = $_POST['salary'];
    $query = "UPDATE users SET name='$name', age='$age', salary='$salary' WHERE id='$id'";

    mysqli_query($link, $query) or die(mysqli_error($link));
    echo "Новые данные сохранены!";
?>

<p><a href="edit.php?id=<?= $_GET['id'] ?>">Вернуться на страницу редактирования</a></p>