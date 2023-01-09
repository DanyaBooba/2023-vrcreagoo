<?php
$name = $_GET["b"];
$set = $_GET["s"];

if (!isset($name) || !isset($set)) {
    echo "404";
    exit;
}

$mysql = new mysqli("localhost", "u1156718_webvr", "fghjkltyuiop_webvr2022", "u1156718_webvr");
if ($mysql == false) {
    echo "database 404";
    exit;
}

$db = mysqli_query($mysql, "UPDATE webvrstats SET statebuild=$set WHERE namebuild like '$name'");
if ($db == false) {
    echo "result 404";
    exit;
}

echo "200";
