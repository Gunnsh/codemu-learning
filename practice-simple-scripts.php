// Напишите скрипт, который будет преобразовывать температуру из градусов Цельсия в градусы Фаренгейта.
	<form action="" method="GET">
		<p><h3>Напишите градусы одним числом</h3></p>
		<input name="degree" value=<?php if(!empty($_GET['degree'])) echo $_GET['degree']; ?>>
		<input type="submit">
	</form>
		<p><h4>Конвертация градусов в Фаренгейт: <?php if(!empty($_GET)) echo ($_GET['degree'] * (9 / 5)) + 32; ?></h4><p>

// Напишите скрипт, который будет считать факториал числа.
	<form action="" method="GET">
		<p><h3>Напишите число</h3></p>
		<input name="faq" value=<?php if(!empty($_GET['faq'])) echo $_GET['faq']; ?>>
		<input type="submit">
	</form>

	<?php function faq ($num) { // Эту функцию можно вынести в отдельный файл, для этого нужно прописывать адрес в action
		for ($i = 1, $j = 1; $i <= $num; $i++) {
			$j *= $i;
		}
		return $j;
	}?>

	<p><h4>Факториал заданного числа равен <?php if(!empty($_GET)) echo faq($_GET['faq']); ?></h4><p>

// Дан инпут и кнопка. В инпут вводится число. По нажатию на кнопку выведите список делителей этого числа.
	<form action="" method="GET">
		<p><h3>Напишите число</h3></p>
		<input name="div" value=<?php if(!empty($_GET['div'])) echo $_GET['div']; ?>>
		<input type="submit">
	</form>

	<?php function div($num) {
		$dividers = '';
		for ($i = 2; $i < $num; $i++) {
			if($num % $i === 0) {
				$dividers .= " $i";
			}
		} // тут можно добавить условие, которое ретурнит 'это простое число', если не будет $i
		return $dividers;
	}?>

	<p><h4>Делители заданного числа: <?php if(!empty($_GET)) echo div($_GET['div']); ?></h4><p>

// Даны 2 инпута и кнопка. В инпуты вводятся числа. По нажатию на кнопку выведите список общих делителей этих двух чисел.
	<form action="" method="GET">
		<p><h3>Напишите число</h3></p>
		<input name="num1" value=<?php if(!empty($_GET['num1'])) echo $_GET['num1']; ?>>
		<input name="num2" value=<?php if(!empty($_GET['num2'])) echo $_GET['num2']; ?>>
		<input type="submit">
	</form>

	<?php function div($num1, $num2) {
		$dividers1 = [];
		$dividers2 = [];
		for ($i = 2, $j = 2; $i < $num1, $j < $num2; $i++, $j++) {
			if($num1 % $i === 0) {
				$dividers1[] = $i;
			}
			if($num2 % $j === 0) {
				$dividers2[] = $j;
			}
		}
		return implode(' ', array_intersect($dividers1, $dividers2));
	}?>

	<p><h4>Общие делители заданных чисел: <?php if(!empty($_GET)) echo div($_GET['num1'], $_GET['num2']); ?></h4><p>

// Напишите скрипт, который будет находить корни квадратного уравнения. Воспользуюсь простым решением через дискриминант
	<form action="" method="GET">
		<p><h3>Напишите коэффициенты уравнения 'ax^2+bx+c=0'</h3></p>
		<label id="numa">a =</label>
			<input id="numa" name="a" value=<?php if(!empty($_GET['a'])) echo $_GET['a']; ?>>
		<label id="numb">b =</label>
			<input id="numb" name="b" value=<?php if(!empty($_GET['b'])) echo $_GET['b']; ?>>
		<label id="numc">c =</label>
			<input id="numc" name="c" value=<?php if(!empty($_GET['c'])) echo $_GET['c']; ?>>
		<input type="submit">
	</form>

	<?php function div($numA, $numB, $numC) {
			$D = ($numB ** 2) - (4 * $numA * $numC);
			if($D < 0) echo "Действительных корней нет";
			if($D == 0) echo round((- $numB) / (2 * $numA), 2);
			if($D > 0) echo round(((- $numB) + sqrt($D)) / (2 * $numA), 2). ' ' .round(((- $numB) - sqrt($D)) / (2 * $numA), 2);
	}?>

	<p><h4>Корень(-ни) квадратного уравнения: <?php if(!empty($_GET)) div($_GET['a'], $_GET['b'], $_GET['c']); ?></h4><p>

// Даны 3 инпута. В них вводятся числа. Проверьте, что эти числа являются тройкой Пифагора: квадрат самого большого числа должен быть равен сумме квадратов двух остальных.
	<form action="" method="GET">
		<p><h3>Напишите числа</h3></p>
		<label id="numa">a =</label>
			<input id="numa" name="a" value=<?php if(!empty($_GET['a'])) echo $_GET['a']; ?>>
		<label id="numb">b =</label>
			<input id="numb" name="b" value=<?php if(!empty($_GET['b'])) echo $_GET['b']; ?>>
		<label id="numc">c =</label>
			<input id="numc" name="c" value=<?php if(!empty($_GET['c'])) echo $_GET['c']; ?>>
		<input type="submit">
	</form>

	<?php function Pif($arr) {
		rsort($arr);
		if (($arr[0] ** 2) == ($arr[1] ** 2) + ($arr[2] ** 2)) {
			echo "Да";
		} else { echo "Нет"; }
	}?>

	<p><h4>Являются ли заданные числа тройкой Пифагора: <?php if(!empty($_GET)) Pif($_GET); ?></h4><p>

// Дан инпут и кнопка. В этот инпут вводится дата рождения в формате '01.12.1990'. По нажатию на кнопку выведите на экран сколько дней осталось до дня рождения пользователя.
	<form action="" method="GET">
		<p><h3>Выберите дату дня рождения</h3></p>
			<input type="date" name="date" value=<?php if(!empty($_GET['date'])) echo $_GET['date']; ?>>
		<input type="submit">
	</form>

	<?php function beforeBD($date) {
		$bd = explode('-', $date); // разбиваем строку с датой в массив
		$bd = mktime(0, 0, 0, $bd[1], $bd[2], date('Y') + ($bd[1].$bd[2] <= date('md'))); // переводим в timestamp полученную дату, если месяц и день меньше нынешних, то плюсуем к нынешнему году
		$days_until = ceil(($bd - time()) / 86400); // полученный timestamp минус нынешний и делим на количество секунд в сутках
		echo $days_until;
	}?>

	<p><h4>До следующего дня рождения осталось: <?php if(!empty($_GET)) beforeBD($_GET['date']); ?></h4><p>

// Дан текстареа и кнопка. В текстареа вводится текст. По нажатию на кнопку выведите количество слов и количество символов в тексте.
	<form action="" method="GET">
		<p><h3>Введите текст</h3></p>
			<textarea name="text"><?= $_GET['text'] ?? '' ?></textarea>
		<input type="submit">
	</form>
	<p><h4>В тексте 
		<?php if(!empty($_GET)) echo preg_match_all('#\w+#', $_GET['text']); ?> слов(-a) и 
		<?php if(!empty($_GET)) echo preg_match_all('#\S+#U', $_GET['text']); ?> символов(-а), кроме пробелов.</h4><p>

// Дан текстареа и кнопка. В текстареа вводится текст. По нажатию на кнопку нужно посчитать процентное содержание каждого символа в тексте.
	<form action="" method="GET">
		<p><h3>Введите текст</h3></p>
			<textarea name="text"><?= $_GET['text'] ?? '' ?></textarea>
		<input type="submit">
	</form>

	<?php
	function numbofsym($str) {
		$arr = array_count_values(str_split($str));
		$res = [];
		foreach ($arr as $key => $val) {
			$res[$key] = round(($val / array_sum($arr)) * 100, 2);
		}
		foreach ($res as $key2 => $val2) {
			echo "$key2 - $val2%<br>";
		}
	}
	?>

	<p><h4>В тексте следующее соотношение символов:<br> <?php if(!empty($_GET['text'])) numbofsym($_GET['text']); ?></h4><p>

// Даны 3 селекта и кнопка. Первый селект - это дни от 1 до 31, второй селект - это месяцы от января до декабря, а третий - это годы от 1990 до 2025. С помощью этих селектов можно выбрать дату. По нажатию на кнопку выведите на экран день недели, соответствующий этой дате.
	<form action="" method="GET">
		<p><h3>Выберите дату</h3></p>
		<select name="day">
			<option>Выберите день</option>
			<?php for($i = 1; $i <= 31; $i++) { ?>
				<option><?= $i ?></option>
			<?php } ?>
		</select>
		<select name="month">
			<option>Выберите месяц</option>
			<?php 
				$months = ['january' , 'february' , 'march' , 'april' , 'may' , 'june' , 'july' , 'august' , 'september' , 'october' , 'november' , 'december'];
				foreach ($months as $val) { ?>
				<option><?= $val ?></option>
			<?php } ?>
		</select>
		<select name="year">
			<option>Выберите год</option>
			<?php for($i = 1990; $i <= 2025; $i++) { ?>
				<option><?= $i ?></option>
			<?php } ?>
		</select>
		<input type="submit">
	</form>

	<?php function whatdayisit($arr) {
		$str = strtotime("{$arr['year']}-{$arr['month']}-{$arr['day']}");
		return date('l', $str);
	}
	?>

	<p><h4><?php if(!empty($_GET)) echo whatdayisit($_GET); ?></h4><p>

// Сделайте скрипт-гороскоп. Внутри него хранится массив гороскопов на несколько дней вперед для каждого знака зодиака. По заходу на страницу спросите у пользователя дату рождения, определите его знак зодиака и выведите предсказание для этого знака зодиака на текущий день.
	<?php
		$arrofhor = [
			'Овен' => ['ГорОвенВск', 'ГорОвенПон', 'ГорОвенВт', 'ГорОвенСр', 'ГорОвенЧт', 'ГорОвенПят', 'ГорОвенСб'],
			'Телец' => ['ГорТелВск', 'ГорТелПон', 'ГорТелВт', 'ГорТелСр', 'ГорТелЧт', 'ГорТелПят', 'ГорТелСб'],
			'Близнецы' => ['ГорБлизВск', 'ГорБлизПон', 'ГорБлизВт', 'ГорБлизСр', 'ГорБлизЧт', 'ГорБлизПят', 'ГорБлизСб'],
			'Рак' => ['ГорРакВск', 'ГорРакПон', 'ГорРакВт', 'ГорРакСр', 'ГорРакЧт', 'ГорРакПят', 'ГорРакСб'],
			'Лев' => ['ГорЛевВск', 'ГорЛевПон', 'ГорЛевВт', 'ГорЛевСр', 'ГорЛевЧт', 'ГорЛевПят', 'ГорЛевСб'],
			'Дева' => ['ГорДевВск', 'ГорДевПон', 'ГорДевВт', 'ГорДевСр', 'ГорДевЧт', 'ГорДевПят', 'ГорДевСб'],
			'Весы' => ['ГорВесВск', 'ГорВесПон', 'ГорВесВт', 'ГорВесСр', 'ГорВесЧт', 'ГорВесПят', 'ГорВесСб'],
			'Скорпион' => ['ГорСкрВск', 'ГорСкрПон', 'ГорСкрВт', 'ГорСкрСр', 'ГорСкрЧт', 'ГорСкрПят', 'ГорСкрСб'],
			'Стрелец' => ['ГорСтрелВск', 'ГорСтрелПон', 'ГорСтрелВт', 'ГорСтрелСр', 'ГорСтрелЧт', 'ГорСтрелПят', 'ГорСтрелСб'],
			'Козерог' => ['ГорКозВск', 'ГорКозПон', 'ГорКозВт', 'ГорКозСр', 'ГорКозЧт', 'ГорКозПят', 'ГорКозСб'],
			'Водолей' => ['ГорВодВск', 'ГорВодПон', 'ГорВодВт', 'ГорВодСр', 'ГорВодЧт', 'ГорВодПят', 'ГорВодСб'],
			'Рыбы' => ['ГорРыбВск', 'ГорРыбПон', 'ГорРыбВт', 'ГорРыбСр', 'ГорРыбЧт', 'ГорРыбПят', 'ГорРыбСб']
			]
	?>

	<form action="" method="GET">
		<p>Когда вы родились?</p>
		<input type="date" name="date">
		<input type="submit">
	</form>

	<?php if(!empty($_GET)) {
		$bd = date('nd', strtotime($_GET['date']));

		foreach ($arrofhor as $namehor => $dailyhor) {
			if ($bd >= 321 and $bd <= 419 and $namehor == 'Овен') { ?>
				<p>Ваш знак зодиака <?= $namehor ?>. Ваш прогноз гороскопа на сегодня <?= $dailyhor[date('w')] ?><p>;
			<?php } elseif ($bd > 419 and $bd <= 520 and $namehor == 'Телец') { ?>
				<p>Ваш знак зодиака <?= $namehor ?>. Ваш прогноз гороскопа на сегодня <?= $dailyhor[date('w')] ?><p>;
			<?php } elseif ($bd > 520 and $bd <= 621 and $namehor == 'Близнецы') { ?>
				<p>Ваш знак зодиака <?= $namehor ?>. Ваш прогноз гороскопа на сегодня <?= $dailyhor[date('w')] ?><p>;
			<?php } elseif ($bd > 621 and $bd <= 722 and $namehor == 'Рак') { ?>
				<p>Ваш знак зодиака <?= $namehor ?>. Ваш прогноз гороскопа на сегодня <?= $dailyhor[date('w')] ?><p>;
			<?php } elseif ($bd > 722 and $bd <= 822 and $namehor == 'Лев') { ?>
				<p>Ваш знак зодиака <?= $namehor ?>. Ваш прогноз гороскопа на сегодня <?= $dailyhor[date('w')] ?><p>;
			<?php } elseif ($bd > 822 and $bd <= 922 and $namehor == 'Дева') { ?>
				<p>Ваш знак зодиака <?= $namehor ?>. Ваш прогноз гороскопа на сегодня <?= $dailyhor[date('w')] ?><p>;
			<?php } elseif ($bd > 922 and $bd <= 1023 and $namehor == 'Весы') { ?>
				<p>Ваш знак зодиака <?= $namehor ?>. Ваш прогноз гороскопа на сегодня <?= $dailyhor[date('w')] ?><p>;
			<?php } elseif ($bd > 1023 and $bd <= 1122 and $namehor == 'Скорпион') { ?>
				<p>Ваш знак зодиака <?= $namehor ?>. Ваш прогноз гороскопа на сегодня <?= $dailyhor[date('w')] ?><p>;
			<?php } elseif ($bd > 1122 and $bd <= 1221 and $namehor == 'Стрелец') { ?>
				<p>Ваш знак зодиака <?= $namehor ?>. Ваш прогноз гороскопа на сегодня <?= $dailyhor[date('w')] ?><p>;
			<?php } elseif ($bd > 120 and $bd <= 218 and $namehor == 'Водолей') { ?>
				<p>Ваш знак зодиака <?= $namehor ?>. Ваш прогноз гороскопа на сегодня <?= $dailyhor[date('w')] ?><p>;
			<?php } elseif ($bd > 218 and $bd <= 320 and $namehor == 'Рыбы') { ?>
				<p>Ваш знак зодиака <?= $namehor ?>. Ваш прогноз гороскопа на сегодня <?= $dailyhor[date('w')] ?><p>;
			<?php } elseif (($bd > 1221 or $bd < 121) and $namehor == 'Козерог') { ?>
				<p>Ваш знак зодиака <?= $namehor ?>. Ваш прогноз гороскопа на сегодня <?= $dailyhor[date('w')] ?><p>;
			<?php }
		}
	}
	?>