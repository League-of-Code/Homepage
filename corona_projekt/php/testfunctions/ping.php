<?php


    $host = 'https://www.leagueofcode.de'; 
    $port = 80;
    $waitTimeoutInSeconds = 1;
    if($fp = fsockopen($host,$port,$errCode,$errStr,$waitTimeoutInSeconds)){
     // It worked
    } else {
     // It didn't work
    }
    fclose($fp);






 ?>
