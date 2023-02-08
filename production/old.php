<!DOCTYPE html>
<html land="en">

<head>
    <title>WebVR part 1</title>
    <meta aframe-injected="" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,shrink-to-fit=no,user-scalable=no,minimal-ui,viewport-fit=cover">
    <meta aframe-injected="" name="mobile-web-app-capable" content="yes">
    <meta aframe-injected="" name="theme-color" content="black">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/microsoft-signalr/3.1.3/signalr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/aframevr/aframe@d893cfacc335696c7183943eab8165100c3a6e1c/dist/aframe-master.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/donmccurdy/aframe-extras/dist/aframe-extras.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>


    <!-- <script src="https://unpkg.com/@editvr/aframe-dialog-popup-component@1.7.2/dist/aframe-dialog-popup-component.min.js"></script> -->
    <!-- <script src="components/vr-move.js"></script> -->
    <!-- <script type="text/javascript" src="data/exdata.json"></script> -->
    <!-- <script src="https://aframe.io/releases/1.0.4/aframe.min.js"></script> -->
    <!-- <script src="https://rawgit.com/fernandojsg/aframe-teleport-controls/master/dist/aframe-teleport-controls.min.js"></script> -->
    <!-- <script src="https://unpkg.com/aframe-svg-extruder@1.0.0/dist/index.min.js"></script> -->
</head>

<body>
    <a-scene room-manager="nav: true; startPos: 0 0 -40">

        <!-- Models -->
        <a-entity id="Дорога" position="-12 0 45" gltf-model="models__1/road.glb" depth-correction></a-entity>
        <a-entity id="Заводы" position="-12 0 45" gltf-model="models__1/factory.glb" depth-correction></a-entity>
        <a-entity id="Генераторы" position="-12 0 45" gltf-model="models__1/generators.glb" depth-correction>
        </a-entity>
        <a-entity id="Дома" position="-12 0 45" gltf-model="models__1/home.glb" depth-correction></a-entity>
        <a-entity id="Больница" position="-12 0 45" gltf-model="models__1/hospital.glb" depth-correction></a-entity>
        <a-entity id="Фонари" position="-12 0 45" gltf-model="models__1/lanterns.glb" depth-correction></a-entity>
        <a-entity id="Декор" position="-12 0 45" gltf-model="models__1/scenery.glb" depth-correction></a-entity>
        <a-entity id="Станция" position="-12 0 45" gltf-model="models__1/station.glb" depth-correction></a-entity>
        <a-entity id="Подстанции" position="-12 0 45" gltf-model="models__1/substation.glb" depth-correction>
        </a-entity>
        <a-entity id="Провода" position="-12 0 45" gltf-model="models__1/wires.glb" depth-correction></a-entity>

        <!-- Custom -->

        <!-- Aero -->
        <a-entity id="Аэро Станция 1" position="-11.629 0 56.38" gltf-model="models__1/aero.glb" depth-correction>
        </a-entity>
        <a-entity id="Аэро Станция 2" position="-12 0 45" gltf-model="models__1/aero.glb" depth-correction></a-entity>
        <a-entity id="Аэро Станция 3" position="-9.75 0 34.24" gltf-model="models__1/aero.glb" depth-correction>
        </a-entity>

        <a-entity id="Аэро Крутилка 1" position="-87.4 16.872 61.43" rotation="180 0 0" gltf-model="models__1/aero_roll.glb" animation="property: rotation; to: -180 0 0; loop: true; dur: 2060" depth-correction></a-entity>
        <a-entity id="Аэро Крутилка 2" position="-87.4 16.87 50.08" rotation="180 0 0" gltf-model="models__1/aero_roll.glb" animation="property: rotation; to: -180 0 0; loop: true; dur: 2060" depth-correction></a-entity>
        <a-entity id="Аэро Крутилка 3" position="-85.45 16.87 39.2" rotation="180 0 0" gltf-model="models__1/aero_roll.glb" animation="property: rotation; to: -180 0 0; loop: true; dur: 2060" depth-correction></a-entity>
        <!-- /Aero -->

        <!-- Cars -->
        <a-entity id="Полицейская Машина" position="-9.75 0 47" gltf-model="models__1/car__cop.glb" depth-correction>
        </a-entity>
        <a-entity id="Машина" position="-21.45 0 42.28" gltf-model="models__1/car__default.glb" depth-correction>
        </a-entity>
        <!-- /Cars -->

        <!-- Mini Aero -->
        <a-entity id="Мини Аэро Станция" position="-14.841 0 45" gltf-model="models__1/mini__aero.glb" depth-correction></a-entity>
        <a-entity id="Мини Аэро Крутилка" position="38.23 6.24 60.57" rotation="0 0 0" gltf-model="models__1/mini__aero_roll.glb" animation="property: rotation; to: 0 -360 0; loop: true; dur: 1000" depth-correction></a-entity>
        <!-- /Mini Aero -->

        <!-- /Custom -->

        <!-- /Models -->

        <a-sky src="sky.jpg" rotation="0 -130 0"></a-sky>

        <!-- CAMERA -->
        <a-entity id="cameraRig" movement-controls="constrainToNavMesh: true; enabled: true">
            <a-entity id="cursor" camera look-controls position="0 2.7 54" rotation="0 180 0" cursor="rayOrigin: mouse" raycaster="objects: .interractible">
            </a-entity>
            <a-entity id="leftHand" hand-controls="hand: left; handModelStyle: highPoly; color: #94c6ff"></a-entity>
            <a-entity id="rightHand" hand-controls="hand: right; handModelStyle: highPoly; color: #94c6ff" laser-controls line="color: red; opacity: 0.75" raycaster="objects: .interractible"></a-entity>

            <a-entity id="choseHand"></a-entity>
        </a-entity>


    </a-scene>
    <!--
    <script src="components/change-region.js"></script>
    <script src="components/teleport.js"></script>
    <script src="components/room-manager.js"></script>
    <script src="components/video-player.js"></script>
    <script src="components/video-player-hls.js"></script>
    <script src="components/aframe-video-controls.js"></script>
    <script src="components/excursion-controller.js"></script>
    <script src="components/setup-fade.js"></script>
    <script src="components/camera-look.js"></script>
    <script src="components/print-panel.js"></script>
    <script src="components/agro-controller.js"></script>
    <script src="components/signal-controller.js"></script>
    <script src="components/aframe-dialog-popup-component.js"></script>
    -->
</body>

</html>
