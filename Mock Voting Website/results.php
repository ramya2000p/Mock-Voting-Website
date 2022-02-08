<?php
include("checkElectionTime.php");

if($expireDate > $todayDate){
    header("Location: beforeResults.php");

}else if ($todayDate == $expireDate){
    if( $todayTime < $expireTime ){
        header("Location: beforeResults.php");
    }else{
        header("Location: afterResults.php");
    }
}else{
    header("Location: afterResults.php");
}

?>