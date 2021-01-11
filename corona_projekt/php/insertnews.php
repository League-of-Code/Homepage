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
    //db öffnen

    $servername = "localhost:3306";
    $username = "cem";
    $password = "YouAreLoco!?*1";
    $dbname = "coding";


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    //Datenbankabfrage für redundanz
    $sql = "SELECT Link FROM  News";
    $result = $conn->query($sql);
    foreach($results as $urls){
      echo $urls;
      if($urls == $Link){
        die("Link ist Vorhanden, soorrrey");
      }
    }
    //alles korrekt --> einspeißung der Daten in die DB
    $sql = "INSERT INTO `News` (Headline,Caption,Date,Time,Category,Publisher,Link,Uploader) VALUES ('$headline','$Caption','$Datum','$Uhrzeit','$Kategorie','$Verlag','$Link','$Uploader')";

    if ($conn->query($sql) === TRUE)
		{
			echo "New record created successfully";
		}
		else
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
    $conn->close();





?>
