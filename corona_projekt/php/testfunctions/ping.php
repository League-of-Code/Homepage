<?php


    $host = 'https://www.leagueofcode.de';
    $port = 80;
    $waitTimeoutInSeconds = 1;
    if($fp = fsockopen($host,$port,$errCode,$errStr,$waitTimeoutInSeconds)){
     // It worked
     echo "it works";
    } else {
     // It didn't works
     echo "It doesnt works";
    }
    fclose($fp);






 ?>
