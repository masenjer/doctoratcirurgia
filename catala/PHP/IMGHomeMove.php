<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");

session_start();

if ($_SESSION["Edicio"]){


	$id = mysqli_real_escape_string($mysqli,$_GET["id"]);
	$op = $_GET["op"];
	$orden = mysqli_real_escape_string($mysqli,$_GET["orden"]);

	if ($op == 0)
	{
		$SQL = "SELECT IdIMGHome FROM IMGHome WHERE Orden < ".$orden." ORDER BY Orden DESC LIMIT 1 ";
		$nOrden = $orden - 1;
	}else 
	{
		$SQL = "SELECT IdIMGHome FROM IMGHome WHERE Orden > ".$orden." ORDER BY Orden ASC LIMIT 1 ";
		$nOrden = $orden + 1;
	}

	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


	 while ($row = $result->fetch_assoc())
	{
		$SQL2 = "UPDATE IMGHome SET Orden = ".$orden." WHERE IdIMGHome = ".$row["IdIMGHome"];
		if (!$result2 = $mysqli->query($SQL2))printf("Errormessage: %s\n", mysqli_error($mysqli)); 

	}
		
	$SQL = "UPDATE IMGHome SET Orden = ".$nOrden." WHERE IdIMGHome = ".$id;
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


}

?>