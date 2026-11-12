<?php
declare(strict_types=1);

$result = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из формы
    $num1 = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
    $num2 = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
    $operator = $_POST['operator'] ?? '+';

    // Если числа введены корректно
    if ($num1 !== false && $num1 !== null && $num2 !== false && $num2 !== null) {
        switch ($operator) {
            case '+': $result = $num1 + $num2; break;
            case '-': $result = $num1 - $num2; break;
            case '*': $result = $num1 * $num2; break;
            case '/':
                if ($num2 == 0) {
                    $result = "Ошибка: Деление на ноль невозможно!";
                } else {
                    $result = $num1 / $num2;
                }
                break;
        }
    } else {
        $result = "Ошибка: Введите корректные числа.";
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Калькулятор</title>
    <link rel="stylesheet" href="style.css"> <!-- Подключаем стили, если они нужны -->
</head>
<body>
    <h1>Калькулятор</h1>
    
    <!-- Проверяем, есть ли результат, и если есть — выводим его -->
    <?php if ($result !== null): ?>
        <h3 style="color: #2A4F6F; background: #eef; padding: 10px;">
            Результат: <?= htmlspecialchars((string)$result) ?>
        </h3>
    <?php endif; ?>

    <!-- Атрибут action отправляет данные на этот же файл, method="post" скрывает данные из URL -->
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <p>
            <label for="num1">Число 1</label>

            <!-- value="..." сохраняет введенное число после нажатия кнопки -->
            <input type="text" name="num1" id="num1" value="<?= htmlspecialchars($_POST['num1'] ?? '') ?>" required>
        </p>
        <p>
            <label for="operator">Оператор</label>

            <select name="operator" id="operator">
                <option value="+" <?= (($_POST['operator'] ?? '') === '+') ? 'selected' : '' ?»+</option>
                <option value="-" <?= (($_POST['operator'] ?? '') === '-') ? 'selected' : '' ?»-</option>
                <option value="*" <?= (($_POST['operator'] ?? '') === '*') ? 'selected' : '' ?»*</option>
                <option value="/" <?= (($_POST['operator'] ?? '') === '/') ? 'selected' : '' ?»/</option>
            </select>
        </p>
        <p>
            <label for="num2">Число 2</label>

            <input type="text" name="num2" id="num2" value="<?= htmlspecialchars($_POST['num2'] ?? '') ?>" required>
        </p>
        <button type="submit">Считать!</button>
    </form>
</body>
</html>





