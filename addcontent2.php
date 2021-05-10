








<?php
if($k==0){
echo('<li class = "active">');
}
else{
    echo("<li>");
}
?>
            <div class="collapsible-header" >
                <i class="material-icons" style = "margin-right:5px;">directions_bus</i>

                <span class = "truncate" style = "max-width:20%;">
                    <?php echo($getintobusatp[0]); ?>
                </span>

                
                <i class ="material-icons" style = "margin:0px;">arrow_forward</i>
                <span class = "truncate" style = "max-width:24%;">
                    <?php echo($jumpfrombusatp[0]); ?>
                </span>
                <?php if($numberofsteps>1){
                    echo('<i class ="material-icons" style = "margin:0px;">arrow_forward</i>
                    <span class = "truncate" style = "max-width:21%;">
                        '.$jumpfrombusatp[1].'
                    </span>');
                }
                ?>



                <?php 
$d=0;
                foreach($specialtags as $sptag){
                    echo('<span class ="new badge green right"  data-badge-caption="'.$sptag.'"  style = "font-size:0.6rem; ');
                
                if($d!=0){
                    echo("margin-left:14px;");
                }
                echo('"></span>');
            $d=$d+1;
            
            }
                #echo('<span class ="new badge green right" data-badge-caption="'.$specialtags.'"></span>');
                ?>
            </div>
            <div class="collapsible-body" style = "padding-left:0px; padding-top:20px; padding-right:0px;">
                <div class = "container" style = "width:90%">




                <?php
for($i=0;$i<$numberofsteps;$i++){
    if($i>0){
        echo('<hr style = "margin-bottom:20px;"/>');
    }
    echo('
                    <!---STEP 1--->
                    <div class = "row valign-wrapper" style = "margin-bottom:0px;">
                        <div class ="col s4 card-panel red darken-2 center-align" style = "padding:5px;" onclick = "window.open('."'beta/showroute.php?routeid=".$routeid[$i]."'".')">
                            <span class = "white-text">
                            '.$nameofbus[$i].'
                            </span>
                            <br/>
                            <hr style = "margin:3px;"/>
                            <span class = "white-text truncate">
                            '.$originofbus[$i].' - 
                            </span>
                            <br style ='."'".'content: ""; font-size: 2%;'."'".'/>
                            <span class = "white-text truncate">
                            '.$destofbus[$i].'
                            </span>
                        </div>
                            <div class ="col s3  right-align wordwrap">
                            <b>'.date("g:i A",strtotime($getintobusatt[$i])).'</b>
                            <br/>
                            '.$getintobusatp[$i].'
                            </div>
                            <div class ="col s2 center-align" style = "font-size:0.7rem; border-left:1px solid #555; border-right:1px solid #555; width:14%; padding:0px;"> 
                                <i class ="material-icons" style = "margin:0px; ">access_time</i>
                                <br/>');
                                $time = $getintobusatt[$i];
$startseconds = strtotime("1970-01-01 $time UTC");

$time = $jumpfrombusatt[$i];
$stopseconds = strtotime("1970-01-01 $time UTC");
$secdiff=$stopseconds-$startseconds;
if($secdiff<0){
    $secdiff+=86400;
}
$secdiff/=60;
$hdiff=round($secdiff/60);
$mdiff=$secdiff%60;
echo($hdiff.'h '.$mdiff.'m');


                            echo('</div>
                            <div class ="col s3 left-align wordwrap" style = "">
                                <b>'.date("g:i A",strtotime($jumpfrombusatt[$i])).'</b>
                            <br/>
                            '.$jumpfrombusatp[$i].'
                            </div>
                    </div>
                    <!---Steps wrapper-->
                    ');}
                    ?>
                    

                </div>
            </div>
        </li>





























