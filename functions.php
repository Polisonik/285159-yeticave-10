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
  $price = number_format($price, null, null, ' ') . " <b class=\"rub\">р</b>";
  return $price;
};
