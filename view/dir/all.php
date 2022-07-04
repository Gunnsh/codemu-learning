<?php
$content = '';

$link = mysqli_connect('localhost', 'root', 'root', 'mydb');
$query = "SELECT name FROM users";
$result = mysqli_query($link, $query);

for ($arr = []; $row = mysqli_fetch_assoc($result); $arr[] = $row);
foreach ($arr as $row) {
    $content .=
    '<div>
        <a href="/'. $row['name'] .'">'. $row['name'] .'</a>
    </div>';
}

$res = [
    'title' => 'Список пользователей',
    'content' => $content
];

return $res;
?>