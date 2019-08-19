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

function format_price ($price) {
  $price = ceil($price);
  $price = number_format($price, null, null, ' ') . ' <b class="rub">р</b>';
  return $price;
};

function get_dt_range($final_date) {
    $result = [];

    date_default_timezone_set('Europe/Moscow');
    setlocale(LC_TIME, 'ru_Ru');

    $dt_now = date_create('now');
    $dt_end = date_create($final_date);
    if ( $dt_now < $dt_end) {
        $dt_diff = date_diff($dt_end, $dt_now);
        $result[0] = date_interval_format($dt_diff, '%a') * 24 + date_interval_format($dt_diff, '%H');
        $result[1] = date_interval_format($dt_diff, '%I');
    }
    else {
      $result[0] = '00';
      $result[1] = '00';
    }

    return $result;
}
