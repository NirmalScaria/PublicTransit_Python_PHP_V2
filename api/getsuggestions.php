<?php
//Check if doesn't have post data.
if(!((isset($_POST['gx']))&(isset($_POST['gy'])))){
    echo("No ssufficient data. Make sure to use post..");
}
else{
    $gx=$_POST['gx'];
    $gy=$_POST['gy'];
    $rawres= (exec("python scripts/getsuggestions.py ".$gx." ".$gy." 2>&1"));
    echo($rawres);
}
?>