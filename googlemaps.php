<!DOCTYPE html>
<html>
  <head>
    <style>
       #map {
        width: 100%;
        height: auto;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
      function initMap() {
        var mapDiv = document.getElementById('map');
        var map = new google.maps.Map(mapDiv, {
            center: {lat: 44.540, lng: -78.546},
            zoom: 8
        });
      }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhRpXth4lg024_JMzpaoGX47vL2ASozx4&callback=initMap">
    </script>
  </body>
</html>