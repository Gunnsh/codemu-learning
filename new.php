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
		var_dump($_POST);

		$host = 'localhost';
		$user = 'root';
		$pass = 'root';
		$name = 'mydb';

		$link = mysqli_connect($host, $user, $pass, $name);
		mysqli_query($link, "set names 'utf8'");

		$user = $_POST['user'];
		$age = $_POST['age'];
		$salary = $_POST['salary'];

		$query = "INSERT INTO users SET name='$user', age='$age', salary='$salary'";
		mysqli_query($link, $query);
	}
?>