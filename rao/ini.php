<?php
session_start();	


if ($_SESSION["IdSite"]==0){

	//Títol de l'aplicació
	$titol_APP = "Máster universitario en investigación clínica aplicada en ciencias de la salud"; 

	//Descripció de l'aplicació
	$descripcio_APP = "Formamos investigadores solventes capaces de gestar y de llevar a buen termino proyectos de investigación vinculados a su trayectoria clínica.";

	//Texto de la cabcera que te lleva a la home cuando pulsas encima
	$cabecera_superior = "Máster universitario en investigación clínica aplicada en ciencias de la salud";

	//Text del carousel
	$titol_carousel = "Máster universitario en investigación clínica aplicada en ciencias de la salud";
	$desc_carousel = "";//"Facultat de medicina";

}elseif($_SESSION["IdSite"] == 1){
		//Títol de l'aplicació
	$titol_APP = "Master's degree in applied clinical research in health sciences"; 

	//Descripció de l'aplicació
	$descripcio_APP = "The Master in Applied Clinical Investigation in Health Sciences provides a generic framework of high level postgraduate education the objective of which consists in training able investigators capable of managing and carrying out research projects related to their clinical work.";

	//Texto de la cabcera que te lleva a la home cuando pulsas encima
	$cabecera_superior = "Master's degree in applied clinical research in health sciences";

	//Text del carousel
	$titol_carousel = "Master's degree in applied clinical research in health sciences";
	$desc_carousel = "";//"UAB";

}

?>
