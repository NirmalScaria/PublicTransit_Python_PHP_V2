<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
$routeid=$_GET['routeid'];
$servername="ls-74e848ab2b3a36f7eb635c526111c0bc8e1bfdae.cpz5heb0edxj.ap-south-1.rds.amazonaws.com";
        $database="parakkumthalika";
        $user="dbmasteruser";
        $password="Mrrw-hesQ+A`Xb?(u:B6,7Tme;C%rge_";
        $dbname="parakkumthalika";
        $conn = new mysqli($servername, $user, $password,$dbname);
        // Check connection
$servername="ls-74e848ab2b3a36f7eb635c526111c0bc8e1bfdae.cpz5heb0edxj.ap-south-1.rds.amazonaws.com";
        $database="routes";
        $user="dbmasteruser";
        $password="Mrrw-hesQ+A`Xb?(u:B6,7Tme;C%rge_";
        $dbname="routes";
        $conn2 = new mysqli($servername, $user, $password,$dbname);
        // Check connection



function getnamefromid($idaa,$conn){
$sql = "SELECT * FROM stops where id = ".$idaa;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $stopname=$row["placeid"];
    }
    return "place_id:".$stopname;
} 

}
function getrealnamefromid($idaa,$conn){
$sql = "SELECT * FROM stops where id = ".$idaa;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $stopname=$row["stopname"];
    }
    return $stopname;
} 

}
function getroutestops($routeid,$conn2){
$sql="select stops from routes where id = ".$routeid;
$result = $conn2->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        return $row["stops"];
    }
}
else {
    return "0 results";
}
}
function getroutetimes($routeid,$conn2){
$sql="select times from routes where id = ".$routeid;
$result = $conn2->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        return $row["times"];
    }
}

}





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
<script src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyBp2s6hbm3v-ZNH1RK-n3gfM3vTUaq-H90&libraries=places&callback=initMap"></script>
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


<?php
include 'floatingaction.php';
include 'navbar.php';
?>

    


    
    <!--MAIN CONTENT START-->
    <div class="container">

        <?php $routesjson= getroutestops($routeid,$conn2);
        $stops=json_decode($routesjson, true);
$timesjson=getroutetimes($routeid,$conn2);
$times=json_decode($timesjson,true);
        $apiurl="https://www.google.com/maps/embed/v1/directions?mode=driving&key=AIzaSyBp2s6hbm3v-ZNH1RK-n3gfM3vTUaq-H90&origin=".getnamefromid($stops[0],$conn)."&destination=".getnamefromid($stops[count($stops)-1],$conn);
  if(count($stops)>2){
      $apiurl=$apiurl."&waypoints=";
  }
  for($i=1;$i<count($stops)-1;$i+=1){
      $apiurl=$apiurl.getnamefromid($stops[$i],$conn);
      if($i<count($stops)-2){
          if(getnamefromid($stops[$i],$conn)!="")
            $apiurl=$apiurl."|";
      }
  }
 $stopres=$conn2->query("select busname from routes where id =".$routeid);
 while($row = $stopres->fetch_assoc()) {
        $busname=$row["busname"];
    }
        ?>
        <div class = "row">
        <nav>
    <div class="nav-wrapper" style = "margin-top:15px;">
      <div class="col s12">
        <a href="#!" class="breadcrumb"><?php echo $busname." : ".getrealnamefromid($stops[0],$conn); ?></a>
        <a href="#!" class="breadcrumb"><?php echo getrealnamefromid($stops[count($stops)-1],$conn); ?></a>
      </div>
    </div>
  </nav>
  </div>
        <div class = "row card hide-on-med-and-down" >
            
            <div class = "col s12 m7 l7" style = "height:75%; padding-top:10.5px; padding-bottom:10.5px;">
                <?php echo '<iframe height = "100%" width  = "100%" src ="'.$apiurl.'" style = "border-width:0px;"></iframe>';
                ?>
            </div>
            <div class = "col s12 m5 l5" style = "height:75%; padding-top:10.5px; padding-bottom:10.5px;" >
<table style = " height:100%; display:block; overflow-y:scroll;">
        <thead>
          <tr>
              <th>Stop</th>
              <th>Time</th>
          </tr>
        </thead>
        <tbody>
        <?php
for($i=0;$i<count($stops);$i+=1){
    


    echo "<tr>";
    echo "<td>".getrealnamefromid($stops[$i],$conn)."</td>";
    echo "<td>".date('h:i a', strtotime($times[$i]))."</td>";
    echo "</tr>";
}
    ?>
        
        
        </tbody>
      </table>
            </div>
        </div>
        
        
  </div>
  <!---MOBILES ONLY --->
  <div class="row hide-on-large-only" style = "padding:20px; ">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a href="#test1">Map</a></a></li>
        <li class="tab col s3"><a class="active" href="#test2">Stops</a></li>
      </ul>
    </div>
    <div id="test1" class="col s12" style = "height:60%; padding-top:10.5px; padding-bottom:10.5px;"><?php echo '<iframe height = "100%" width  = "100%" src ="'.$apiurl.'" style = "border-width:0px;"></iframe>';
                ?></div>
    <div id="test2" class="col s12" style = "height:60%; padding-top:10.5px; padding-bottom:10.5px;">
    
    <table>
        <thead>
          <tr>
              <th>Stop</th>
              <th>Time</th>
          </tr>
        </thead>
        <tbody>
        <?php
for($i=0;$i<count($stops);$i+=1){
    


    echo "<tr>";
    echo "<td>".getrealnamefromid($stops[$i],$conn)."</td>";
    echo "<td>".date('h:i a', strtotime($times[$i]))."</td>";
    echo "</tr>";
}
    ?>
        
        
        </tbody>
      </table>
    
    
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
    $(document).ready(function(){
    $('.tabs').tabs();
  });
    </script>
    

</body>
<head>
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="Expires" CONTENT="-1">
</head>
</html>


