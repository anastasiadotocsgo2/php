<?php
declare(strict_types=1);

/*
ЗАДАНИЕ 1, 2, 3, 4
*/
/**
 * Отрисовываем HTML-таблицу умножения.
 * 
 * @param int $cols Количество столбцов (по умолчанию 10).
 * @param int $rows Количество строк (по умолчанию 10).
 * @param string $color Цвет фона заголовков (по умолчанию 'yellow').
 * @return int Общее количество вызовов функции.
 */
function getTable(int $cols = 10, int $rows = 10, string $color = 'yellow'): int {
	static $count = 0;
	$count++;

	echo "<table style='margin-bottom: 20px;'>";
	for ($i = 1; $i <= $rows; $i++) {
		echo "<tr>";
		for ($j = 1; $j <= $cols; $j++) {
			$value = $i * $j;
			if ($i === 1 || $j === 1) {
				echo "<th style='background-color: $color; text-align: center;'>$value</th>";
			} else {
				echo "<td>$value</td>";
			}
		}
		echo "</tr>";
	}
	echo "</table>";
	
	return $count;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Таблица умножения</title>
	<style>
		table { border: 2px solid black; border-collapse: collapse; }
		th, td { padding: 10px; border: 1px solid black; }
	</style>
</head>
<body> 
	<h1>Таблица умножения</h1>
	<?php
	/*
	ЗАДАНИЕ 5
	*/
	echo "<h2>1. Без параметров (по умолчанию 10x10)</h2>";
	getTable();

	echo "<h2>2. С одним параметром (5 столбцов)</h2>";
	getTable(5);

	echo "<h2>3. С двумя параметрами (6 строк, 8 столбцов)</h2>";
	getTable(8, 6);

	echo "<h2>4. С тремя параметрами (красный фон)</h2>";
	$totalCalls = getTable(4, 4, 'lightcoral');

	echo "<p><b>Общее число вызовов функции getTable(): $totalCalls</b></p>";
	?> 
</body>
</html>
