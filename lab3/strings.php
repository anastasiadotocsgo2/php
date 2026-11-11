<?php
declare(strict_types=1);

/**
 * Проверяет сложность пароля.
 * Пароль должен содержать минимум одну заглавную, одну строчную латинскую букву, одну цифру.
 * Длина пароля должна быть не менее 8 символов.
 * 
 * @param string $password Проверяемый пароль
 * @return bool Возвращает true, если пароль надежный, иначе false
 */
function isStrongPassword(string $password): bool {
    if (strlen($password) < 8) return false;
    if (!preg_match('/[A-Z]/', $password)) return false;
    if (!preg_match('/[a-z]/', $password)) return false;
    if (!preg_match('/[0-9]/', $password)) return false;
    return true;
}

// ЗАДАНИЕ 1
$login = ' User ';
$password = 'megaP@ssw0rd';
$name = 'иван';
$email = 'ivan@petrov.ru';
$code = '<?=$login?>';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Использование функций обработки строк</title>
</head>
<body>
    <h1>Обработка строк</h1>
    <?php
    // ЗАДАНИЕ 2
    // 1. Удаляем пробелы и делаем строчными
    $login = strtolower(trim($login));
    echo "<p>Очищенный логин: '$login'</p>";

    // 2. Проверка пароля
    if (isStrongPassword($password)) {
        echo "<p>Пароль '$password' надежный.</p>";
    } else {
        echo "<p>Пароль '$password' НЕ надежный.</p>";
    }

    // 3. Первый символ заглавный (mb_ucfirst нет в базовом PHP, используем mb_strtoupper + mb_substr)
    $name = mb_strtoupper(mb_substr($name, 0, 1)) . mb_substr($name, 1);
    echo "<p>Имя с большой буквы: $name</p>";

    // 4. Проверка email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p>Email '$email' корректный.</p>";
    } else {
        echo "<p>Email '$email' некорректный.</p>";
    }

    // 5. Вывод $code как текста (экранирование)
    echo "<p>Вывод кода: " . htmlspecialchars($code) . "</p>";
    ?>
</body>
</html>
