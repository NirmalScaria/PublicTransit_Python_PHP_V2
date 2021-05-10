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
<body>

<div class="preloader-background" id = "mypreloader">
<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
		<?php
		//include 'demo.html'
		?>

</div>
<!---FLOATING ACTION--->
<div class="fixed-action-btn" style = "z-index:1;">
  <a class="btn-floating btn-large">
    <i class="large material-icons">share</i>
  </a>
  <ul>
    <li><a class="btn-floating blue darken-1" onclick="window.open('https://www.facebook.com/parakkumthalika.in', '_blank');"><i class="fab fa-facebook-f"></i></a></li>
    <li><a class="btn-floating red" onclick="window.open('mailto:admin@parakkumthalika.in', '_blank');"><i class="fas fa-envelope"></i>
</a></li>
    <li><a class="btn-floating green" onclick="window.open('https://chat.whatsapp.com/Dxe0W2ry41O2ImMIzjYu8F', '_blank');"><i class="fab fa-whatsapp"></i></a></li>

  </ul>
</div>
    


    <!---NAVBAR-->
    <nav>
        <div class = "nav-wrapper">
            <a href="#" class="brand-logo left hide-on-med-and-down" style = "left:20px;">Parakkum Thalika</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a class="waves-effect waves-light btn" href="getapp.php"><i class="material-icons left">android</i>Get the app</a></li>
                <li><a href="login.php" >Login</a></li>
                <li><a href="support.php" >Support</a></li>
                <li><a href="aboutus.php" >About Us</a></li>
            </ul>
        </div>
    </nav>
    <!--REVEAL FOR COLLAPSED NAVBAR-->
    <ul class="sidenav" id="mobile-demo">
        <li><a class="waves-effect waves-light btn" href="getapp.php"><i class="material-icons left">android</i>Get the app</a></li>
        <li><a href="login.php" >Login</a></li>
        <li><a href="support.php" >Support</a></li>
        <li><a href="aboutus.php" >About Us</a></li>
    </ul>
    <!--MAIN CONTENT START-->
    <div class="container">
        <!--LOGO IMAGE-->
        <div class="row">
            <div class="col l8 m8 s10 offset-l2 offset-m2 offset-s1  ">
                <img class="col s6 offset-s3 responsive-img center" src="assets/images/logo.png"
                    style="margin-top:30px; min-height:70px; min-width:100px;">
            </div>
        </div>
        <!--FORM-->
        <div class ="row">
            <div class="col l8 m8 s10 offset-l2 offset-m2 offset-s1  ">
                <div class="container" style = "position:relative; top:0px;">
                    <div class="row">
                        <!--INPUT FOR ORIGIN-->
                        <div class ="col s12">
                            <div class="input-field" style = "margin:0px;">
                                <i class="material-icons prefix">home</i>
                                <input id="origins" class="validate" onkeyup="autofill('origins');" type="text"
                                    name="origin" autocapitalize="characters" autocomplete="off">
                                <label for="origins">Origin</label>
                            </div>
                        </div>
                        <!--INPUT FOR DEST-->
                        <div class="col s12">
                            <div class="input-field" >
                                <i class="material-icons prefix">room</i>
                                <input type="text" id="dests" onkeyup="autofill('dests')" class="validate"
                                    name="dests" autocapitalize="characters" autocomplete="off">
                                <label for="dests">Destination</label>
                            </div>
                        </div>            
                        <!----INPUT FOR TIME-->
                        <div class="col s12">
                            <div class="input-field" style = "margin:0px;">
                                <i class="material-icons prefix">access_time</i>                                   
                                <input type="text" id="times" class="timepicker" name="times" autocomplete="off">
                                <label for="times">Time of departure</label>
                            </div>
                        </div>
                    </div>
                    <!--SEARCH BUTTONS-->
                    <div class="row">
                        <div class="col l10 m10 s10 offset-l1 offset-m1 offset-s1 container">
                            <div class="row valign-wrapper">
                                <i class="material-icons prefix">tune</i>
                                <!---ADVANCED SEARCH-->
                                <div class="col s7 m7 xl7 l7" style="top:10px;">
                                    
                                    <a class="modal-trigger" href="#modal1" style="color:#222;"> 
                                    
                                        Advanced search</a>
                                </div>
                                <!---SEARCH BUTTON-->
                                <a class="btn waves-effect waves-light col s6 m6 l6 xl6 round" onclick="mainsearch();" href="#"
                                    > Search </a>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
          
    <!--FORM END-->
    <!--FAKE FORM-->
    <form id="realform" method="POST" action="search.php">
        <input type="hidden" name="originselected" id="originselected" value="0">
        <input type="hidden" name="destselected" id="destselected" value="0">
        <input type = "hidden" name = "timeselected" id = "timeselected" value="0">
        <input type="hidden" name="startlagmax" id="startlagmax" value="18000">
        <input type="hidden" name="minlayover" id="minlayover" value="120">
        <input type="hidden" name="maxlayover" id="maxlayover" value="18000">
    </form>

    

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
    

</body>
<head>
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="Expires" CONTENT="-1">
</head>
</html>


