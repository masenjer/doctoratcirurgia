<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");

session_start();

if ($_SESSION["Creacio"]){


	$IdCat = mysqli_real_escape_string($mysqli,$_POST["IdCat"]);

	$SQL = "UPDATE Directori SET IdDirectoriCategoria = NULL WHERE IdDirectoriCategoria = ".$IdCat;
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


	$SQL = "DELETE FROM DirectoriCategoria WHERE IdDirectoriCategoria = " . $IdCat; 
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


	echo $idCap;//."|".$IdLin;
}
?>