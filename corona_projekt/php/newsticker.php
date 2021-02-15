<?php
$servername = "localhost:3306";
$username = "cem";
$password = "YouAreLoco!?*1";
$dbname = "coding";
$counter=0;
$q = $_REQUEST["q"];
$news=array(array("news1",1,2,3),array("news2",1,2,3),array("news3",1,2,3),array("news4",1,2,3));
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Caption,Link FROM News ORDER BY Date,Time DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $news[$counter][0]=$row["Caption"];
      $news[$counter][1]=$row["Link"];
      $counter++;
      if($counter==3){
        echo $news[0][0].": ".$news[0][1]."\t".$news[1][0].": ".$news[1][1]."\t".$news[2][0].": ".$news[2][1];
        break;
      }
    }
}
else{
  echo "0 results";
}

$conn->close();
  ?>
