<?php
	include ("Clase.php");
	include ("../Fechas.php");
	
	$noticias = new News;
	$noticias->Conexion = "/rao/rao_con.php";
	
	$Desde = (mysqli_real_escape_string($mysqli,$_POST["Desde"]))?InsertFecha(mysqli_real_escape_string($mysqli,$_POST["Desde"])):"";
	$Hasta = (mysqli_real_escape_string($mysqli,$_POST["Hasta"]))?InsertFecha(mysqli_real_escape_string($mysqli,$_POST["Hasta"])):"";	
	

	echo $noticias->CargaListadoNews(mysqli_real_escape_string($mysqli,$_POST["txt"]),$Desde,$Hasta,mysqli_real_escape_string($mysqli,$_POST["id"]));
?>