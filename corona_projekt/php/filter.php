<?php
//file wird geöffnet und inhalt wird in contents gespeichert
$filename = "data.txt";
$handle = fopen($filename, "r");
$contents = fread($handle, filesize($filename));
fclose($handle);

//filter
$input;
$pos = strpos($contents,"<p>Stand:");
//$endpos= strpos($contents,"</p>",$pos);
for($a=$pos+9;$a< strpos($contents,"</p>",$pos);$a++)
{
	$input.=$contents[$a];
}
$input.="<br>";

$pos =strpos($contents,'Todes­fälle</th></tr></thead><tbody><tr class="even"><td colspan="1"');
$length=strlen('rowspan="1">');
for($a=0;$a<=95;$a++){
	$pos =strpos($contents,'rowspan="1">',$pos);
	for($i=0;$contents[$length+$pos+$i]!="<";$i++){
		$input.=$contents[$length+$pos+$i];
	}
	$input.='<br>';
	$pos+=$length;
	}
	
	//gesammtinfektion
$length=strlen('rowspan="1"><strong>');
for($a=0;$a<6;$a++){
	$pos =strpos($contents,'rowspan="1"><strong>',$pos);
	for($i=0;$contents[$length+$pos+$i]!="<";$i++){
		$input.=$contents[$length+$pos+$i];
	}
	$input.='<br>';
	$pos+=$length;
	
}

echo $input;
$fp = fopen('filter.txt','w');
fwrite($fp,$input);
fclose($fp);
?>