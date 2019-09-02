<?php
    date_default_timezone_set('Europe/Moscow');
    setlocale(LC_TIME, 'ru_Ru');
    require_once('init.php');
    require_once('functions.php');



    if (!$connection) {
        $error = mysqli_connect_error();
        $content = include_template('error.php',['error' => $error]);
    }

    else{
        $query_categories = 'SELECT name, code FROM categories';
        $result_categories= mysqli_query($connection, $query_categories);

        $query_lots = 'SELECT l.id, l.name, l.creation_time, starting_price, image_link, end_time, c.name AS category_name,'
            .' (SELECT amount FROM bids WHERE lot_id = l.id ORDER BY id DESC LIMIT 1) amount'
            .' FROM lots l'
            .' JOIN categories c ON l.category_id = c.id'
            .' WHERE end_time > now()'
            .' ORDER BY creation_time DESC';

        $result_lots = mysqli_query($connection, $query_lots);


        if ($result_categories && $result_lots) {
            $categories = mysqli_fetch_all($result_categories, MYSQLI_ASSOC);
            $lots = mysqli_fetch_all($result_lots, MYSQLI_ASSOC);
            $content = include_template('main.php', [
                'categories' => $categories,
                'lots' => $lots,
            ]);
        }

        else {
            $error = mysqli_error($connection);
            $content = include_template('error.php',['error' => $error]);
        }

    }

    $layout_content = include_template('layout.php', [
                'is_auth' => $is_auth,
                'user_name' => $user_name,
                'content' => $content,
                'categories' => $categories,
                'title' => 'YetiCave - Главная страница'
            ]);
    print($layout_content);
