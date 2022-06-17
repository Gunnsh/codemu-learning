<?php
	function abcNum($num) {
		$numbers = [1 => 'один', 2 => 'два', 3 => 'три', 4 => 'четыре', 5 => 'пять',
		6 => 'шесть', 7 => 'семь', 8 => 'восемь', 9 => 'девять', 0 => ''];
		$tens = [1 => 'десять', 2 => 'двадцать', 3 => 'тридцать', 4 => 'сорок', 5 => 'пятьдесят',
		6 => 'шестьдесят', 7 => 'семьдесят', 8 => 'восемьдесят', 9 => 'девяносто', 0 => ''];
		$hundreds = [1 => 'сто', 2 => 'двесть', 3 => 'триста', 4 => 'четыреста', 5 => 'пятьсот',
		6 => 'шестьсот', 7 => 'семьсот', 8 => 'восемьсот', 9 => 'девятьсот', 0 => ''];

		if (strlen("$num") == 3) {
			$ones = strtr($num[2], $numbers);
			$twos = strtr($num[1], $tens);
			$threes = strtr($num[0], $hundreds);
			echo $threes.' '.$twos.' '.$ones;
		} elseif (strlen("$num") == 2) {
			$ones = strtr($num[1], $numbers);
			$twos = strtr($num[0], $tens);
			echo $twos.' '.$ones;
		} else { 
			$ones = strtr($num, $numbers);
			echo $ones;
		}
	}

	abcNum('5');