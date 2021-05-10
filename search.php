
<!-- saved from url=(0037)https://parakkumthalika.in/search.php -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Parakkum Thalika</title>
    
    <meta id="viewport" name="viewport" content="width=device-width, initial-scale=1">
    <meta name="language" content="English" />
    <meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" />
<script>
    window.onload = function() {
        if (screen.width < 500) {
            var metaViewport = document.getElementById('viewport');
            metaViewport.setAttribute('content', 'user-scalable=no,width=500');
        }
    }
</script>

    <script src="assets/js/materialize.min.js" ></script>
    <link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css"  />
    <link rel="icon" href="assets/images/logo.png" sizes="16x16">

    <link rel="stylesheet" type = "text/css" href="assets/css/custom.css">
    <link rel="stylesheet" type = "text/css" href="assets/css/all.css">
    <link rel="stylesheet" type = "text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons" >
</head>
<?php
if(!((isset($_POST['originselected']))&(isset($_POST['destselected']))&(isset($_POST['timeselected']))&(isset($_POST['startlagmax']))&(isset($_POST['minlayover']))&(isset($_POST['maxlayover'])))){
    header('Location: '.'index.php');
}

?>









<?php

$origin=$_POST['originselected'];
$dest=$_POST['destselected'];
$time=$_POST['timeselected'];
$startlagmax=$_POST['startlagmax'];
$minlayover=$_POST['minlayover'];
$maxlayover=$_POST['maxlayover'];
$rawres= (exec("python cgi-bin/searchindex.py ".$origin." ".$dest." ".$time." ".$startlagmax." ".$minlayover." ".$maxlayover." 2>&1"));



$jsonres=json_decode($rawres,TRUE);



?>


<body style  ="min-width:500px;">
        <!---NAVBAR-->
    <nav>
        <div class="nav-wrapper">
            <a href="https://parakkumthalika.in/index3.php#" class="brand-logo left hide-on-med-and-down" style="left:20px;">Parakkum Thalika</a>
            <a href="https://parakkumthalika.in/index3.php#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a class="waves-effect waves-light btn" href="https://parakkumthalika.in/getapp.php"><i class="material-icons left">android</i>Get the app</a></li>
                <li><a href="https://parakkumthalika.in/index.php">Home</a></li>
                <li><a href="https://parakkumthalika.in/login.php">Login</a></li>
                <li><a href="https://parakkumthalika.in/support.php">Support</a></li>
                <li><a href="https://parakkumthalika.in/aboutus.php">About Us</a></li>
            </ul>
        </div>
    </nav>
    <!--REVEAL FOR COLLAPSED NAVBAR-->
    <ul class="sidenav" id="mobile-demo">
        <li><a class="waves-effect waves-light btn" href="https://parakkumthalika.in/getapp.php"><i class="material-icons left">android</i>Get the app</a></li>
        <li><a href="https://parakkumthalika.in/index.php">Home</a></li>
        <li><a href="https://parakkumthalika.in/login.php">Login</a></li>
        <li><a href="https://parakkumthalika.in/support.php">Support</a></li>
        <li><a href="https://parakkumthalika.in/aboutus.php">About Us</a></li>
    </ul>




        <div class="container">



    
        <div class="row" style = "margin-top:30px;">
 <div class="col s12" style="color:#555; text-align:center; text-decoration: underline; text-decoration-color:#999; text-underline-position: under;">
            Buses from 
            <?php echo(exec("cgi-bin/index.py getnamefromid ".$_POST['originselected']." 2>&1"));?> 
            to 
            <?php echo(exec("cgi-bin/index.py getnamefromid ".$_POST['destselected']." 2>&1"));?>
            after 
            <?php echo(date("g:i A",(strtotime(substr($time,0,2).":".substr($time,2,2).":".substr($time,4,2)))));?> 
            <br/>
            (Click on the bus for route and map.)
             </div>
</div>


<div class ="row">
    <ul class ="collapsible popout">

    <?php 
    $k=0;
foreach($jsonres as $item){

$numberofsteps=$item['numberofsteps'];
if($numberofsteps==1){
$specialtags=($item['tags']);
$typeofbus=array($item['typeofbus']);
$nameofbus=array($item['nameofbus']);
$originofbus=array($item['originofbus']);
$destofbus=array($item['destofbus']);
$getintobusatp=array($item['getinp']);
$getintobusatt=array($item['getint']);
$jumpfrombusatp=array($item['getoutp']);
$jumpfrombusatt=array($item['getoutt']);
$routeid=array($item['routeid']);
include('addcontent2.php');

}
else{
    $specialtags=($item['tags']);
    $typeofbus=($item['typeofbus']);
$nameofbus=($item['nameofbus']);
$originofbus=($item['originofbus']);
$destofbus=($item['destofbus']);
$getintobusatp=($item['getinp']);
$getintobusatt=($item['getint']);
$jumpfrombusatp=($item['getoutp']);
$jumpfrombusatt=($item['getoutt']);
$routeid=($item['routeid']);
    include('addcontent2.php');
}
$k+=1;
}
?>










        





        <!---ALL RESULTS END--->
    </ul>
</div>





</div>

    
<script>
    //SCRIPT FOR NAVIGATION COLLAPSE
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems, {});
    });
    //FOR COLLAPSIBLE
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems, {});
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

</html>