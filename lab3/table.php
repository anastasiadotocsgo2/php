<?php
declare(strict_types=1);
require_once 'inc/lib.inc.php';
require_once 'inc/data.inc.php';

// Получаем параметры из формы (если отправлена)
$cols = isset($_GET['cols']) && $_GET['cols'] !== '' ? (int)$_GET['cols'] : 5;
$rows = isset($_GET['rows']) && $_GET['rows'] !== '' ? (int)$_GET['rows'] : 5;
$color = isset($_GET['color']) && $_GET['color'] !== '' ? $_GET['color'] : 'yellow';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Таблица умножения</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <?php include 'inc/top.inc.php'; ?>
  </header>
  <section>
    <h1>Таблица умножения</h1>
    <form>
      <label>Количество колонок: </label><br>
      <input name='cols' type='number' value='<?= $cols ?>'><br>
      <label>Количество строк: </label><br>
      <input name='rows' type='number' value='<?= $rows ?>'><br>
      <label>Цвет: </label><br>
      <input name='color' type='color' value='<?= $color ?>'><br><br>
      <input type='submit' value='Создать'>
    </form>
    <br>
    <!-- Таблица -->
    <?php getTable($cols, $rows, $color); ?>
  </section>
  <nav>
    <?php include 'inc/menu.inc.php'; ?>
  </nav>
  <footer>
    <?php include 'inc/bottom.inc.php'; ?>
  </footer>
</body>
</html>
