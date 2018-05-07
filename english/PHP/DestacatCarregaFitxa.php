<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");

$id = mysqli_real_escape_string($mysqli,$_GET["id"]);

$SQL = "SELECT * FROM Destacat WHERE IdDestacat = ".$id;

if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli)); 
while ($row = $result->fetch_assoc()){

	$FB = $row["FormatBoto"];
	$IMG = $row["Imatge"];
	$TE = $row["TipusEnllac"];
	$URL = $row["URL"];
}


echo $FB."*****".$IMG."*****".$TE."*****".$URL."*****".$id;

?>