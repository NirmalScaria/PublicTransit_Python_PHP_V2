<html>

<head>
    <title>Parakkum Thalika</title>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-store" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'
        integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link rel="icon" href="assets/images/logo.png" sizes="16x16">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="assets/js/script.js"></script>
    <script>

    </script>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-7465762118175984",
    enable_page_level_ads: true
  });
</script>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light sticky-top"
        style="background-color:rgb(255, 255, 255); min-height:100px">
        <div class="container">
            <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
                <span class="navbar-toggler-icon"></span>
            </button>
            <span class="navbar-text"></span>
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="btn btn-primary" href="getapp.php" style="border-radius:20px"><i
                            class='fab fa-android'></i> Get the app </a>
                </li>
                <div class="collapse navbar-collapse" id="collapse_target"
                    style="max-height:150px; background-color:rgb(255, 255, 255);">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="support.php">Support</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutus.php">About Us</a>
                    </li>
                </div>
            </ul>
        </div>
    </nav>



    <div class="container-fluid padding">




        <div class="row">
            <div class="col-lg-7 col-md-8 col-sm-10 col-xs-12 mx-auto ">
                <img class="col-7 col-sm-5 col-xs-5  mx-auto d-block" src="assets/images/logo.png"
                    style="margin:30px; min-height:70px; min-width:100px;">
                <div class="container">
<div class = "alert alert-danger" id = "errorbox" style = "display:none;">
                </div>
                    <!----INPUT FOR ORIGIN-->


                    <div class="row">
                        <!----INPUT FOR ORIGIN for large screens-->

                        <div class="col-lg-8 col-md-9 col-sm-12 mx-auto d-none d-xl-block">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="min-width:60px;"><i class='fa fa-home'
                                            style="margin-right:10px;"></i>
                                        <div class="">ORIGIN</div>
                                    </span>
                                </div>
                                <input type="text" id="originl" onkeyup="autofill('originl');" class="form-control"
                                    name="originl" placeholder="KATTAPPANA" autocapitalize="on">
                            </div>
                        </div>
                        <!----INPUT FOR ORIGIN for small screens-->
                        <div class="col-lg-8 col-md-9 col-sm-12 mx-auto d-xl-none">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="min-width:60px;"><i class='fa fa-home'
                                            style="margin-right:10px;"></i></span>
                                </div>
                                <input id="origins" class="form-control" onkeyup="autofill('origins');" type="text"
                                    name="origin" placeholder="ORIGIN" autocapitalize="on">
                            </div>
                        </div>
                    </div>


                    <!----INPUT FOR dest-->
                    <!----INPUT FOR dest-->
                    <div class="row">
                        <!----INPUT FOR dest for large screens-->

                        <div class="col-lg-8 col-md-9 col-sm-12 mx-auto d-none d-xl-block">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="min-width:60px;"><i class='fa fa-map-marker'
                                            style="margin-right:10px;"></i>
                                        <div class="">DESTINATION</div>
                                    </span>
                                </div>
                                <input type="text" id="destl" onkeyup="autofill('destl')" class="form-control"
                                    name="destl" placeholder="KOTTAYAM" autocapitalize="characters">
                            </div>
                        </div>
                        <!----INPUT FOR dest for small screens-->
                        <div class="col-lg-8 col-md-9 col-sm-12 mx-auto d-xl-none">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="min-width:60px;"><i class='fa fa-map-marker'
                                            style="margin-right:10px;"></i></span>
                                </div>
                                <input type="text" id="dests" onkeyup="autofill('dests')" class="form-control"
                                    name="dests" placeholder="DESTINATION" autocapitalize="characters">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <!----INPUT FOR time for large screens-->

                        <div class="col-lg-8 col-md-9 col-sm-12 mx-auto d-none d-xl-block">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="min-width:60px;"><i class='fa fa-clock'
                                            style="margin-right:10px;"></i>
                                        <div class="">TIME OF DEPARTURE</div>
                                    </span>
                                </div>
                                <input type="text" id="timel" class="form-control"
                                    name="timel" placeholder="HH:MM">
                            </div>
                        </div>
                        <!----INPUT FOR time for small screens-->
                        <div class="col-lg-8 col-md-9 col-sm-12 mx-auto d-xl-none">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="min-width:60px;"><i class='fa fa-clock'
                                            style="margin-right:10px;"></i></span>
                                </div>
                                <input type="text" id="times" class="form-control"
                                    name="times" placeholder="TIME OF DEPARTURE HH:MM">
                            </div>
                        </div>
                    </div>







                    <div class="row">
                        <div class="col-lg-7 col-md-8 col-sm-9 col-xs-10 container">
                            <div class="row">
                                <!---ADVANCED SEARCH-->
                                <div class="col-7" style="top:10px;">
                                    <a href="#" style="color:#222;"> <i class="fa fa-sliders-h" aria-hidden="true"></i>
                                        Advanced search</a>
                                </div>
                                <!---SEARCH BUTTON-->
                                <a class="btn btn-primary col-5" onclick="mainsearch();" href="#"
                                    style="border-radius:10px"><i class='fa fa-search'></i> Search </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <form id="realform" method="POST" action="search.php">
            <input type="hidden" name="originselected" id="originselected" value="0">
            <input type="hidden" name="destselected" id="destselected" value="0">
            <input type = "hidden" name = "timeselected" id = "timeselected" value="0">
        </form>


</body>

</html>


