<!---First route starts--->
<div class = "row pt-lg-3 pt-sm-1 pt-xs-1">

<!---LABELS FOR EACH RESULT--->
    <div class ="mypanel col-lg-6 col-md-7 col-sm-9 col-11 mx-auto "> 
        <?php echo($specialtags); ?>
    </div>
    <div class ="mylist pt-4 pb-4 col-lg-7 col-md-8 col-sm-10 col-xs-12 mx-auto jumbotron" >

<?php
for($i=0;$i<$numberofsteps;$i++){
    if($i>0){
        echo('<hr class ="bwsteps">');
    }
echo('
STEP '.(1+$i).'
        <div class = "container">
            <div class ="row">
                <div class ="col-12 col-sm-3 ml-2 pt-1 mybusname '.$typeofbus[$i].'">
                    <h1 class = "mybusnamefont">
                        '.$nameofbus[$i].'
                    </h1>
                    <h2 class = "mybusnamefont pt-0">
                        ('.$originofbus[$i].' - '.$destofbus[$i].')
                    </h2>
                </div>
                <div class = "col-4 col-sm-3 pt-3 pt-sm-0 mytextcol my-auto" >
                    <h2 class = "mybusnamefont">
                        '.$getintobusatp[$i].'
                    </h2>
                    <h2 class = "mybusnamefont">
                    '.$getintobusatt[$i].'
                    </h2>
                </div>
                <div class = "col-4 col-sm-2 mytextcol my-auto" >
                    <h2 class = "mybusnamefont">
                       <hr class = "travel">
                    
                    </h2>
                </div>
                <div class = "col-4 col-sm-3 pt-3 pt-sm-0 mytextcol my-auto" >
                    <h2 class = "mybusnamefont">
                    '.$jumpfrombusatp[$i].'
                    </h2>
                    <h2 class = "mybusnamefont">
                    '.$jumpfrombusatt[$i].'
                    </h2>
                </div>
            </div>
        </div>
');
}



?>



    </div>
</div>
<!---First route ends--->