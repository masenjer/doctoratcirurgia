<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
include("CS.php"); 

session_start();

if (CS()&&$_SESSION["Creacio"])
{
	$id = mysqli_real_escape_string($mysqli,$_GET["id"]);
	$IMG = mysqli_real_escape_string($mysqli,$_GET["IMG"]);
	
	if ($IMG)
	{
		unlink('../ImgNot/'.$IMG);	
	}
	
	$SQL = "DELETE FROM Noticias WHERE IdNoticia =".$id;
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));

	
	echo $id;
}
?>