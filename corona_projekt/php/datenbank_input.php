<?php
//deklaration der Variablen der bestände aus der Datenbank
$servername = "localhost:3306";
$username = "cem";
$password = "YouAreLoco!?*1";
$dbname = "coding";

$newornot=true;
$datum;
$uhrzeit;
$data=array("","","","","","","","","");
$pos=0;
$endpos;



//file wird geöffnet und inhalt wird in contents gespeichert
$filename = "filter.txt";
$handle = fopen($filename, "r");
$contents = fread($handle, filesize($filename));
fclose($handle);
//ende contents enthält das file


//Uhrzeit und Datum
//Datuminput
$pos= strpos($contents,",");
for($a=1;$a<$pos;$a++){
	$datum.=$contents[$a];
	echo $contents[$a];
}
//datumkonvertierung
$datum=str_replace(".","-",$datum);
$datum = strtotime($datum);
$datum = date('Y-m-d',$datum);
echo " aktuelle eingetragene Datum : $datum";
//Uhrzeitinput
$endpos=strpos($contents,"U",$pos);
for($a=$pos+1;$a<$endpos-1;$a++){
	$uhrzeit.=$contents[$a];
}
//$uhrzeit.=":00";
$uhrzeit=date('h:i:s',$uhrzeit);
echo "  $uhrzeit";
//Task:.. whitespaces müssen noch von den Variablen entfernt werden

//Next Task: überprüfe ob es schon in der Datenbank schon einen Eintrag für dieses Datum und Uhrzeit gab..
//Datenbank einbeziehen

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Datum, Uhrzeit FROM  rki_corona_data";

//query abfrage
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
  // output data für jede row
	//verbesserung wäre, immer das aktuelle Datum einmal zu vergleichen. sonst wird das skript eine n lauffähigkeit haben. jedoch ist eine n lauffähigkeit nicht sehr groß.
  while($row = $result->fetch_assoc())
  {
    echo "Datum: " . $row["Datum"] ."Uhrzeit". $row["Uhrzeit"]."<br>";
	 if($row["Datum"]==$datum && $row["Uhrzeit"]==$uhrzeit)
	 {
		 echo "holla de waldfee";
		 $newornot=false;
	 }
	 else 
	 { 
		 echo "isnt there ma folk";
	 }
  }
}
	
if($newornot)
{
	for($a=0;$a<17;$a++)
	{
		//data input in array
		for($d=0;$d<6;$d++){
			//text insertion
			$pos=$pos+1;
			$pos=strpos($contents,">",$pos);
			for($h=1;$contents[$h+$pos]!="<";$h++)
			{
				if($contents[$h+$pos]!=".")
				{
					$data[$d].=$contents[$h+$pos];
				}
			}
		}
				
	$sql = "INSERT INTO `rki_corona_data` (Ort, Datum, Uhrzeit, Infektion_Gesammt, Neuinfektion, sevendays_incidence, sevendays_cases, mortality_rate) VALUES ('$data[0]', '$datum', '$uhrzeit', '$data[1]', '$data[2]', '$data[3]','$data[4]', '$data[5]')";
		if ($conn->query($sql) === TRUE)
		{
			echo "New record created successfully";
			echo $data[4];
			$data=array("","","","","","","","","");
		}
		else 
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
}
$conn->close();

?>