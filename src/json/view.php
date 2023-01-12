<?php

$path = "index.txt";
$json = file_get_contents($path);
$parsejson = json_decode($json, true);
?>

<h1>
    Json
</h1>
<p>
    <?php var_dump($json) ?>
</p>

<h2>
    List
</h2>
<pre><?php var_dump($parsejson) ?></pre>