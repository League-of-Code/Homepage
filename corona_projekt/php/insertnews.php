<?php
  function urlchecker($file){
    $file_headers = @get_headers($file);
    if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
        $exists = false;
    }
    else {
        $exists = true;
    }
    return $exists;
}


    $Uploader = $_POST['uploader'];
    $Verlag = $_POST['Verlag'];
    $Link = $_POST['Link'];
    $Kategorie = $_POST['Kategorie'];
    $Caption = $_POST['Caption'];
    $headline = $_POST['headline'];
    $Datum = $_POST['Datum'];
    $Uhrzeit = $_POST['Uhrzeit'];


    if(empty($Uploader)||empty($Verlag)||empty($Link)||empty($Kategorie)||empty($Caption)||empty($headline)||empty($Datum)||empty($Uhrzeit)){
      echo "error: all fields must filled out.";
      die();
    }

    //errorhandling für kaputte URLS
    if(urlchecker(!$Link)){
      echo "Dieser Link ist nicht gültig!";
      die();
    }

    //Datenbankabfrage für redundanz

    //alles korrekt --> einspeißung der Daten in die DB







?>
