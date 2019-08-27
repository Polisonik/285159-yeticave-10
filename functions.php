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

function get_dt_range($final_date) {

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
