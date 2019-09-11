<?php

function include_template($name, array $data = []) {
    $name = 'templates/' . $name;
    $result = '';

    if (!is_readable($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require $name;

    $result = ob_get_clean();

    return $result;
}

/**
 * Форматирует цену
 *
 * @param int $price цена

 *
 * @return string отформатированная цена
 */
function format_price (int $price): string
{
  $price = ceil($price);
  $price = number_format($price, null, null, ' ') . ' <b class="rub">р</b>';
  return $price;
};

/**
 * Сохраняет отедльно количество часов и минут до снятия лота с аукциона
 *
 * @param int $final_date дата завершения действия объявления

 *
 * @return array количество часов, количество минут.
 */
function get_time_before(string $final_date): array
{
    $dt_now = date_create('now');
    $dt_end = date_create($final_date);

    if ( $dt_now >= $dt_end) {
        return [
            'hours' => '00',
            'minutes' => '00'
        ];
    };

    $dt_diff = date_diff($dt_end, $dt_now);

    return [
       'hours' => date_interval_format($dt_diff, '%a') * 24 + date_interval_format($dt_diff, '%H'),
       'minutes' => date_interval_format($dt_diff, '%I')
    ];
}

/**
*Подключение к базе
*@param array $config['db'] данные по
*/
function db_connect(array $config) {
    return mysqli_connect($config['db']['host'], $config['db']['user'], $config['db']['password'], $config['db']['database']);
}

/**
* Получение списка активных лотов
*@param
*/
function get_active_lots($connection) {
    $data = [];
    $query_lots = 'SELECT l.id, l.nam, l.creation_time, starting_price, image_link, end_time, c.name AS category_name,'
        .' (SELECT amount FROM bids WHERE lot_id = l.id ORDER BY id DESC LIMIT 1) amount'
        .' FROM lots l'
        .' JOIN categories c ON l.category_id = c.id'
        .' WHERE end_time > now()'
        .' ORDER BY creation_time DESC';

    $result = mysqli_query($connection,  $query_lots);

    if ($result) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    return $data;
};

function get_categories($connection) {
    $data = [];
    $query_categories = 'SELECT name, code FROM categories';
    $result = mysqli_query($connection, $query_categories);

    if ($result) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    return $data;
};

