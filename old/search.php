<html>
<head>
    <title>Parakkum Thalika</title>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width,initial-scale=1.0">
    <script src="assets/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="icon" href="assets/images/logo.png" sizes="16x16">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="assets/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel = "stylesheet" href="assets/css/custom.css">
    <link rel='stylesheet' href='assets/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-7465762118175984",
    enable_page_level_ads: true
  });
</script>
</head>
<?php

$origin=$_POST['originselected'];
$dest=$_POST['destselected'];
$time=$_POST['timeselected'];
$startlagmax=$_POST['startlagmax'];
$minlayover=$_POST['minlayover'];
$maxlayover=$_POST['maxlayover'];
$rawres= (exec("../scripts/searchindex.py ".$origin." ".$dest." ".$time." ".$startlagmax." ".$minlayover." ".$maxlayover." 2>&1"));



$jsonres=json_decode($rawres,TRUE);
echo $jsonres[0][dest];
//var_dump($jsonres);

?>




<body>
        <nav class = "navbar navbar-expand-md navbar-light sticky-top" style ="background-color:rgb(255, 255, 255); min-height:100px">
                <div class = "container">
                       <button class = "navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
                       <span class = "navbar-toggler-icon"></span>
                    </button>
                    <span class = "navbar-text d-sm-block d-none"><a class = "navbar-brand ml-5" href = "index.php" style = "border-radius:20px">
                    <img src = "assets/images/logo.png" height = "70px">
                </a></span>
                    <ul class = "nav navbar-nav">
                        <li class = "nav-item">
                            <a class = "btn btn-primary" href = "getapp.php" style = "border-radius:20px"><i class='fab fa-android'></i> Get the app </a>
                        </li>
                        <div class = "collapse navbar-collapse"  id = "collapse_target"style ="max-height:150px; background-color:rgb(255, 255, 255);">
                            <li class = "nav-item">
                                <a class = "nav-link" href = "login.php">Login</a>
                            </li>
                            <li class = "nav-item">
                                <a class = "nav-link" href = "support.php">Support</a>
                            </li>
                            <li class = "nav-item">
                                <a class = "nav-link" href = "aboutus.php">About Us</a>
                            </li>
                        </div>
                    </ul>
                </div>
        </nav>
        <div class="container-fluid padding">



    
        <div class = "row pt-lg-3 pt-sm-0">
 <div class = "col-12 mx-auto" style = "color:#555; text-align:center; text-decoration: underline; text-decoration-color:#999; text-underline-position: under;">
            Buses from 
            <?php echo(exec("../scripts/index.py getnamefromid ".$_POST['originselected']." 2>&1"));?> 
            to 
             <?php echo(exec("../scripts/index.py getnamefromid ".$_POST['destselected']." 2>&1"));?>
             after <?php echo(substr($time,0,2).":".substr($time,2,2).":".substr($time,4,2));?>
    </div>
</div>



<?php 
foreach($jsonres as $item){

$numberofsteps=$item[numberofsteps];
if($numberofsteps==1){
$specialtags=$item[tags];
$typeofbus=array($item[typeofbus]);
$nameofbus=array($item[nameofbus]);
$originofbus=array($item[originofbus]);
$destofbus=array($item[destofbus]);
$getintobusatp=array($item[getinp]);
$getintobusatt=array($item[getint]);
$jumpfrombusatp=array($item[getoutp]);
$jumpfrombusatt=array($item[getoutt]);

include('addcontent.php');
}
else{
    $specialtags=$item[tags];
    $typeofbus=($item[typeofbus]);
$nameofbus=($item[nameofbus]);
$originofbus=($item[originofbus]);
$destofbus=($item[destofbus]);
$getintobusatp=($item[getinp]);
$getintobusatt=($item[getint]);
$jumpfrombusatp=($item[getoutp]);
$jumpfrombusatt=($item[getoutt]);
    include('addcontent.php');
}
}
?>











</div>
</body>
</html>