<?php
$file = 'https://stackoverflow.com/questions/2280394/how-can-i-check-if-a-url-exists-vi';
$file_headers = @get_headers($file);
if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
    $exists = false;
}
else {
    $exists = true;
}


if($exists){
  echo "its avaiable, oh yea";
}
else {
  echo "it doesnt exist, boy";
}


 ?>
