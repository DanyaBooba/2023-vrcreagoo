<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    <title>Smart City Prototype</title>
    <meta name="description" content="Online smart city prototype">
    <meta name="Author" content="Daniil Dybka">
    <meta name="theme-color" content="#ffffff">

    <meta aframe-injected="" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,shrink-to-fit=no,user-scalable=no,minimal-ui,viewport-fit=cover">
    <meta aframe-injected="" name="mobile-web-app-capable" content="yes">
    <meta aframe-injected="" name="theme-color" content="black">

    <script src="/js/app.min.js"></script>
</head>

<body>
    <?php include_once "php/listbuilds.php" ?>
    <?php $gblist = ReturnData(); ?>

    <a-scene room-manager="nav: true; startPos: 0 0 -40">

        <a-entity id="Стенд" position="0 -2 0" scale="0.12 0.12 0.12" gltf-model="/models/stand.glb"></a-entity>
        <a-entity id="Винт Ветрогенератора 1" scale="0.12 0.12 0.12" position="-6.345 0.265 2.993" gltf-model="/models/windTurbinePropeller.glb" animation="property: rotation; to: -360 0 0; loop: true; dur: 3000; easing: linear;"></a-entity>
        <a-entity id="Винт Ветрогенератора 2" scale="0.12 0.12 0.12" position="-6.343 0.276 0" rotation="-90 0 0" gltf-model="/models/windTurbinePropeller.glb" animation="property: rotation; to: -450 0 0; loop: true; dur: 3000; easing: linear;"></a-entity>
        <a-entity id="Винт Ветрогенератора 3" scale="0.12 0.12 0.12" position="-6.333 0.266 -3.007" rotation="-180 0 0" gltf-model="/models/windTurbinePropeller.glb" animation="property: rotation; to: -540 0 0; loop: true; dur: 3000; easing: linear;"></a-entity>
        <a-entity id="Винт Мини Ветрогенератора" scale="0.12 0.12 0.12" position="9.336 -1.207 1.985" gltf-model="/models/windMiniTurbinePropeller.glb" animation="property: rotation; to: 0 -360 0; loop: true; dur: 1000; easing: linear;"></a-entity>

        <a-plane id="Плейн Подстанция [1]" material="color: #696969; opacity: 0.65;" position="-3.321 -1.662 0.303" rotation="0 90 0" scale="0.4 0.56 1"></a-plane>
        <a-entity text="value: Substation; color: #ffffff; align: center;" id="t0__id" scale="1 1 1" position="-3.321 -1.598 0.303" rotation="0 90 0"></a-entity>
        <a-entity text="value: Substation; color: #ffffff; align: center;" id="t0__genpow" scale="1 1 1" position="-3.321 -1.662 0.303" rotation="0 90 0"></a-entity>
        <a-entity text="value: Active; color: #E5E5E5; align: center;" id="tconst__ison" scale="1 1 1" position="-3.321 -1.729 0.303" rotation="0 90 0"></a-entity>

        <a-image src="/img/substation1.jpg" width="6" height="3" scale="0.12 0.12 0.12" position="-3.321 -1.662 -1.047" material="opacity: 1" rotation="0 90 0"></a-image>

        <?php $c = 1 ?>
        <?php for ($i = 0; $i < count($gblist); $i++) : ?>

            <?php if ($gblist[$i]["click"]["on"]) : ?>
                <a-plane onClick="MainOnClick('<?php echo $gblist[$i]["click"]["jsname"] ?>', <?php echo $c ?>)" id="<?php echo $gblist[$i]["id"] ?>" material="color: #696969; opacity: 0.65;" position="<?php echo $gblist[$i]["x"] . " -1.6 " . $gblist[$i]["z"] ?>" rotation="<?php echo "0 " . ((int) $gblist[$i]["rotation"] - 20) . " 0" ?>" scale="0.36 0.65 1"></a-plane>
            <?php else : ?>
                <a-plane id="<?php echo $gblist[$i]["id"] ?>" material="color: #696969; opacity: 0.65;" position="<?php echo $gblist[$i]["x"] . " -1.6 " . $gblist[$i]["z"] ?>" rotation="<?php echo "0 " . ((int) $gblist[$i]["rotation"] - 20) . " 0" ?>" scale="0.36 0.65 1"></a-plane>
            <?php endif; ?>

            <a-entity text="value: <?php echo $gblist[$i]["id"] ?>; color: #ffffff; align: center;" id="t<?php echo $c ?>__id" scale="1 1 1" position="<?php echo $gblist[$i]["x"] . " -1.464 " . $gblist[$i]["z"] ?>" rotation="<?php echo "0 " . ((int) $gblist[$i]["rotation"] - 20) . " 0" ?>"></a-entity>
            <a-entity text="value: <?php echo $gblist[$i]["id"] ?>; color: #ffffff; align: center;" id="t<?php echo $c ?>__genpow" scale="1 1 1" position="<?php echo $gblist[$i]["x"] . " -1.631 " . $gblist[$i]["z"] ?>" rotation="<?php echo "0 " . ((int) $gblist[$i]["rotation"] - 20) . " 0" ?>"></a-entity>
            <a-entity text="value: <?php echo $gblist[$i]["id"] ?>; color: #ffffff; align: center;" id="t<?php echo $c ?>__reqpower" scale="1 1 1" position="<?php echo $gblist[$i]["x"] . " -1.743 " . $gblist[$i]["z"] ?>" rotation="<?php echo "0 " . ((int) $gblist[$i]["rotation"] - 20) . " 0" ?>"></a-entity>

            <?php if ($gblist[$i]["needactive"]) : ?>
                <a-entity text="value: <?php echo $gblist[$i]["id"] ?>; color: #000000; align: center;" id="t<?php echo $c ?>__ison" scale="1 1 1" position="<?php echo $gblist[$i]["x"] . " -1.855 " . $gblist[$i]["z"] ?>" rotation="<?php echo "0 " . ((int) $gblist[$i]["rotation"] - 20) . " 0" ?>"></a-entity>
            <?php else : ?>
                <a-entity text="value: Active; color: #E5E5E5; align: center;" id="tconst__ison" scale="1 1 1" position="<?php echo $gblist[$i]["x"] . " -1.855 " . $gblist[$i]["z"] ?>" rotation="<?php echo "0 " . ((int) $gblist[$i]["rotation"] - 20) . " 0" ?>"></a-entity>
            <?php endif; ?>

            <a-image src="/img/active.jpg" width="3" height="3" scale="0.12 0.12 0.12" position="<?php echo $gblist[$i]["picture"]["position"]["x"] . " -1.76 " . $gblist[$i]["picture"]["position"]["z"] ?>" material="opacity: 0.8" rotation="<?php echo "0 " . ((int) $gblist[$i]["picture"]["rotation"] - 20) . " 0" ?>" id="im<?php echo $c ?>"></a-image>

            <?php $c += 1 ?>
        <?php endfor; ?>

        <a-image src="/img/substation1.jpg" onClick="readFile()" width="5.33" height="3" scale="0.32 0.32 0.32" position="2.33 -1.35 -5.2" material="opacity: 1" rotation="0 -90 0" id="cameraview"></a-image>

        <a-sky src="/img/sky.jpg" rotation="0 -130 0"></a-sky>
        <a-camera scale="0.5 0.5 0.5" position="0 -1.45 0">
            <a-cursor></a-cursor>
        </a-camera>

    </a-scene>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/index.js"></script>
    <script src="/js/click.js"></script>
    <script src="/js/image.js"></script>
</body>

</html>
