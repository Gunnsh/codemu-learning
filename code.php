<?php
	$a = 222222;

	$b = str_split("$a");
	$sum = 0;
	$tum = 0;
	foreach ($b as $key => $values) {
		if ($key <=2) {
			$sum += $values;
		}
		if ($key >2) {
			$tum += $values;
		}
	}
	
	if ($sum == $tum) {
		echo "Задача решена правильно!";
	} else {
		echo "Что то идет не так :(";
	}