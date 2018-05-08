<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
session_start();

if ($_SESSION["Creacio"]){


	////Pàgina oculta és tipus 2

	$idCap = mysqli_real_escape_string($mysqli,$_GET["IdCap"]);
	$IdLin = mysqli_real_escape_string($mysqli,$_GET["IdLin"]);

	$Orden = 0;

	$SQL = "SELECT Orden from LinMenu WHERE IdSite =".$_SESSION["IdSite"]." AND Tipus = 2 ORDER By Orden Desc LIMIT 1" ;
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


	 while ($row = $result->fetch_assoc())
	{
		$Orden = $row["Orden"] + 1;
	}

	$SQL = "INSERT INTO LinMenu(IdCapMenu, IdLinMenuRel, Titol,Orden, Tipus, IdSite) VALUES ($idCap,$IdLin,'Nueva P&aacute;gina',$Orden,2,".$_SESSION["IdSite"].") ";
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


	echo $idCap;//."|".$IdLin;

}
?>