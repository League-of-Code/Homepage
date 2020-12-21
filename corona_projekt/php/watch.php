<?php
echo "<h1>WATCH.PHP</h1>";
$handle = curl_init();
 
$url = "https://www.rki.de/DE/Content/InfAZ/N/Neuartiges_Coronavirus/Fallzahlen.html";
 
// Set the url
curl_setopt($handle, CURLOPT_URL, $url);
// Set the result output to be a string.
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
 
$output = curl_exec($handle);
 
curl_close($handle);
 
$fp = fopen('data.txt', 'w');
fwrite($fp,$output);
fclose($fp);
$test = fopen('timestamp.txt','w');
$t=time();
fwrite($test,$t);
fclose($test);
?>
