<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php"); 

$IdCap = mysqli_real_escape_string($mysqli,$_GET["IdCap"]); 

/////Primero compruebo que no se trate de un nodo padre
$SQL = "SELECT * FROM LinMenu WHERE IdCapMenu = ".$IdCap." and tipus = 1 order by Orden ASC LIMIT 1";

if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli)); 
while ($row = $result->fetch_assoc()){

	echo $row["IdLinMenu"];
}


?>