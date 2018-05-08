<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");

session_start();

if ($_SESSION["Creacio"]){


	$idCap = mysqli_real_escape_string($mysqli,$_GET["IdCap"]);
	$IdLin = mysqli_real_escape_string($mysqli,$_GET["IdLin"]);

	$SQL = "DELETE FROM LinMenu WHERE IdLinMenu = " . $IdLin; 
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


	echo $idCap;//."|".$IdLin;
}
?>