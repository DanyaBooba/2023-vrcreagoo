<?php
# GET-запросы для получения JSON

include_once "formatjs.php";
$path = "../json/index.txt";

if (!empty($_GET)) {
    $formatjson = $_GET["q"];
    if (!empty($formatjson)) {

        $editjs = FormatJS($formatjson);

        $fileopen = fopen($path, 'w');
        fwrite($fileopen, $editjs);
        fclose($fileopen);

    }
} 
