<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
include("CS.php"); 

if (CS()&&$_SESSION["Noticias"])
{
	$id = mysqli_real_escape_string($mysqli,$_POST["id"]);
	$r = mysqli_real_escape_string($mysqli,$_POST["r"]);
	
	if (!$r) $r = "NULL";
	
	$SQL = "UPDATE Noticias SET Rang = ".$r." WHERE IdNoticia =" . $id;
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));

	
	echo $SQL;
}
else echo "4055";
?>