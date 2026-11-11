<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Загруженные модули и функции</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .module { margin-bottom: 20px; }
        .module h3 { background-color: #eee; padding: 5px; margin-bottom: 5px; }
        .functions { font-family: monospace; font-size: 14px; line-height: 1.5; color: #333; word-wrap: break-word; }
        .total { font-size: 18px; font-weight: bold; color: #d9534f; margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Загруженные модули и их функции</h1>
    <?php
    $extensions = get_loaded_extensions();
    $totalFunctions = 0;

    foreach ($extensions as $ext) {
        $functions = get_extension_funcs($ext);
        
        echo "<div class='module'>";
        echo "<h3>Модуль: " . htmlspecialchars($ext) . " (функций: " . ($functions ? count($functions) : 0) . ")</h3>";
        
        if ($functions) {
            $totalFunctions += count($functions);
            echo "<div class='functions'>" . implode(', ', $functions) . "</div>";
        } else {
            echo "<div class='functions'>Нет функций (или они встроены иначе)</div>";
        }
        echo "</div>";
    }

    echo "<div class='total'>Общее количество функций: " . $totalFunctions . "</div>";
    ?>
</body>
</html>
