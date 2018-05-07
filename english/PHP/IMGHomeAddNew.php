<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");

session_start();

if ($_SESSION["Creacio"]){


	$name = mysqli_real_escape_string($mysqli,$_GET["name"]);

	$Orden = 0;

	$SQL = "SELECT Orden from IMGHome ORDER By Orden Desc LIMIT 1" ;
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


	 while ($row = $result->fetch_assoc())
	{
		$Orden = $row["Orden"];
	}

	$Orden += 1;

	$SQL = "INSERT INTO IMGHome(Ruta, Orden) VALUES ('".$name."',$Orden)  ";
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


	$SQL = "Select IdIMGHome FROM IMGHome ORDER BY IdIMGHome DESC LIMIT 1";
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


	 while ($row = $result->fetch_assoc())
	{
		$id = $row["IdIMGHome"];
	}

	echo $id."|".$name;

}
?>