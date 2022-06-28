// Сделайте так, чтобы в адресной строке можно было отправить GET запрос с id юзера и этот юзер удалялся из БД.

<meta charset="utf-8">
<?php
	$host = 'localhost';
	$user = 'root';
	$pass = 'root';
	$name = 'mydb';

	$link = mysqli_connect($host, $user, $pass, $name); // присваиваем переменной обьект соединения с базой данных
	mysqli_query($link, "set names 'utf8'");
    // блок коннекта в следующих заданиях будет сокращен для удобства

	if (!empty($_GET)) {
		$del = $_GET['del'];
		$querytwo =
		"DELETE FROM users
		WHERE id = $del";
		mysqli_query($link, $querytwo);
	}

	$query = 
	"SELECT *
	FROM users";
	$result = mysqli_query($link, $query) or die(mysqli_error($link)); // присваиваем переменной обьект запроса к бд через обьект соединения
	for ($arr = []; $row = mysqli_fetch_assoc($result); $arr[] = $row);
?>

<table>
	<tr>
		<th>id</th>
		<th>name</th>
		<th>age</th>
		<th>salary</th>
		<th>delete</th>
	</tr>
	<?php foreach ($arr as $val): ?>
		<tr>
			<td><?= $val['id']?></td>
			<td><?= $val['name']?></td>
			<td><?= $val['age']?></td>
			<td><?= $val['salary']?></td>
			<td><a href="?del=<?= $val['id'] ?>">удалить</a></td>
		</tr>
	<?php endforeach; ?>
</table>

// На странице new.php реализуйте форму для добавления нового юзера.

<form action="" method="POST">
	<h2>name</h2>
	<input name="user" value=<?php if(!empty($_POST['user'])) echo $_POST['user']; ?>>
	<h2>age</h2>
	<input name="age" value=<?php if(!empty($_POST['age'])) echo $_POST['age']; ?>>
	<h2>salary</h2>
	<input name="salary" value=<?php if(!empty($_POST['salary'])) echo $_POST['salary']; ?>>
	<input type="submit">
</form>

<?php
	if(!empty($_POST)) {

		// блок коннекта к бд

		$user = $_POST['user'];
		$age = $_POST['age'];
		$salary = $_POST['salary'];

		$query = "INSERT INTO users SET name='$user', age='$age', salary='$salary'";
		mysqli_query($link, $query);
	}
?>

// Реализуйте страницу edit.php для редактирования юзера.

<?php
	// блок коннекта к бд

	$id = $_GET['id'];
	$query = "SELECT * FROM users WHERE id = $id";
	$result = mysqli_query($link, $query);
	$res = mysqli_fetch_assoc($result);
?>

<form action="save.php?id=<?= $_GET['id'] ?>" method="POST">
	<h3><p>Ваше имя</p></h3>
	<input name="name" value=<?= $res['name'] ?>>
	<h3><p>Ваш возраст</p></h3>
	<input name="age" value=<?= $res['age'] ?>>
	<h3><p>Ваш доход</p></h3>
	<input name="salary" value=<?= $res['salary'] ?>>
	<input type="submit">
</form>

<a href="index.php">back</a>

// Реализуйте страницу save.php для сохранения результата редактирования.

<?php
    // блок коннекта к бд

    $id = $_GET['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $salary = $_POST['salary'];
    $query = "UPDATE users SET name='$name', age='$age', salary='$salary' WHERE id='$id'";

    mysqli_query($link, $query) or die(mysqli_error($link));
    echo "Новые данные сохранены!";
?>

<p><a href="edit.php?id=<?= $_GET['id'] ?>">Вернуться на страницу редактирования</a></p>

// Реализуйте страницу с данными профиля пользователя

<?php
	// блок коннекта к бд

	$id = $_GET['id'];
	$query = "SELECT * FROM users WHERE id = $id";
	$result = mysqli_query($link, $query);
	$resarr = mysqli_fetch_assoc($result);
?>

<div>
	<p>
		имя: <span class="name"><?= $resarr['name'] ?></span>
	</p>
	<p>
		возраст: <span class="age"><?= $resarr['age'] ?></span>,
		зарплата: <span class="salary"><?= $resarr['salary'] ?></span>,
	</p>
</div>

<a href="index.php">back</a>

// Реализуйте заглавную страницу со списком профилей

<?php
	// блок коннекта к бд

	$query = "SELECT * FROM users";
	$result = mysqli_query($link, $query);

	for ($arr = []; $row = mysqli_fetch_assoc($result); $arr[] = $row);
	foreach ($arr as $row): ?>
		<p><?= $row['name'] ?></p><br>
		<a href="show.php?id=<?= $row['id'] ?>">Профиль</a>
		<a href="edit.php?id=<?= $row['id'] ?>">Редактировать</a>
	<?php endforeach;
?>