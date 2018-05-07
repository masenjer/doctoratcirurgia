<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php"); 

session_start();

if ($_SESSION["Edicio"]){


	$color = mysqli_real_escape_string($mysqli,$_GET["color"]);

	$SQL = "UPDATE Web SET ButtonsColor = '".$color."'";
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli)); 

	//echo $SQL;
	echo $color;// $contingut;//."|".$IdLin;
}
?>