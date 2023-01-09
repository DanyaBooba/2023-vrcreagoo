<?php
include_once "../php/rb-mysql.php";

$mysql = new mysqli("localhost", "u1156718_webvr", "fghjkltyuiop_webvr2022", "u1156718_webvr");

$key = $_GET["k"];

$findbykey = R::getAll("SELECT * FROM example WHERE id=$key");

if (count($findbykey) == 1) {
    R::getAll("UPDATE example SET example=10 WHERE id=$key");
} else {
    var_dump("STOP");
}
