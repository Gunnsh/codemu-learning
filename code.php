<?php
	$day = date_create(date('Y-m-d'));

	date_modify($day, '-100 days');
	$str = date_format($day, 'j F Y');
	$val = date('D', strtotime($str));

	echo $val;