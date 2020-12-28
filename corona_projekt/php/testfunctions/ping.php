<?php


require_once('Ping/Ping.php');
$host = 'https://www.leagueofcode.de:80';
$ping = new Ping($host);
$latency = $ping->ping();
if ($latency) {
print 'Latency is ' . $latency . ' ms';
}
else {
print 'Host could not be reached.';
}






 ?>
