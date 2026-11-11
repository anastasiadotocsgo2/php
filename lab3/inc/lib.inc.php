<?php
declare(strict_types=1);

/**
 * Отрисовывает навигационное меню
 */
function getMenu(array $menu, bool $vertical = true): void {
    echo "<ul>";
    foreach ($menu as $item) {
        echo "<li><a href='{$item['href']}'>{$item['link']}</a></li>";
    }
    echo "</ul>";
}

/**
 * Отрисовывает таблицу умножения
 */
function getTable(int $cols = 10, int $rows = 10, string $color = 'yellow'): void {
    echo "<table>";
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
}
