<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>360&deg; Image Gallery</title>
    <meta name="description" content="360&deg; Image Gallery - A-Frame">
    <script src="https://aframe.io/releases/1.0.4/aframe.min.js"></script>
    <script src="https://unpkg.com/aframe-event-set-component@5/dist/aframe-event-set-component.min.js"></script>
    <script src="https://unpkg.com/aframe-layout-component@5.3.0/dist/aframe-layout-component.min.js"></script>
    <script src="https://unpkg.com/aframe-template-component@3.2.1/dist/aframe-template-component.min.js"></script>
    <script src="https://unpkg.com/aframe-proxy-event-component@2.1.0/dist/aframe-proxy-event-component.min.js"></script>

    <!-- Image link template to be reused. -->
    <script id="link" type="text/html">
      <a-entity class="link"
        geometry="primitive: plane; height: 2; width: 3"
        material="shader: flat; src: ${thumb}"
        event-set__mouseenter="scale: 1.2 1.2 1"
        event-set__mouseleave="scale: 1 1 1"
        event-set__click="_target: #image-360; _delay: 300; material.src: ${src}"
        proxy-event="event: click; to: #image-360; as: fade"
        sound="on: click; src: #click-sound"></a-entity>
    </script>
  </head>
  <body>
    <a-scene>
      <a-assets>
        <img id="city" crossorigin="anonymous" src="https://cdn.glitch.com/3878eda5-e79c-42ac-82f2-b5c4b3ecb1eb%2FKampung%20Putih%20Dalam.jpg?v=1606729451037">
        <img id="bridge" crossorigin="anonymous" src="https://cdn.glitch.com/a94e6ab3-f319-44d7-b5cc-9c75442098f5%2FJembatan%20kampung%20warna%20warni.jpg?v=1594777379254">
        <img id="city-thumb" crossorigin="anonymous" src="https://cdn.aframe.io/360-image-gallery-boilerplate/img/thumb-city.jpg">
        <img id="cubes-thumb" crossorigin="anonymous" src="https://cdn.aframe.io/360-image-gallery-boilerplate/img/thumb-cubes.jpg">
        <img id="sechelt-thumb" crossorigin="anonymous" src="https://cdn.aframe.io/360-image-gallery-boilerplate/img/thumb-sechelt.jpg">
        <audio id="click-sound" crossorigin="anonymous" src="https://cdn.aframe.io/360-image-gallery-boilerplate/audio/click.ogg"></audio>
        <img id="cubes" crossorigin="anonymous" src="https://cdn.aframe.io/360-image-gallery-boilerplate/img/cubes.jpg">
        <img id="sechelt" crossorigin="anonymous" src="https://cdn.aframe.io/360-image-gallery-boilerplate/img/sechelt.jpg">
        <img id="jembatan-thumb" crossorigin="anonymous" src="https://cdn.glitch.com/a94e6ab3-f319-44d7-b5cc-9c75442098f5%2FJembatanKaca_Jodipan.jpg?v=1593614042566">


      </a-assets>

      <!-- 360-degree image. -->
      <a-sky id="image-360" radius="10" src="#city"
             animation__fade="property: components.material.material.color; type: color; from: #FFF; to: #000; dur: 300; startEvents: fade"
             animation__fadeback="property: components.material.material.color; type: color; from: #000; to: #FFF; dur: 300; startEvents: animationcomplete__fade"></a-sky>

      <!-- Image links. -->
      {{-- <a-entity id="links" layout="type: line; margin: 1.5" position="0 -1 -4">
        <a-entity template="src: #link" data-src="#cubes" data-thumb="#cubes-thumb" ></a-entity>
        <a-entity template="src: #link" data-src="#city" data-thumb="#city-thumb" ></a-entity>
        <a-entity template="src: #link" data-src="#sechelt" data-thumb="#sechelt-thumb"></a-entity>
      </a-entity> --}}

      {{-- <a-entity template="src: #link" data-src="#cubes" data-thumb="#jembatan-thumb" position="5 0.8 2.8" rotation="0.010 285 0"></a-entity> --}}

      {{-- <a-entity id="links" position="9 0.8 2.8" rotation="0.010 261.73 0">
        <a-plane color="#CCC" height="0.4" width="3" position="0 -1.2 0" ></a-plane>
        <a-text value="Jembatan Kaca" align="center" position="0 -1.2 0" width="3" color="black" scale="2 2 2"></a-text>
        <a-entity template="src: #link" data-src="#bridge" data-thumb="#jembatan-thumb"></a-entity>

      </a-entity> --}}

      <!-- Camera + cursor. -->
      <a-entity position="0 1.8 4">
      <a-camera id="camera" look-controls="" wasd-controls-enabled="false" camera="active:true" rotation="-1.3750987083139854 -3.0939720937064483 0" position="0 0 0">
        {{-- <a-ring radius-outer="0.20" radius-inner="0.10" position="0 0 -3" material="color: cyan; shader: flat" cursor="maxDistance: 30; fuse: true" geometry="primitive:ring;radiusOuter:0.20;radiusInner:0.10" raycaster="" scale="0.4628376812078244 0.4628376812078244 0.4628376812078244">
          <a-animation begin="click" easing="ease-in" attribute="scale" fill="backwards" from="0.1 0.1 0.1" to="1 1 1" dur="150"></a-animation>
          <a-animation begin="fusing" easing="ease-in" attribute="scale" fill="forwards" from="1 1 1" to="0.1 0.1 0.1" dur="1500"></a-animation>
        </a-ring> --}}
        {{-- <a-text value="Panorama Image ©2020 Google" position="0 -2.2 -3" align="center"  color="white" scale="0.8 0.8 0.8"></a-text> --}}
      </a-camera>
    </a-entity>
    </a-scene>
  </body>
</html>
