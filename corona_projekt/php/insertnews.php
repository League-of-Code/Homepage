<?php
    $Uploader = $_POST['uploader'];
    $Verlag = $_POST['Verlag'];
    $Link = $_POST['Link'];
    $Kategorie = $_POST['Kategorie'];
    $Caption = $_POST['Caption'];
    $headline = $_POST['headline'];
    $Datum = $_POST['Datum'];
    $Uhrzeit = $_POST['Uhrzeit'];*/


    if(!empty($Uploader)||!empty($Verlag)||!empty($Link)||!empty($Kategorie)||!empty($Caption)||!empty($headline)||!empty($Datum)||!empty($Uhrzeit)){

      echo "all fields are fill out, thank u much";
    }
    else{

      echo "error: all fields must filled out.";
      die();
    }









?>
