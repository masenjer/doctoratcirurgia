<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");

session_start();

if ($_SESSION["Creacio"]){


	$IdCap = mysqli_real_escape_string($mysqli,$_GET["IdCap"]);

	$SQL = "DELETE FROM LinMenu WHERE IdCapMenu = " . $IdCap . " AND Tipus <> 2"; 
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


	$SQL = "DELETE FROM CapMenu WHERE IdCapMenu = " . $IdCap; 
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));

}
?>