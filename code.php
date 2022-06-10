<?php
	$arr = [
		1 => 125,
		2 => 225,
		3 => 128,
		4 => 356,
		5 => 145,
		6 => 281,
		7 => 452,
	];
	$arrstr = [];
	$arrnew = [];

	foreach ($arr as $key => $val) {
		$arrstr[] = (string) $val;
	}
	foreach ($arrstr as $kes => $vas) {
		if ($vas[0] == 1 or $vas[0] == 2) {
			$arrnew[] = (int) $vas;
		}
	}
	var_dump($arrnew);
?>