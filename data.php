<?php
$is_auth = rand(0, 1);

$user_name = 'Alina'; // укажите здесь ваше имя
$categories =  ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'];
$lots = [
    [
        'name' => '2014 Rossignol District Snowboard',
        'category'=> $categories[0],
        'price' => 10999,
        'image' => 'img/lot-1.jpg',
        'final_date' => '2019-08-21'
    ],
    [
        'name' => 'DC Ply Mens 2016/2017 Snowboard',
        'category'=> $categories[0],
        'price' => 159999,
        'image' => 'img/lot-2.jpg',
        'final_date' => '2019-08-20'
    ],
    [
        'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category'=> $categories[1],
        'price' => 8000,
        'image' => 'img/lot-3.jpg',
        'final_date' => '2019-08-22'
    ],
    [
        'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category'=> $categories[2],
        'price' => 10999,
        'image' => 'img/lot-4.jpg',
        'final_date' => '2019-08-22'
    ],
    [
        'name' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category'=> $categories[3],
        'price' => 7500,
        'image' => 'img/lot-5.jpg',
        'final_date' => '2019-08-21'
    ],
    [
        'name' => 'Маска Oakley Canopy',
        'category'=> $categories[5],
        'price' => 5400,
        'image' => 'img/lot-6.jpg',
        'final_date' => '2019-08-26'
    ]
];
