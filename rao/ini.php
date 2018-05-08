<?php
session_start();	


if ($_SESSION["IdSite"]==0){

	//Títol de l'aplicació
	$titol_APP = "Doctorat en Cirurgia i Ciències Morfològiques"; 

	//Descripció de l'aplicació
	$descripcio_APP = "Aquest programa de doctorat cerca que els doctorands puguin adquirir les competències necessàries com a investigadors en les diferents especialitats de l’àmbit quirúrgic, en el camp de l’anatomia i l’embriologia o en el de l’anatomia patològica, en els seus vessants estructural i molecular, dins del camp de les ciències de la salut.";

	//Texto de la cabcera que te lleva a la home cuando pulsas encima
	$cabecera_superior = "Doctorat en Cirurgia i Ciències Morfològiques";

	//Text del carousel
	$titol_carousel = "Doctorat en Cirurgia i Ciències Morfològiques";
	$desc_carousel = "Facultat de medicina";

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
