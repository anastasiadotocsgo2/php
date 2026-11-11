<?php
declare(strict_types=1);

// 1. Анонимная функция, меняющая местами аргументы по ссылке
$swap = function (&$a, &$b): void {
	$temp = $a;
	$a = $b;
	$b = $temp;
};

// 2. Функция map, принимающая массив и коллбэк
function map(array $arr, callable $callback): array {
	$result = [];
	foreach ($arr as $item) {
		$result[] = $callback($item);
	}
	return $result;
}

// Пример использования
$a = 5;
$b = 8;
$swap($a, $b);
echo "a = $a, b = $b <br>"; // Выведет: a = 8, b = 5

$numbers = [1, 2, 3, 4, 5];
$squared = map($numbers, fn($n) => $n ** 2);
echo "Квадраты: " . implode(', ', $squared); // Выведет: 1, 4, 9, 16, 25
