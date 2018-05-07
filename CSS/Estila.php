<?php 
	header('content-type:text/css');
	
	include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php"); 
	$SQL = "SELECT * FROM Web ";

	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli)); 
	while ($row = $result->fetch_assoc()){

		$color = "#".$row["WebColor"];
		$colorRGB = hex2rgb($color);
	}
?>


#TableOmbres{
	padding:0;
	border-spacing:none;
	border:none;
	border-collapse:collapse;
		
}

#portfolio {
	list-style:none;
	margin:0;padding:0;}


.FondoBody
{
	background-color:#FFF;
}

a
{
	text-decoration:none;
	color:<?php echo $color; ?>;
}

.APeca
{
	font-family: 'Pavanam', sans-serif;
	font-size:14px;
	color:<?php echo $color; ?>;
	cursor:pointer;
	font-weight:bold;	
				
}

.AMidi
{
	font-family: 'Pavanam', sans-serif;
	font-size:14px;
	color:#d7d8da;
	cursor:pointer;	
	font-weight:bold;	
}

.AGran
{
	font-family: 'Pavanam', sans-serif;
	font-size:16px;
	color:#d7d8da;
	cursor:pointer;	
	font-weight:bold;	
}


#Fondo
{
	top:0;
	left:0;
	position:fixed;
	width:100%;
	height:100%;
	z-index:-50;
}

#FondoAdmin
{
	top:0;
	left:0;
	position:fixed;
	width:100%;
	height:100%;
	z-index:-50;
}

.DIVnuS
{
	text-align:center;
	cursor:pointer;
	display:inline;	
}

.ImageMS
{
	width:24px;
	height:24px;
	border:0;
	padding:0;
	cursor:pointer;	
}
#ImageML
{
	width:16px;
	height:16px;
	border:0;
	padding:0;
	cursor:pointer;	
}

.fuenteTitolML /* Titol Menu Esquerre */
{
	font-family: 'Pavanam', sans-serif;
	font-size:11px;	
	font-weight:bold;
	color:<?php echo $color; ?>;
    
	
	background-color:#f3f3f3;
}

#fuenteTitolML{
	padding:10px;
    
}

.fuenteML
{
	font-family: 'Pavanam', sans-serif;
	font-size:11px;	
	font-weight:bold;
	color:#666;
	cursor:pointer;
}

.fuenteTitolML_Contrast /* Titol Menu Esquerre */
{
	font-family: 'Pavanam', sans-serif;
	font-size:12px;	
	font-weight:bold;
	color:<?php echo $color; ?>;
}

.fuenteML_Contrast
{
	font-family: 'Pavanam', sans-serif;
	font-size:11px;	
	font-weight:bold;
	color:#000;
	cursor:pointer;
}

.fuenteTitolMD /* Titol Menu Esquerre */
{
	font-family: 'Pavanam', sans-serif;
	font-size:11px;	
	font-weight:bold;
	background-color:<?php echo $color; ?>;
	color:#FFF;
	background-image:url(/img/CapcaRelleu.png); 
	border-style:solid;
	border-width:1px;
	border-color:<?php echo $color; ?>;
	height:25px;
	padding-left:5px;
	padding-right:5px;
	cursor:pointer;
} 

.fuenteMD
{
	font-family: 'Pavanam', sans-serif;
	font-size:11px;	
	color:#666;
	background-color:#f3f3f3;
}

.fuenteTitolContingut
{
	font-family: 'Pavanam', sans-serif;
	font-size:16px;	
	font-weight:bold;
	color:<?php echo $color; ?>;
	text-align:left;
}

.fuenteContingut
{
	font-family: 'Pavanam', sans-serif;
	font-size:16px;	
	color:#666;
}

.fuenteContingut input{
width: 200px;
}

.fuenteContingut select{
width: 200px;
}

.fuenteContingut table
{
	font-family: 'Pavanam', sans-serif;
	font-size:11px;	
	color:#666;
}



.fuenteCercador
{
	font-family: 'Pavanam', sans-serif;
	font-size:10px;	
	color:#666;
}


.RutaCercador
{
	font-family: 'Pavanam', sans-serif;
	font-size:9px;	
	color:<?php echo $color; ?>;
	cursor:pointer;
	font-weight:bold;
}



#TAContingut
{
	width:100%;
	height:100%;
	background-color:#C93
}

#TANoticia
{
	width:100%;
	height:100px;
}

.fuenteTituloGestionNoticias
{
	font-family: 'Pavanam', sans-serif;
	font-size:12px;	
	font-weight:bold;
	color:#000;
}

.fuenteGestionNoticia
{
	font-family: 'Pavanam', sans-serif;
	font-size:11px;	
	color:#000;
}

#ButtonNoticiaGuarda
{
	width:209px;
	height:29px;
	border:0;
	background:url(/img/ButtonNoticiaGuarda.png);
	cursor:pointer;
}

#ButtonNoticiaElimina
{
	width:209px;
	height:29px;
	border:0;
	background:url(/img/ButtonNoticiaElimina.png);
	cursor:pointer;
}

#ContListNoticias
{
	width:209px;
	height:498px;
	border:0;
	background:url(/img/FondoLisNoticias.png);
}



#DIVConfirmaEliminaNot
{
	display:none;
	width:204px;
	height:29px;
	background:url(/img/ConfirmaEliminaNot.png);
	vertical-align:middle;
		
}

#ButtonAcceptElimina
{
	width:19px;
	height:19px;
	border:0;
	background:url(/img/accept.png);
	cursor:pointer;
}

#ButtonCancelaElimina
{
	width:19px;
	height:19px;
	border:0;
	background:url(/img/cancel.png);
	cursor:pointer;
}



#DIVGU
{
	position:fixed;
	top:0;
	left:0;
	width:100%;
	height:100%;		
	background:url(/img/NegroTrans.png); 
	display:none;
}

#DIVGridGU
{
	width:640px; 
	height:200px; 
	overflow:hidden;	
}


/*---------------------------------------------------- Grid           */

.CapGrid
{
	font-family: 'Pavanam', sans-serif;
	font-size:11px;	
	font-weight:bold;	
}



/*---------------------------------------------------------------------- */

#DIVEliminaUser
{
	display:none;
		
}

#DIVBotoGU
{
	display:none;		
}

#TancaSessio
{
	height:40px; 
	vertical-align:middle;	
	display:none;
	font-family: 'Pavanam', sans-serif;
	font-size:16px;
	color:#F00;
	cursor:pointer;
}

.crd
{
	font-family: 'Pavanam', sans-serif;
	font-size:10px;
	font-weight:bold;
	vertical-align:middle;
	text-decoration:none;	
}






/*--------------------------------------Maquetacio dura------------------------------------*/



.TOTALOmbraDretaCentral
{
	width:62px;
	background-image:URL(/img/TOTALOmbraDretaCentral.jpg);
}

.PeuPagina
{
	background-image:URL(/img/PeuPagina.jpg);
	height:175px;
    background-size:100% 100%;
}

.TOTALOmbraSupEsq
{
	width:15px;
	height:15px;
	background-image:URL(/img/TOTALOmbraSupEsq.png);
	background-position:bottom;
	background-repeat:repeat-x;
}

.TOTALOmbraSupCentral
{
	height:15px;
	background-image:URL(/img/TOTALOmbraSupCentral.png);
	background-position:bottom;
	background-repeat:repeat-x;
}
.TOTALOmbraSupDreta
{
	width:15px;
	height:15px;
	background-image:URL(/img/TOTALOmbraSupDreta.png);
	background-position:bottom;
	background-repeat:no-repeat;
}

.TOTALOmbraEsquerra
{
	width:15px;
	background-image:URL(/img/TOTALOmbraEsquerra.png)
}

.TOTALOmbraDreta
{
	width:15px;
	background-image:URL(/img/TOTALOmbraDreta.png)
}


.TOTALOmbraInfEsq
{
	width:15px;
	height:15px;
	background-image:URL(/img/TOTALOmbraInfEsq.png);
	background-repeat:repeat-x;
}

.TOTALOmbraInfCentral
{
	height:15px;
	background-image:URL(/img/TOTALOmbraInfCentral.png);
	background-repeat:repeat-x;
}

.TOTALOmbraInfDreta
{
	width:15px;
	height:15px;
	background-image:URL(/img/TOTALOmbraInfDreta.png);
	background-repeat:no-repeat;
}

.FonsMenuSupButton
{
	background-image:URL(/img/FonsnuSupButton.jpg)
}

.FonsMenuSupInterButtonGris
{
	
}

#FonsMenuSupInterButtonGris{
	width:100%;
	background-color:<?php echo $color; ?>;
	height:40px;
	/*background:#d0d0ce;
	background-image:URL(/img/FonsMenuSupInterButtonGris.jpg);
	background-repeat:repeat-x;*/
}

.RayaGris
{
	background-color:#dadada;
}

.FonsMenuEsquerre
{
	background-color:#f3f3f3;
}

.OmbraInferiorMenuS
{
	height:7px;
	background-image:URL(/img/OmbraInferiorMenuS.png)
}

.CapcaNoticies
{
	height:25px;
	background-image:URL(/img/CapcaNoticies.jpg)
}


.SI-FILES-STYLIZED label.cabinet
{
	cursor:pointer;
	width: 209px;
	height: 29px;
	background: url(/img/AnadirFicheroButton.png) 0 0 no-repeat;
	
	display: block;
	overflow: hidden;
}

.SI-FILES-STYLIZED label.cabinet input.file
{
position: relative;
cursor:pointer;
height: 100%;
width: auto;
opacity: 0;
-moz-opacity: 0;
filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0);
cursor:pointer;
}

#ButtonDestacatGuarda
{
	width:209px;
	height:29px;
	border:0;
	background:url(/img/AnadirDestacado.png);
	cursor:pointer;
}

#ButtonDestacatElimina
{
	width:209px;
	height:29px;
	border:0;
	background:url(/img/EliminarDestacado.png);
	cursor:pointer;
}

#ButtonEnDirGuarda
{
	width:209px;
	height:29px;
	border:0;
	background:url(/img/AnadirEnlace.png);
	cursor:pointer;
}

#ButtonEnDirElimina
{
	width:209px;
	height:29px;
	border:0;
	background:url(/img/EliminarEnlace.png);
	cursor:pointer;
}

.TitolHome 
{
	font-family: 'Pavanam', sans-serif;
	font-size:11px;
	color:#FFF;	
	font-weight:bold;
	vertical-align:top;
	background-color:<?php echo $color; ?>;
	border: 1px solid <?php echo $color; ?>;
}


.CaixaContacte{
	border-style:solid;
	border-width:1px;
	border-color:#d7d8da;
	padding-left:5px;
	padding-right:5px;	
}







#portfolio{
	cursor:pointer;
}


.TitolMapaWeb
{
	font-family: 'Pavanam', sans-serif;	
	font-size:11px;
	font-weight:bold;
	color:#FFF;
	vertical-align:middle;
	text-align:center;
	cursor:pointer;	
	border-style:solid;
	border-width:1px;
	border-color:<?php echo $color; ?>;
	background-color:<?php echo $color; ?>;
	height:25px;
}

.fuenteMapaWeb
{
	font-family: 'Pavanam', sans-serif;
	font-size:11px;	
	color:#666;
	cursor:pointer;
}

a:link.OpcionsContingut
{
	font-family: 'Pavanam', sans-serif;
	font-size:11px;	
	text-decoration:none;
	color:#444;
	text-height:13px;
}

a:visited.OpcionsContingut
{
	font-family: 'Pavanam', sans-serif;
	font-size:11px;	
	text-decoration:none;
	color:#444;
	text-height:13px;
}

.ButtonDelete
{
	border:none;
	background:url(/img/delete.jpg);
	cursor:pointer;
	width:32px;
	height:32px;
}

.ButtonSave32
{
	border:none;
	background:url(/img/Save32.jpg);
	cursor:pointer;
	width:32px;
	height:32px;
}

.InfoColor{
	color:#ffffff;
	font-family: 'Pavanam', sans-serif;
	font-size:9;
	padding:5px;
}

.fuenteInfoDROW
{
	font-family: 'Pavanam', sans-serif;
	font-size:12px;	
	color:#FFF;
	font-weight:bold;
	padding-left:28px;
	padding-right:10px;
	height:36px; 
	width:220px; 
	background-image:URL(/img/FonsTitolDROW.png);
}

.PertanyUAB_0
{
	font-family: 'Pavanam', sans-serif;
	font-size:12px;	
	color:#FFF;
	font-weight:bold;
	padding-left:28px;
	padding-right:10px;
	height:26px; 
	width:156px; 
	background-image:URL(/img/PertanyUAB_0.png);
	vertical-align:middle;
	padding-top:10px;
}

.PertanyUAB_1
{
	font-family: 'Pavanam', sans-serif;
	font-size:12px;	
	color:#FFF;
	font-weight:bold;
	padding-left:28px;
	padding-right:10px;
	height:26px; 
	width:156px; 
	background-image:URL(/img/PertanyUAB_1.png);
	vertical-align:bottom;
	padding-top:10px;

}

.TancaFormButton
{
	width:45px;
	background-image:URL(/img/TancarForm.jpg);
	cursor:pointer;
		
}

.fontPeuPagina
{
	font-family: 'Pavanam', sans-serif;
	font-size:10px;
	text-decoration:none;
	color:#FFF;
}


#NewIMGHome
{
	border:none;
	background-image:URL(/img/plus.jpg);
	background-color:none;
	width:32px;
	height:32px;
	cursor:pointer;	
}


.ButtonRIGHT32
{
	border:none;
	background:url(/img/Right32.jpg);
	cursor:pointer;
	width:32px;
	height:32px;
}


.ButtonLEFT32
{
	border:none;
	background:url(/img/Left32.jpg);
	cursor:pointer;
	width:32px;
	height:32px;
}

.fuenteTitolMenuPageOculta /* Titol Menu Esquerre */
{
	font-family: 'Pavanam', sans-serif;
	font-size:11px;	
	font-weight:bold;
	color:#C00;
	
	background-color:#aaa;
}

.fuenteMenuPageOculta
{
	font-family: 'Pavanam', sans-serif;
	font-size:11px;	
	font-weight:bold;
	color:#FFF;
	cursor:pointer;
	background-color:#aaa;
}

.OrdenML{
	width:23px; 
	height:23px; 
	vertical-align:middle;
	padding:2px;
	margin:0;
	border:1px solid #bbb;	
	text-align:center;
}


.OrdenMO{
	width:16px; 
	height:16px; 
	vertical-align:middle;
	padding:0;
	margin:0;
	border:1px solid #bbb;	
}


#MPaginesOcultes{
	height:500px;
	overflow-y:auto;
	aoverflow-x:none;
}

.ListadoMiniIMGHome5{
	width:161px;
    height:121px;
	-moz-border-radius: 10px 10px 10px 10px;
	/*para Safari y Chrome*/
	-webkit-border-radius: 10px 10px 10px 10px;
	/* para Opera */
	border-radius: 10px 10px 10px 10px;
    /*opacity:0.3;
   cursor:pointer;*/
}

.ListadoMiniIMGHome5:hover{
	opacity:1;
}


.FacebookButton{
	height:25px;
	width:26px;
	border:none;
	background:url(/img/Buttons/BannerFacebook.png);
	background-repeat:no-repeat;
	cursor:pointer;	
}

.FacebookButton:hover{
	background:URL(/img/Buttons/BannerFacebook_hover.png);
	background-repeat:no-repeat;
}

.TwitterButton{
	height:25px;
	width:26px;
	border:none;
	background:url(/img/Buttons/BannerTwitter.png);
	background-repeat:no-repeat;
	cursor:pointer;	
}

.TwitterButton:hover{
	background:URL(/img/Buttons/BannerTwitter_hover.png);
	background-repeat:no-repeat;
}

.GoogleButton{
	height:25px;
	width:26px;
	border:none;
	background:url(/img/Buttons/BannerGoogle.png);
	background-repeat:no-repeat;
	cursor:pointer;	
}

.GoogleButton:hover{
	background:URL(/img/Buttons/BannerGoogle_hover.png);
	background-repeat:no-repeat;
}

.INButton{
	height:25px;
	width:26px;
	border:none;
	background:url(/img/Buttons/BannerIN.png);
	background-repeat:no-repeat;
	cursor:pointer;	
}

.INButton:hover{
	background:URL(/img/Buttons/BannerIN_hover.png);
	background-repeat:no-repeat;
}

.YoutubeButton{
	height:25px;
	width:26px;
	border:none;
	background:url(/img/Buttons/BannerYoutube.png);
	background-repeat:no-repeat;
	cursor:pointer;	
}

.YoutubeButton:hover{
	background:URL(/img/Buttons/BannerYoutube_hover.png);
	background-repeat:no-repeat;
}

.PlusButton{
	width:16px;
	height:16px;
	background:URL(/img/plus.jpg);
	background-size:100% 100%;
	border:none;
	cursor:pointer;
}

.GUButton{
	width:16px;
	height:16px;
	background:URL(/img/GU.jpg);
	background-size:100% 100%;
	border:none;
	cursor:pointer;
}



/* ----------------------Espacio para el login de la home---------------------- */
.fuenteTitolLogin{
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size:12px;
	color:<?php echo $color; ?>;
	text-align:left;
	font-weight:bold;
}
.fuenteLogin{
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size:12px;
	color:#aaa;
	text-align:justify;
}

.inputfuenteLogin {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size:15px;
	color:#333;
	text-align:left;
	vertical-align:middle;
	border:1px solid #dedede;
	-moz-border-radius: 10px 10px 10px 10px;
	/*para Safari y Chrome*/
	-webkit-border-radius: 10px 10px 10px 10px;
	/* para Opera */
	border-radius: 10px 10px 10px 10px;
	padding:3px;
	color:#aaa;
}

.CajaBlancaBordeRedondo{
	padding:10px;
	background-color: #FFF;
	height: 215px;
	width: 100%;
	border:1px solid #dedede;
	-moz-border-radius: 10px 10px 10px 10px;
	/*para Safari y Chrome*/
	-webkit-border-radius: 10px 10px 10px 10px;
	/* para Opera */
	border-radius: 10px 10px 10px 10px;
	
	
}

.LoginButton
{
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size:15px;
	background-color:<?php echo $color; ?>;
	-moz-border-radius: 10px 10px 10px 10px;
	/*para Safari y Chrome*/
	-webkit-border-radius: 10px 10px 10px 10px;
	/* para Opera */
	border-radius: 10px 10px 10px 10px;
	height:30px;
	color:#FFF;
	width:100%;
	cursor:pointer;
	border:none;
}

.LoginButton:hover
{
	background-color:#555;
}

/* ----------------------Espacio para el login de la home---------------------- */

.RecuadreArrodonitColorSinPadding{
	-moz-border-radius: 10px 10px 10px 10px;
	/*para Safari y Chrome*/
	-webkit-border-radius: 10px 10px 10px 10px;
	/* para Opera */
	border-radius: 10px 10px 10px 10px;
	background-color:rgba(<?php echo $colorRGB; ?>, 0.1);
}

.RecuadreArrodonitColor{
    padding:20px;
    padding-top:20px;
	-moz-border-radius: 10px 10px 10px 10px;
	/*para Safari y Chrome*/
	-webkit-border-radius: 10px 10px 10px 10px;
	/* para Opera */
	border-radius: 10px 10px 10px 10px;
	background-color:rgba(<?php echo $colorRGB; ?>, 0.1);
    margin-bottom:20px;
   
    box-sizing:border-box; 
    -moz-box-sizing:border-box;    /* Firefox */ 
    -webkit-box-sizing:border-box; /* Safari */
}

.RecuadreArrodonitGris{
    padding:20px;
    padding-top:20px;
	-moz-border-radius: 10px 10px 10px 10px;
	/*para Safari y Chrome*/
	-webkit-border-radius: 10px 10px 10px 10px;
	/* para Opera */
	border-radius: 10px 10px 10px 10px;
	background-color:rgba(0,0,0, 0.1);
    margin-bottom:20px;
   
    box-sizing:border-box; 
    -moz-box-sizing:border-box;    /* Firefox */ 
    -webkit-box-sizing:border-box; /* Safari */
}

.ArrodonaDIV{ 
	-moz-border-radius: 10px 10px 10px 10px;
	/*para Safari y Chrome*/
	-webkit-border-radius: 10px 10px 10px 10px;
	/* para Opera */
	border-radius: 10px 10px 10px 10px;

    box-sizing:border-box; 
    -moz-box-sizing:border-box;    /* Firefox */ 
    -webkit-box-sizing:border-box; /* Safari */
}

.ColorOpaco{
	background-color:<?php echo $color; ?>;
    color:#FFF;
}

.MenuVertical{
    padding-left:40px;
    padding-bottom:40px;
    padding-top:40px;
	-moz-border-radius: 10px 0px 0px 10px;
	/*para Safari y Chrome*/
	-webkit-border-radius: 10px 0px 0px 10px;
	/* para Opera */
	border-radius: 10px 0px 0px 10px;
	background-color:#f9f9f9;
    margin-bottom:20px;
}

.ContingutInferior{
    padding:40px;
    padding-top:20px;
	-moz-border-radius: 0px 10px 10px 10px;
	/*para Safari y Chrome*/
	-webkit-border-radius: 0px 10px 10px 10px;
	/* para Opera */
	border-radius: 0px 10px 10px 10px;
	background-color:#f9f9f9;
    margin-bottom:20px;
}

.fondoMV0{
	background-color:rgba(<?php echo $colorRGB; ?>, 0.1);
    cursor:pointer;
    padding:10px;
}

.fondoMV0:hover{
	background-color:rgba(50,50,50, 0.1);
}

.fondoMV1{
	background-color:rgba(150,150,150, 0.1);
    cursor:pointer;
    padding:10px;
}

.fondoMV1:hover{
	background-color:rgba(50,50,50, 0.1);
}




.BotonRedondo{
    width:20px;
    height:20px;
	color:<?php echo $color; ?>;
	-moz-border-radius: 10px 10px 10px 10px;
	/*para Safari y Chrome*/
	-webkit-border-radius: 10px 10px 10px 10px;
	/* para Opera */
	border-radius: 10px 10px 10px 10px;
	background:none;
    border: 2px solid <?php echo $color; ?>;
	font-weight:bold;
   	font-family: 'Pavanam', sans-serif;
	font-size:12px;	
	text-align:center;
    padding:0;
    margin:0;
    cursor:pointer;
    background:#FFF;
}

.BotonRedondo:hover{
	background:rgba(<?php echo $colorRGB; ?>, 0.2);
}

.Redondo{
    margin: 0px;
    padding: 0px;
    border-radius: 800px;
    overflow: hidden;
    width:185px; 
    height:185px;
    display:inline-block;
   	border:1px solid <?php echo $color; ?>;

}

.Logo{
	background:url(/img/Logo.png) #FFF center no-repeat;
    background-size:130px ;
    margin:0px;
}

.UAB{
	background:url(/img/UABTrans.png) <?php echo $color; ?> center no-repeat;
    background-size:130px ;
    display:inline-block;
    margin:0px;
}

.IMGHomeDin{
}

.inputContVar{
	width:100%;
    text-align:left;
    padding:10px;
    margin-bottom:10px;
}



.normal img{
	-moz-border-radius: 5px 5px 5px 5px;
	/*para Safari y Chrome*/
	-webkit-border-radius: 5px 5px 5px 5px;
	/* para Opera */
	border-radius: 5px 5px 5px 5px;
}


.capcalera{
	color:<?php echo $color; ?>;
    padding:5px;
}

.capcalera a:hover{
	color:#FFF;
   	background-color:<?php echo $color; ?>;
   	-moz-border-radius: 5px 5px 5px 5px;
	/*para Safari y Chrome*/
	-webkit-border-radius: 5px 5px 5px 5px;
	/* para Opera */
	border-radius: 5px 5px 5px 5px;

}

.CapcaSuperiorPage
{
	
	background-color:rgba(<?php echo $colorRGB; ?>, 0.1);
    height:40px;
    text-align:center;
    
}




.ButtonMS
{
	font-family: 'Pavanam', sans-serif;
	font-size: 20px;
//	-moz-border-radius: 10px 10px 10px 10px;
//	/*para Safari y Chrome*/
//	-webkit-border-radius: 10px 10px 10px 10px;
//	/* para Opera */
//	border-radius: 10px 10px 10px 10px;
	vertical-align:middle;
	text-align:center; 
	cursor:pointer;  
	
	color:#fff; 
	padding-left:5px;
	padding-right:5px; 
    height:40px;
    width:100%; 
    border:none;
    background:none;
    margin-top:0;
	
}

.ButtonMS:hover{
/*	color:#FFF;
	background-color:<?php echo $color; ?>;
*/
	background-color:rgba(255,255,255,0.5);
    
    
}

.ButtonMS:active{
	background-color:#999;
}

.ButtonMS a{
	text-decoration:none;
	color:#FFF;}

.ButtonInicioMS{
	width:40px;
	background:url(/img/Home.png) rgba(<?php echo $colorRGB; ?>, 0.4) center no-repeat;
}


.DIVContNoticias{
	display: inline-block;
    width:385px; 
    float:left;
    margin-right:20px;
       
    box-sizing:border-box; 
    -moz-box-sizing:border-box;    /* Firefox */ 
    -webkit-box-sizing:border-box; /* Safari */

}

.ContVariableHome{
	display: inline-block; 
    width:55%; 
    float:left;
    
}

.RayaSeparación{
	width:100%;
    height:10px;
    border-top:1px solid #ddd;
}

.EnllacEndir{
	border-bottom:1px solid rgba(<?php echo $colorRGB; ?>, 0.2);
    padding:10px;
    cursor:pointer;
    text-align:left;
}

.EnllacEndir:hover{
//	-moz-border-radius: 10px 10px 10px 10px;
//	/*para Safari y Chrome*/
//	-webkit-border-radius: 10px 10px 10px 10px;
//	/* para Opera */
//	border-radius: 10px 10px 10px 10px;
//	background-color:rgba(<?php echo $colorRGB; ?>, 0.2);
	border-bottom: 1px solid <?php echo $color; ?>;
   // margin-bottom: -2px;
   	color:<?php echo $color; ?>;
}

.DIVContColumnaDerecha{
	display: inline-block; 
	float:right;
    width:270px;
    padding-top:20px;
}

.MenuDret{
	cursor:pointer;
}

.MenuDret:hover{
	color:#FFF;
	background-color:rgba(<?php echo $colorRGB; ?>, 0.2);
}

* {
    margin: 0;
}
html {
  position: relative;
  min-height: 100%;
}
body {
  /* Margin bottom by footer height */
  margin-bottom: 60px;
}
/*
.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  /* Set the fixed height of the footer here */
  height: 40px;
  background-color: #f5f5f5;
  text-align:center;
}

*/

.vcenter {
    display: inline-block;
    vertical-align: middle;
    float: none;
}

.normal li{
	margin-bottom:15px;
}

.IMGHome img{
	-moz-border-radius: 15px 15px 15px 15px;
	/*para Safari y Chrome*/
	-webkit-border-radius: 15px 15px 15px 15px;
	/* para Opera */
	border-radius: 15px 15px 15px 15px;
}

.DivCerca{
	width:300px;
	margin-right:3px;
	vertical-align:center;
	margin-top:3px;
}

.vcenter {
    display: inline-block;
    vertical-align: middle;
    float: none;
}

.BarraIdioma{
	margin-top:10px;
	margin-right:10px;
}







<?php
function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = $r.",".$g.",".$b;
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}
?>