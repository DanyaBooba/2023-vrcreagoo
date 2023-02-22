<?php

# обработчик get-запросов на получения json

# 12.01.2023

$path = "jsonfile.txt";
$hash = "31uDp6iw31uDpGHcGHcsZcH6iwsZcH";
$get = [
    'hash' => $_GET['h'],
    'json' => $_GET['j']
];

if ($get['hash'] != $hash) return;

if (empty($get['json'])) return;

include_once "formatjs.php";
$datainclude = FormatJS($get['json']);

$o = fopen($path, 'w');
fwrite($o, $datainclude);
fclose($o);
