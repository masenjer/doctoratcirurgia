<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php");


session_start();

if ($_SESSION["Creacio"]){


	$id = Pon(mysqli_real_escape_string($mysqli,$_POST["id"]));

	$SQL = "DELETE FROM Publicacions WHERE IdPublicacions = ".$id;
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));

}

?>