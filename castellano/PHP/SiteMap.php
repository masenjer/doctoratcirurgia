<?php

error_reporting (0); 
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php"); 

$dominio = "http://inc.uab.cat/Catala";


$resultado = '
<?xml version="1.0" encoding="UTF-8"?>

  <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  	<url>
        <loc>'.$dominio.'/</loc>
	   		<changefreq>weekly</changefreq>
			<priority>1</priority>
	</url>
  	<url>
        <loc>'.$dominio.'/#home</loc>
	   		<changefreq>weekly</changefreq>
			<priority>1</priority>
	</url>
';

$SQL = "SELECT L.* FROM LinMenu L, CapMenu C WHERE C.IdCapMenu = L.IdCapMenu AND C.IdSite = 0";
if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


 while ($row = $result->fetch_assoc())
{
	$titol = str_replace(" ","-",$row["Titol"]);

	$resultado .= '
  	<url>
        <loc>'.$dominio.'/#!/'.$titol.'_'.$row["IdLinMenu"].'_1</loc>
	   		<changefreq>monthly</changefreq>
			<priority>0.8</priority>
	</url>
	';
}

$SQL = "SELECT * FROM LinMD";
if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


 while ($row = $result->fetch_assoc())
{
	$titol = str_replace(" ","-",$row["Titol"]);
	
	$resultado .= '
  	<url>
        <loc>'.$dominio.'/#!/'.$titol.'_'.$row["IdLinMD"].'_2</loc>
	   		<changefreq>monthly</changefreq>
			<priority>0.8</priority>
	</url>
	';
}

 


$resultado.="  </urlset>";

echo $resultado;
		

?>

 