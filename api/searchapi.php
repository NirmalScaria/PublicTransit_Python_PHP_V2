

<?php
//Check if doesn't have post data.
if(!((isset($_POST['originselected']))&(isset($_POST['destselected']))&(isset($_POST['timeselected']))&(isset($_POST['startlagmax']))&(isset($_POST['minlayover']))&(isset($_POST['maxlayover'])))){
    echo("No sufficient data. Make sure to use post..");
}
else{
    $origin=$_POST['originselected'];
    $dest=$_POST['destselected'];
    $time=$_POST['timeselected'];
    $startlagmax=$_POST['startlagmax'];
    $minlayover=$_POST['minlayover'];
    $maxlayover=$_POST['maxlayover'];
    $rawres= (exec("python ../cgi-bin/searchindex.py ".$origin." ".$dest." ".$time." ".$startlagmax." ".$minlayover." ".$maxlayover." 2>&1"));
    //echo("yo");
    //json.dumps($rawres);
    echo($rawres);
}
?>
