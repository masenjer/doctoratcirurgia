<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php"); 

session_start();

if ($_SESSION["Edicio"]){

	$id = mysqli_real_escape_string($mysqli,$_GET["id"]);
	$rang = mysqli_real_escape_string($mysqli,$_GET["rang"]);

	$SQL = "UPDATE UnitatDocent SET Orden = ".$rang." WHERE IdUnitatDocent =" . $id;
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


	echo $SQL;

}
?>