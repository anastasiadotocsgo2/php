<?php
declare(strict_types=1);
require_once 'inc/lib.inc.php';
require_once 'inc/data.inc.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>О сайте</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <!-- Верхняя часть страницы -->
    <?php include 'inc/top.inc.php'; ?>
    <!-- Верхняя часть страницы -->
  </header>
  <section>
    <!-- Заголовок -->
    <h1>О нашем сайте</h1>
    <!-- Заголовок -->
    <!-- Область основного контента -->
    <p>Сайт создан на общественных началах...</p>
    <h3>Цели создания проекта</h3>
    <ol>
      <li>поднятие престижа нашей школы.</li>
      <li>для информирования родителей будущих учеников нашей школы.</li>
    </ol>
    <!-- Область основного контента -->
  </section>
  <nav>
    <!-- Навигация -->
    <?php include 'inc/menu.inc.php'; ?>
    <!-- Навигация -->
  </nav>
  <footer>
    <!-- Нижняя часть страницы -->
    <?php include 'inc/bottom.inc.php'; ?>
    <!-- Нижняя часть страницы -->
  </footer>
</body>
</html>
