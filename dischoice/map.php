<?	
    $location_N=$_GET[location_N];
    $location_E=$_GET[location_E];
    $store_name=$_GET[store_name];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Simple markers</title>
    <style>
      html, body {
        height:500px;
        width: 295px;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
        weight: 100%;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>

function initMap() {
  var myLatLng = {lat: <?=$location_N?>, lng: <?=$location_E?>};	

  var map = new google.maps.Map(document.getElementById("map"), {
    zoom: 18,
    /*{lat: <?=$location_N+0.002?>, lng: <?=$location_E-0.0015?>}*/
    center: myLatLng
  });

var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: '<?=$store_name?>'
  });
  
}

    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjsBDp1kWrqWB8J13aFxRq9dVgr2PHWbg&signed_in=true&callback=initMap"></script>
  </body>
</html>