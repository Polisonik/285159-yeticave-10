<?php
$db = require_once('config/db.php');

$connection = mysqli_connect('localhost', 'root', '', 'yeticave');
mysqli_set_charset($connection, 'utf8');

$categories = [];
$content ='';
//$lots=[];
