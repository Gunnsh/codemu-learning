<?php
	$path = 'C:/localhost/code.php';

	if (is_file($path)) echo "Это файл!";
	elseif (is_dir($path)) echo "Это папка!";