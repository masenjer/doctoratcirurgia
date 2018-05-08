<?php
	$nombre_fichero = "../mapa/mapa.txt";
	$gestor = fopen($nombre_fichero, "r");
	$contenido = fread($gestor, filesize($nombre_fichero));
	fclose($gestor);
	
	echo $contenido;
?>