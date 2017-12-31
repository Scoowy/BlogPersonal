    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <script src="http://maps.google.com/maps?file=api&v=3&key=ABQIAAAAp9wVclPicp2HGB4QNX-LLRTqx4D3bS478d-1w1nVZmw5mBzr_hTd8Hb4lXsLPv7hW7mRH6_tkUmJ3g" type="text/javascript"></script>
    <script type="text/javascript">
     
    var map      = null;
    var geocoder = null;
      
    function load() {
     
     map = new GMap2(document.getElementById("map"));
     map.setCenter(new GLatLng(10.4937589840847,-66.1071181297302), 15);
     map.addControl(new GSmallMapControl());
     map.addControl(new GMapTypeControl());
     geocoder = new GClientGeocoder();
         }
     function showAddress(address, zoom) {
     
    if (geocoder) {
              geocoder.getLatLng(address,
                 function(point) {
                   if (!point) {
                    alert(address + " not found");
                   } else {
                    map.setCenter(point, zoom);
                    var marker = new GMarker(point);
                    map.addOverlay(marker);
                    document.form_mapa.coordenadas1.value = point.y;
                    document.form_mapa.coordenadas2.value = point.x;
                      }
     
                    }
     
             );
     
           }}
    </script>
    </head>
     
    <body onLoad="load();"  onunload="GUnload();"> 
    <center>
    <div align="center" id="map" style="height: 425px; width: 425px;">
    </div>
    </center> 
    </body>
    </html>