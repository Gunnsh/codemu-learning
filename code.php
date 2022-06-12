<?php
	$str = 'abcdefghklmnopqrstuvwxyz';

	$arr = str_split(str_shuffle($str), 6);
	foreach ($arr as $val) {
		$str = $val;
		break;
	}

	echo $str;