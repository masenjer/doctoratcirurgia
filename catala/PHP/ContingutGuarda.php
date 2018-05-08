<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php"); 

session_start();

if ($_SESSION["Edicio"]){


	$contingut = mysqli_real_escape_string($mysqli,$_POST["contingut"]);
	$c2 = Pon($contingut);

	$id = mysqli_real_escape_string($mysqli,$_POST["id"]);

	switch(mysqli_real_escape_string($mysqli,$_POST["op"]))
	{
		case 1: 	$SQL = "UPDATE LinMenu SET Contingut = '".$c2."' WHERE IdLinMenu =".$id;
					break;
		case 2: 	$SQL = "UPDATE LinMD SET Contingut = '".$c2."' WHERE IdLinMD =".$id;
					break;

	}



	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli)); 

	echo $id ."|". mysqli_real_escape_string($mysqli,$_POST["op"]);// $contingut;//."|".$IdLin;

}
?>