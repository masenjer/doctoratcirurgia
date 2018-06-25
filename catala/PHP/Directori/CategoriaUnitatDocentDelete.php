<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");

session_start();

if ($_SESSION["Creacio"]){


	$IdCat = mysqli_real_escape_string($mysqli,$_POST["IdCat"]);

	$SQL = "UPDATE UnitatDocent SET IdUnitatDocent = NULL WHERE IdUnitatDocent = ".$IdCat;
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


	$SQL = "DELETE FROM UnitatDocent WHERE IdUnitatDocent = " . $IdCat; 
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


	echo $idCap;//."|".$IdLin;
}
?>