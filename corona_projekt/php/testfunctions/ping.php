<?php


function url_exists($url) {
    return curl_init($url) !== false;
}
if(url_exists("https://stackoverflow.com/questions/2280394/how-can-i-check-if-a-url-exists-via-php")){
  echo "its avaiable, oh yea";
}
else {
  echo "it doesnt exist, boy";
}


 ?>
