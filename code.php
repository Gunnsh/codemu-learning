<?php
	 $str = '1234567890'; // Любые цифры в строке.
	 $arr = str_split($str, 2);
	 echo array_sum($arr);