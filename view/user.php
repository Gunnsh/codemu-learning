<?php
$content = '';
$slag = $match['slag'];
var_dump($match);

$link = mysqli_connect('localhost', 'root', 'root', 'mydb');
$query = "SELECT name, email, birthdate, country, status FROM users LEFT JOIN statuses ON users.status_id=statuses.id WHERE name='$slag'";
$result = mysqli_fetch_assoc(mysqli_query($link, $query));

foreach ($result as $key => $val) {
    $content .=
    "<div>
        $key - $val
    </div>";
}

$arr = [
    'title' => $result['name'],
    'content' => $content
];

return $arr;
?>