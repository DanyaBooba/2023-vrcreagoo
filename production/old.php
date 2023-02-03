<!DOCTYPE html>
<html>

<head>
    <title>Meteoenergetick</title>
    <meta charset="utf-8" />
    <meta aframe-injected="" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,shrink-to-fit=no,user-scalable=no,minimal-ui,viewport-fit=cover">
    <meta aframe-injected="" name="mobile-web-app-capable" content="yes">
    <meta aframe-injected="" name="theme-color" content="black">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/microsoft-signalr/3.1.3/signalr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/aframevr/aframe@d893cfacc335696c7183943eab8165100c3a6e1c/dist/aframe-master.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/donmccurdy/aframe-extras/dist/aframe-extras.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
</head>

<?php

$array1 = [
    [
        "id" => "Solar Battery",
        "x" => "-18.28",
        "z" => "11.38",
        "rotation" => "180",
    ],
    [
        "id" => "Mini Substation 1",
        "x" => "-19.83",
        "z" => "-13.93",
        "rotation" => "0"
    ],
    [
        "id" => "Mini Substation 2",
        "x" => "-6.70",
        "z" => "11.38",
        "rotation" => "180"
    ],
    [
        "id" => "Hospital 2",
        "x" => "-8.78",
        "z" => "-13.93",
        "rotation" => "0"
    ],
    [
        "id" => "Factory 2",
        "x" => "4.035",
        "z" => "11.38",
        "rotation" => "180"
    ],
    [
        "id" => "Microdistrict",
        "x" => "22.65",
        "z" => "-13.93",
        "rotation" => "0"
    ],
    [
        "id" => "Microdistrict",
        "x" => "29.15",
        "z" => "-13.93",
        "rotation" => "0"
    ],
    [
        "id" => "Microdistrict",
        "x" => "36.48",
        "z" => "-13.93",
        "rotation" => "0"
    ],
    [
        "id" => "Microdistrict",
        "x" => "20.44",
        "z" => "11.38",
        "rotation" => "180"
    ],
    [
        "id" => "Microdistrict",
        "x" => "27.63",
        "z" => "11.38",
        "rotation" => "180"
    ],
    [
        "id" => "Microdistrict",
        "x" => "34.63",
        "z" => "11.38",
        "rotation" => "180"
    ],
    [
        "id" => "Factory 1",
        "x" => "46.89",
        "z" => "-13.93",
        "rotation" => "0"
    ],
    [
        "id" => "Hospital 1",
        "x" => "68.28",
        "z" => "11.38",
        "rotation" => "180"
    ],
    [
        "id" => "Solar Battery",
        "x" => "71.89",
        "z" => "-13.93",
        "rotation" => "0"
    ],
    [
        "id" => "Wind Generator",
        "x" => "75.19",
        "z" => "11.38",
        "rotation" => "180"
    ],
];

?>

<body>

    <a-scene room-manager="nav: true; startPos: 0 0 -40" fog="type: linear; color: #aaa">

        <a-entity id="Стенд" position="0 -2 0" gltf-model="/models/stand.glb"></a-entity>
        <a-entity id="Винт Ветрогенератора 1" position="-52.95 16.88 24.95" gltf-model="/models/windTurbinePropeller.glb" animation="property: rotation; to: -360 0 0; loop: true; dur: 3000; easing: linear;"></a-entity>
        <a-entity id="Винт Ветрогенератора 2" position="-52.95 16.88 0" rotation="-90 0 0" gltf-model="/models/windTurbinePropeller.glb" animation="property: rotation; to: -450 0 0; loop: true; dur: 3000; easing: linear;"></a-entity>
        <a-entity id="Винт Ветрогенератора 3" position="-52.95 16.88 -25" rotation="-180 0 0" gltf-model="/models/windTurbinePropeller.glb" animation="property: rotation; to: -540 0 0; loop: true; dur: 3000; easing: linear;"></a-entity>
        <a-entity id="Винт Мини Ветрогенератора" position="77.77 4.55 16.47" gltf-model="/models/windMiniTurbinePropeller.glb" animation="property: rotation; to: 0 -360 0; loop: true; dur: 1000; easing: linear;"></a-entity>

        <a-plane id="Плейн Подстанция [1]" material="color: #696969; opacity: 0.4;" position="-27.98 0.5 -6.15" rotation="0 90 0" scale="2.5 3 1"></a-plane>
        <a-entity text="value: Substation; color: #ffffff; align: center;" id="t0__id" scale="7 7 1" position="-27.9 1 -6.15" rotation="0 90 0"></a-entity>
        <a-entity text="value: Substation; color: #ffffff; align: center;" id="t0__genpow" scale="7 7 1" position="-27.9 0.5 -6.15" rotation="0 90 0"></a-entity>
        <a-entity text="value: Substation; color: #ffffff; align: center;" id="t0__ison" scale="7 7 1" position="-27.9 0 -6.15" rotation="0 90 0"></a-entity>

        <?php $c = 1 ?>
        <?php for ($i = 0; $i < count($array1); $i++) : ?>

            <a-plane id="<?php echo $array1[$i]["id"] ?>" material="color: #696969; opacity: 0.4;" position="<?php echo $array1[$i]["x"] . " 0.5 " . $array1[$i]["z"] ?>" rotation="<?php echo "0 " . $array1[$i]["rotation"] . " 0" ?>" scale="2.5 3 1"></a-plane>

            <a-entity text="value: <?php echo $array1[$i]["id"] ?>; color: #ffffff; align: center;" id="t<?php echo $c ?>__id" scale="7 7 1" position="<?php echo $array1[$i]["x"] . " 1.5 " . $array1[$i]["z"] ?>" rotation="<?php echo "0 " . $array1[$i]["rotation"] . " 0" ?>"></a-entity>
            <a-entity text="value: <?php echo $array1[$i]["id"] ?>; color: #ffffff; align: center;" id="t<?php echo $c ?>__genpow" scale="7 7 1" position="<?php echo $array1[$i]["x"] . " 1 " . $array1[$i]["z"] ?>" rotation="<?php echo "0 " . $array1[$i]["rotation"] . " 0" ?>"></a-entity>
            <a-entity text="value: <?php echo $array1[$i]["id"] ?>; color: #ffffff; align: center;" id="t<?php echo $c ?>__power" scale="7 7 1" position="<?php echo $array1[$i]["x"] . " 0.5 " . $array1[$i]["z"] ?>" rotation="<?php echo "0 " . $array1[$i]["rotation"] . " 0" ?>"></a-entity>
            <a-entity text="value: <?php echo $array1[$i]["id"] ?>; color: #ffffff; align: center;" id="t<?php echo $c ?>__reqpower" scale="7 7 1" position="<?php echo $array1[$i]["x"] . " 0 " . $array1[$i]["z"] ?>" rotation="<?php echo "0 " . $array1[$i]["rotation"] . " 0" ?>"></a-entity>
            <a-entity text="value: <?php echo $array1[$i]["id"] ?>; color: #ffffff; align: center;" id="t<?php echo $c ?>__ison" scale="7 7 1" position="<?php echo $array1[$i]["x"] . " -0.5 " . $array1[$i]["z"] ?>" rotation="<?php echo "0 " . $array1[$i]["rotation"] . " 0" ?>"></a-entity>

            <?php $c += 1 ?>
        <?php endfor; ?>


        <a-sky src="/img/sky.jpg" rotation="0 -130 0"></a-sky>

        <!-- Camera -->
        <a-entity id="cameraRig" movement-controls="constrainToNavMesh: true; enabled: true">
            <a-entity id="cursor" camera look-controls position="0 0.8 0" rotation="0 180 0" cursor="rayOrigin: mouse" raycaster="objects: .interractible">
            </a-entity>
            <a-entity id="leftHand" hand-controls="hand: left; handModelStyle: highPoly; color: #94c6ff"></a-entity>
            <a-entity id="rightHand" hand-controls="hand: right; handModelStyle: highPoly; color: #94c6ff" laser-controls line="color: red; opacity: 0.75" raycaster="objects: .interractible"></a-entity>
            <a-entity id="choseHand"></a-entity>
        </a-entity>
        <!-- /Camera -->

    </a-scene>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/index@old.js"></script>
</body>

</html>
