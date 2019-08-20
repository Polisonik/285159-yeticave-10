<?php
    date_default_timezone_set('Europe/Moscow');
    setlocale(LC_TIME, 'ru_Ru');

    require_once('functions.php');
    require_once('data.php');

    $content = include_template('main.php', [
        'categories' => $categories,
        'lots' => $lots,
    ]);

    $layout_content = include_template('layout.php', [
        'is_auth' => $is_auth,
        'user_name' => $user_name,
        'content' => $content,
        'categories' => $categories,
        'title' => 'YetiCave - Главная страница'
    ]);

    print($layout_content);
?>
