<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
session_start();

////LinPage és tipus 1

if ($_SESSION["Creacio"]){


$Orden = 0;

$SQL = "SELECT Orden from DirectoriCategoria ORDER By Orden Desc LIMIT 1" ;

if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli)); 
while ($row = $result->fetch_assoc()){

	$Orden = $row["Orden"] + 1;
}
$SQL = "INSERT INTO DirectoriCategoria(Orden) VALUES ($Orden) ";
if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli)); 

echo "1";

}

//echo $SQL;

//echo $idCap;//."|".$IdLin;
?>