<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Smart City Prototype</title>

    <meta aframe-injected="" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,shrink-to-fit=no,user-scalable=no,minimal-ui,viewport-fit=cover">
    <meta aframe-injected="" name="mobile-web-app-capable" content="yes">
    <meta aframe-injected="" name="theme-color" content="black">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/microsoft-signalr/3.1.3/signalr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/aframevr/aframe@d893cfacc335696c7183943eab8165100c3a6e1c/dist/aframe-master.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/donmccurdy/aframe-extras/dist/aframe-extras.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>

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
                <a-plane onClick="MainOnClick('<?php echo $gblist[$i]["click"]["jsname"] ?>', <?php echo $c ?>)" id="<?php echo $gblist[$i]["id"] ?>" material="color: #696969; opacity: 0.65;" position="<?php echo $gblist[$i]["x"] . " -1.662 " . $gblist[$i]["z"] ?>" rotation="<?php echo "0 " . ((int) $gblist[$i]["rotation"] + 20) . " 0" ?>" scale="0.4 0.56 1"></a-plane>
            <?php else : ?>
                <a-plane id="<?php echo $gblist[$i]["id"] ?>" material="color: #696969; opacity: 0.65;" position="<?php echo $gblist[$i]["x"] . " -1.662 " . $gblist[$i]["z"] ?>" rotation="<?php echo "0 " . ((int) $gblist[$i]["rotation"] + 20) . " 0" ?>" scale="0.4 0.56 1"></a-plane>
            <?php endif; ?>

            <a-entity text="value: <?php echo $gblist[$i]["id"] ?>; color: #ffffff; align: center;" id="t<?php echo $c ?>__id" scale="1 1 1" position="<?php echo $gblist[$i]["x"] . " -1.464 " . $gblist[$i]["z"] ?>" rotation="<?php echo "0 " . ((int) $gblist[$i]["rotation"] + 20) . " 0" ?>"></a-entity>
            <a-entity text="value: <?php echo $gblist[$i]["id"] ?>; color: #ffffff; align: center;" id="t<?php echo $c ?>__genpow" scale="1 1 1" position="<?php echo $gblist[$i]["x"] . " -1.595 " . $gblist[$i]["z"] ?>" rotation="<?php echo "0 " . ((int) $gblist[$i]["rotation"] + 20) . " 0" ?>"></a-entity>
            <a-entity text="value: <?php echo $gblist[$i]["id"] ?>; color: #ffffff; align: center;" id="t<?php echo $c ?>__power" scale="1 1 1" position="<?php echo $gblist[$i]["x"] . " -1.674 " . $gblist[$i]["z"] ?>" rotation="<?php echo "0 " . ((int) $gblist[$i]["rotation"] + 20) . " 0" ?>"></a-entity>
            <a-entity text="value: <?php echo $gblist[$i]["id"] ?>; color: #ffffff; align: center;" id="t<?php echo $c ?>__reqpower" scale="1 1 1" position="<?php echo $gblist[$i]["x"] . " -1.743 " . $gblist[$i]["z"] ?>" rotation="<?php echo "0 " . ((int) $gblist[$i]["rotation"] + 20) . " 0" ?>"></a-entity>

            <?php if ($gblist[$i]["needactive"]) : ?>
                <a-entity text="value: <?php echo $gblist[$i]["id"] ?>; color: #000000; align: center;" id="t<?php echo $c ?>__ison" scale="1 1 1" position="<?php echo $gblist[$i]["x"] . " -1.863 " . $gblist[$i]["z"] ?>" rotation="<?php echo "0 " . ((int) $gblist[$i]["rotation"] + 20) . " 0" ?>"></a-entity>
            <?php else : ?>
                <a-entity text="value: Active; color: #E5E5E5; align: center;" id="tconst__ison" scale="1 1 1" position="<?php echo $gblist[$i]["x"] . " -1.863 " . $gblist[$i]["z"] ?>" rotation="<?php echo "0 " . ((int) $gblist[$i]["rotation"] + 20) . " 0" ?>"></a-entity>
            <?php endif; ?>

            <a-image src="/img/active.jpg" width="3" height="3" scale="0.12 0.12 0.12" position="<?php echo $gblist[$i]["picture"]["position"]["x"] . " -1.662 " . $gblist[$i]["picture"]["position"]["z"] ?>" material="opacity: 0.8" rotation="<?php echo "0 " . ((int) $gblist[$i]["picture"]["rotation"] - 20) . " 0" ?>" id="im<?php echo $c ?>"></a-image>

            <?php $c += 1 ?>
        <?php endfor; ?>

        <!-- <a-image src="https://creagoo.ru/i/img/design/f1/creagoo.jpg" width="6" height="3" scale="0.12 0.12 0.12" position="0 0 0" material="opacity: 0.8" rotation="0 0 0" id="example123"></a-image> -->
        <!-- <a-image id="eventImage" opacity="0" position="0 -1.5 0" width="5.3" height="3" scale="0.12 0.12 0.12" src="https://cdn.otkritkiok.ru/posts/big/panda-67161.jpg" animation__opacity="startEvents: materialtextureloaded; property: components.material.material.opacity; to: 1; dur: 1" animation__rotation="startEvents: materialtextureloaded; property: rotation; from: 0 0 0; to: 0 0 0; dur: 2500" animation__position="startEvents: materialtextureloaded; property: position; to: 0 -1.5 0; dur: 3000" material="" geometry=""></a-image> -->

        <a-sky src="/img/sky.jpg" rotation="0 -130 0"></a-sky>
        <a-camera scale="0.5 0.5 0.5" position="0 -1.45 0">
            <a-cursor></a-cursor>
        </a-camera>

    </a-scene>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/click.js"></script>
    <script src="/js/my.js"></script>
</body>

</html>
