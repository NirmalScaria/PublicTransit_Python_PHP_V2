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

        <!--FORM-->
        <div class ="row" style="margin-top:30px;">
            <div class="col l8 m8 s10 offset-l2 offset-m2 offset-s1  ">
                <div class="container" style = "position:relative; top:0px;">
                    <div class="row">
                        <!--INPUT FOR ORIGIN-->
                        
                        
                        <!----INPUT FOR TIME-->
                        
                    </div>
                    <!--SEARCH BUTTONS-->
                    <div class="row">
                        <div class="col l10 m10 s10 offset-l1 offset-m1 offset-s1 container">
                            <div class="row valign-wrapper">
                                
                                <!---SEARCH BUTTON-->
                                <a class="btn waves-effect waves-light col s12  round" onclick="window.location='addstop.php';" href="#"
                                    > NEXT </a>    
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    var str = "<?php echo $GET['q']; ?>";
                    console.log(str);
                </script>
                <?php echo $GET['q']; ?>
                <div id="Map" style="height:250px"></div>
            </div>
            

    </div>
    <!---ADVANCED SEARCH-->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Advanced Search</h4>
            Maximum initial waiting time (hours):
            <p class = "range-field">
                 <input type = "range" id = "startlagmaxrange" min = "0" max = "10" value = "8" />
            </p>
            Minimum time between connections (minutes):
            <p class = "range-field">
            <input type = "range" id = "minlayoverrange" min = "0" max = "30" value = "5"/>
            </p>
            Maximum time between connections (hours):
            <p class = "range-field">
            <input type = "range" id = "maxlayoverrange" min = "1" max = "5" value = "5" />
            </p>
   
        </div>
        <div class="modal-footer">
            <a href="#!" onclick="advancedvalues();" class="modal-close waves-effect waves-green btn-flat">Confim</a>
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
    var zoom           = 18;

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
</script>
<script>
    function findnewst1(){
        var placename=document.getElementById("dests").value;
        window.location.href = 'https://nominatim.openstreetmap.org/search.php?q='+placename+'&format=json&countrycodes=in';
    }
</script>

</body>
<head>
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="Expires" CONTENT="-1">
</head>
</html>


