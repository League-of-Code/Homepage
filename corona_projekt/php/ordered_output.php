<?php
$servername = "localhost:3306";
$username = "cem";
$password = "YouAreLoco!?*1";
$dbname = "coding";
$counter=0;
$q = $_REQUEST["q"];
//muliarray represent the federal countrys.
$bund_zahlen=array(array("Bayern",1,2,3,4,5,6,7),array("Niedersachsen",1,2,3,4,5,6,7),array("Bayern",1,2,3,4,5,6,7),array("Bayern",1,2,3,4,5,6,7),array("Bayern",1,2,3,4,5,6,7),array("Bayern",1,2,3,4,5,6,7),array("Bayern",1,2,3,4,5,6,7),array("Bayern",1,2,3,4,5,6,7),array("Bayern",1,2,3,4,5,6,7),array("Bayern",1,2,3,4,5,6,7),array("Bayern",1,2,3,4,5,6,7),array("Bayern",1,2,3,4,5,6,7),array("Bayern",1,2,3,4,5,6,7),array("Bayern",1,2,3,4,5,6,7),array("Bayern",1,2,3,4,5,6,7),array("Bayern",1,2,3,4,5,6,7),array("Bayern",1,2,3,4,5,6,7));


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Ort, Datum, Infektion_Gesammt, Neuinfektion, sevendays_incidence, sevendays_cases, mortality_rate FROM rki_corona_data ORDER BY Datum DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	  if($counter>16)
	  {
		  break;
	  }
	  if($row["Ort"]==$q)
	  {
		  $bund_zahlen[$counter][0]=$row["Ort"];
		  $bund_zahlen[$counter][1]=$row["Datum"];
		  $bund_zahlen[$counter][2]=$row["Infektion_Gesammt"];
		  $bund_zahlen[$counter][3]=$row["Neuinfektion"];
		  $bund_zahlen[$counter][4]=$row["sevendays_incidence"];
		  $bund_zahlen[$counter][5]=$row["sevendays_cases"];
		  $bund_zahlen[$counter][6]=$row["mortality_rate"];
		  echo $bund_zahlen[$counter][0]."|".$bund_zahlen[$counter][1]."|".$bund_zahlen[$counter][2]."|".$bund_zahlen[$counter][3]."|".$bund_zahlen[$counter][4]."|".$bund_zahlen[$counter][5]."|".$bund_zahlen[$counter][6];
	  }
	  $counter++;
  }
}
else 
{
	echo "0 results";
}
$conn->close();
?>