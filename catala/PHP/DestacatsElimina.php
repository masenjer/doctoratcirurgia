<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");

session_start();

if ($_SESSION["Creacio"]){


	$id = mysqli_real_escape_string($mysqli,$_GET["id"]);
	$IMG = mysqli_real_escape_string($mysqli,$_GET["IMG"]);

	if ($IMG)
	{
		unlink('../ImgDes/'.$IMG);	
	}

	$SQL = "DELETE FROM Destacat WHERE IdDestacat =".$id;
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


	echo $id;
}
?>