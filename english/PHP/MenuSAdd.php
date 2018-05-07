<?php
session_start();
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");

if ($_SESSION["Creacio"]){


	$idCap = mysqli_real_escape_string($mysqli,$_GET["IdCap"]);
	$IdLin = mysqli_real_escape_string($mysqli,$_GET["IdLin"]);

	$Orden = 0;

	$SQL = "SELECT Orden from CapMenu WHERE IdSite = ".$_SESSION["IdSite"]." ORDER By Orden Desc LIMIT 1" ;
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


	 while ($row = $result->fetch_assoc())
	{
		$Orden = $row["Orden"] + 1;
	}


	$SQL = "INSERT INTO CapMenu(Titol,Orden,IdSite) VALUES ('Nueva P&aacute;gina',$Orden,".$_SESSION["IdSite"].") ";
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


	//."|".$IdLin;

}
?>