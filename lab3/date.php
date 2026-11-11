<?php
declare(strict_types=1);

// ЗАДАНИЕ 1
$now = time();
// Пример дня рождения: 15 мая. Месяц 5, день 15.
$currentYear = (int)date('Y', $now);
$birthdayThisYear = mktime(0, 0, 0, 5, 15, $currentYear);

// Если в этом году ДР уже прошел, считаем до следующего
if ($now > $birthdayThisYear) {
    $birthday = mktime(0, 0, 0, 5, 15, $currentYear + 1);
} else {
    $birthday = $birthdayThisYear;
}

$getdate = getdate($now);
$hour = $getdate['hours'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Использование функций даты и времени</title>
</head>
<body>
    <h1>Использование функций даты и времени</h1>
    <?php
    // ЗАДАНИЕ 2
    if ($hour >= 0 && $hour < 6) {
        $welcome = 'Доброй ночи';
    } elseif ($hour >= 6 && $hour < 12) {
        $welcome = 'Доброе утро';
    } elseif ($hour >= 12 && $hour < 18) {
        $welcome = 'Добрый день';
    } elseif ($hour >= 18 && $hour < 23) {
        $welcome = 'Добрый вечер';
    } else {
        $welcome = 'Доброй ночи';
    }
    echo "<p>$welcome</p>";

    // Установка локали и вывод даты
    setlocale(LC_ALL, 'ru_RU.UTF-8');
    
    // Используем IntlDateFormatter для красивого вывода на русском
    $formatter = new IntlDateFormatter(
        'ru_RU',
        IntlDateFormatter::LONG,
        IntlDateFormatter::LONG,
        'Europe/Moscow',
        IntlDateFormatter::GREGORIAN,
        "Сегодня d MMMM y года, EEEE HH:mm:ss"
    );
    echo "<p>" . $formatter->format($now) . "</p>";

    // Вывод времени до ДР
    echo "<p>До моего дня рождения осталось:</p>";
    $diff = $birthday - $now;
    
    $days = floor($diff / (60 * 60 * 24));
    $hours = floor(($diff % (60 * 60 * 24)) / (60 * 60));
    $minutes = floor(($diff % (60 * 60)) / 60);
    $seconds = $diff % 60;

    echo "<ul>";
    echo "<li>$days дней</li>";
    echo "<li>$hours часов</li>";
    echo "<li>$minutes минут</li>";
    echo "<li>$seconds секунд</li>";
    echo "</ul>";
    ?>
</body>
</html>
