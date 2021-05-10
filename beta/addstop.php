<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
?>
<html>
<head>
    <title>Parakkum Thalika</title>
    <meta charset="UTF-8">
    <meta name="description" content="Find the best bus routes from anywhere to anywhere in Kerala.">
    <meta name="keywords" content="Kerala, bus, ksrtc, private, route, trip">
    <meta name="author" content="Nirmal Scaria">
    <meta id="viewport" name="viewport" content="width=device-width, initial-scale=1">
<script>
    window.onload = function() {
        if (screen.width < 500) {
            var metaViewport = document.getElementById('viewport');
            metaViewport.setAttribute('content', 'user-scalable=no,width=500');
        }
    }
</script>
    <link rel="icon" href="assets/images/logo.png" sizes="16x16">
    <link type = "text/css" rel="stylesheet" href="assets/css/materialicon.css" >
    <link type = "text/css" rel="stylesheet" href="assets/css/fontawesomeall.css" >
    <link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css"  />

    <link rel="stylesheet" type = "text/css" href="assets/css/custom.css?t=dsdff">
    <script
  src="assets/js/jquery-3.3.1.js"
></script>
<script type="text/javascript" src="assets/js/materialize.min.js"></script>
    <script src="assets/js/script.js?t=dlkffjk"></script> 

    
</head>
<body >


<?php
include 'floatingaction.php';
include 'navbar.php';
?>

    


    
    <!--MAIN CONTENT START-->
    <div class="container">
<blockquote>
    ADD NEW PLACE
</blockquote>
        <!--FORM-->
        <div class ="row" style="margin-top:30px;">
            <div class="col l8 m8 s10 offset-l2 offset-m2 offset-s1  ">
                <div class="container" style = "position:relative; top:0px;">
                    <div class="row">
                        <!--INPUT FOR ORIGIN-->
                        
                        <!--INPUT FOR DEST-->
                        <div class="col s12">
                            <div class="input-field" >
                                <i class="material-icons prefix">room</i>
                                <input type="text" id="dests"  class="validate"
                                    name="dests" autocapitalize="characters" autocomplete="off">
                                <label for="dests">Enter the place name</label>
                            </div>
                        </div>            
                        <!----INPUT FOR TIME-->
                        
                    </div>
                    <!--SEARCH BUTTONS-->
                    <div class="row">
                        <div class="col l10 m10 s10 offset-l1 offset-m1 offset-s1 container">
                            <div class="row valign-wrapper">
                                
                                <!---SEARCH BUTTON-->
                                <a class="btn waves-effect waves-light col s12  round" onclick="findnewst1();" href="#"
                                    > Search </a>    
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div id="Map" style="height:250px; "></div>
                
                <div class="row" id = "submitfinal" style = "display:none; margin-top:20px;">
                        <div class="col l10 m10 s10 offset-l1 offset-m1 offset-s1 container">
                            <div class="row valign-wrapper">
                                
                                <!---SEARCH BUTTON-->
                                <a class="btn waves-effect waves-light col s12  round" onclick="donothing();" href="#"
                                    > CONFIRM </a>    
                            </div>
                        </div>
                    </div>
            </div>
            

    </div>
    
          
 


    <script>
        //SCRIPT FOR NAVIGATION COLLAPSE
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems, {});
        });
        //SCRIPT FOR TIME PICKER
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.timepicker');
            var instances = M.Timepicker.init(elems,{});
        });
        //SCRIPT FOR ADVANCED SEARCH
        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems, {});
        
        
        });
        
        document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.fixed-action-btn');
    var instances = M.FloatingActionButton.init(elems, {
      hoverEnabled: false
    });
  });
      //SET THEME COLOUr
var themeColor="#0482ED";
elements = document.getElementsByClassName('nav-wrapper');
    for (var i = 0; i < elements.length; i++) {
        elements[i].style.backgroundColor=themeColor;
        console.log("changed");
    }
    var themeColor2="#9DC202";
elements = document.getElementsByClassName('btn');
    for (var i = 0; i < elements.length; i++) {
        elements[i].style.backgroundColor=themeColor2;
        console.log("changed");
    }
    var themeColor3="#CB0C08";
elements = document.getElementsByClassName('btn-floating');
    for (var i = 0; i < elements.length; i++) {
        elements[i].style.backgroundColor=themeColor3;
        console.log("changed float");
    }
    </script>
    <script src="assets/map/OpenLayers.js"></script>
<script>
    var lat            = 47.35387;
    var lon            = 8.43609;
    
</script>
<script>
var placename=document.getElementById("dests").value;
var importance=0;
    function findnewst1(){
        placename=document.getElementById("dests").value;
        
        var url='https://nominatim.openstreetmap.org/search.php?q='+placename+'&format=json&countrycodes=in';
        var request = new XMLHttpRequest();
        request.open('GET', url, true);
        request.onload = function () {
  var jsonres=(this.response);
  var res=JSON.parse(jsonres);
   lat=parseFloat(res[0]['lat']);
   lon=parseFloat(res[0]['lon']);
   importance=parseFloat(res[0]['importance']);
   console.log(lat);
   document.getElementById("Map").innerHTML = "";
   var zoom           = 13;

    var fromProjection = new OpenLayers.Projection("EPSG:4326");   // Transform from WGS 1984
    var toProjection   = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection
    var position       = new OpenLayers.LonLat(lon, lat).transform( fromProjection, toProjection);

    map = new OpenLayers.Map("Map");
    var mapnik         = new OpenLayers.Layer.OSM();
    map.addLayer(mapnik);

    var markers = new OpenLayers.Layer.Markers( "Markers" );
    map.addLayer(markers);
    markers.addMarker(new OpenLayers.Marker(position));

    map.setCenter(position, zoom);
    document.getElementById('submitfinal').style.display="block";
  }
request.send()

        console.log(url);

    }
function donothing(){
    document.location="addstop2.php?placename="+placename+"&lat="+lat+"&lon="+lon+"&importance="+importance;
}
</script>

</body>
<head>
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="Expires" CONTENT="-1">
</head>
</html>


