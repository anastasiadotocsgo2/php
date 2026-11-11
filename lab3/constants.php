<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Константы PHP</title>
    <style>
        body { font-family: monospace; background: #f4f4f4; }
        .group { background: #fff; padding: 10px; margin-bottom: 20px; border-radius: 5px; box-shadow: 0 0 5px rgba(0,0,0,0.1); }
        h2 { color: #2A4F6F; border-bottom: 2px solid #2A4F6F; }
        .const-item { margin-bottom: 5px; }
        .const-name { font-weight: bold; color: #0056b3; }
        .const-value { color: #333; }
    </style>
</head>
<body>
    <h1>Все определенные константы PHP</h1>
    <?php
    // Получаем все константы, сгруппированные по модулям
    $allConstants = get_defined_constants(true);

    foreach ($allConstants as $module => $constants) {
        echo "<div class='group'>";
        echo "<h2>Модуль: " . htmlspecialchars($module) . "</h2>";
        
        foreach ($constants as $name => $value) {
            // Красиво форматируем массивы и объекты, если они есть
            $displayValue = is_array($value) || is_object($value) ? print_r($value, true) : $value;
            if (is_bool($value)) {
                $displayValue = $value ? 'true' : 'false';
            } elseif (is_null($value)) {
                $displayValue = 'null';
            } elseif (is_string($value)) {
                $displayValue = "'" . htmlspecialchars($value) . "'";
            }
            
            echo "<div class='const-item'>";
            echo "<span class='const-name'>" . htmlspecialchars($name) . "</span> = ";
            echo "<span class='const-value'>" . htmlspecialchars((string)$displayValue) . "</span>";
            echo "</div>";
        }
        echo "</div>";
    }
    ?>
</body>
</html>
