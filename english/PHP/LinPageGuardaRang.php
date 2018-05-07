<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php"); 

session_start();

if ($_SESSION["Edicio"]){


	$id = mysqli_real_escape_string($mysqli,$_GET["id"]);
	$rang = mysqli_real_escape_string($mysqli,$_GET["rang"]);

	$SQL = "UPDATE LinMenu SET Orden = ".$rang." WHERE IdLinMenu =" . $id;
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


	$SQL = "SELECT IdCapMenu from LinMenu WHERE IdLinMenu =" . $id;
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


	 while ($row = $result->fetch_assoc())
	{
		echo $row["IdCapMenu"];	
	}
}
?>