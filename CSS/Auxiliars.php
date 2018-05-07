<?php 
	header('content-type:text/css');
	
	include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php"); 
	$SQL = "SELECT * FROM Web ";
	
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli)); 
	while ($row = $result->fetch_assoc()){

		$color = "#".$row["WebColor"];
	}
?>
.RecuadreCercadorAuxiliar{
	float:left;
	padding:20px;
	border:1px solid #ddd;
	background-color:#f3f3f3;
	width:627px;
	height:44px;
}

.TextBoxCercadorCpC{
	font-family:Verdana, Geneva, sans-serif;
	font-size:11px;	
	color:#666;

	width:100%;
	background-image:URL('/img/Lupa.png');
	background-repeat:no-repeat;
	background-position:right;	
	border:1px solid #ddd;
	padding:3px;
	
}

.NomFitxaDirectori{
	font-family:Verdana, Geneva, sans-serif;
	font-size:18px;	
	color:<?php echo $color; ?>;;
}



.CarrecFitxaDirectori{
	font-family:Verdana, Geneva, sans-serif;
	font-size:13px;	
	color:<?php echo $color; ?>;
	text-align:justify;
}

.DadesFitxaDirectori{
	font-family:Verdana, Geneva, sans-serif;
	font-size:13px;	
	color:#666;
	text-align:justify;
}

.DadesFitxaDirectori li{
	padding-top:10px;	
}

.IMGFitxaDirectori{
	-moz-border-radius: 10px 10px 10px 10px;
	/*para Safari y Chrome*/
	-webkit-border-radius: 10px 10px 10px 10px;
	/* para Opera */
	border-radius: 10px 10px 10px 10px;
	
	width:200px;
	height:200px;
	
}


.IMGFitxaDirectoriLlistat{
	-moz-border-radius: 10px 10px 10px 10px;
	/*para Safari y Chrome*/
	-webkit-border-radius: 10px 10px 10px 10px;
	/* para Opera */
	border-radius: 10px 10px 10px 10px;
	margin-right:40px;
	margin-left:30px;
}

.NomLlistatDirectori{
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;	
	color:<?php echo $color; ?>;
	text-decoration:none;
}

.InfoLlistatDirectori{
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;	
	color:<?php echo $color; ?>;
	text-decoration:none;
	cursor:pointer;
}

.CarrecLlistatDirectori{
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;	
	color:<?php echo $color; ?>;
}

.CosDossierDossierNoticies{
	position:absolute;
	top:50%;
	left:50%;
	
	width:950px;
	height:500px;
	/*indicamos que el margen superior, es la mitad de la altura*/
	margin-top:-250px;
	/*indicamos que el margen izquierdo, es la mitad de la anchura*/
	margin-left:-475px;


	-moz-border-radius: 10px 10px 10px 10px;
	/*para Safari y Chrome*/
	-webkit-border-radius: 10px 10px 10px 10px;
	/* para Opera */
	border-radius: 10px 10px 10px 10px;
	border:10px #333 solid;
	background:#fff;
}

.CapcaleraDossierNoticies{
	width:100%;
	float:left;
	color:#fff;
	background:<?php echo $color; ?>;
	height:40px;
}

.TitolCapcaDossierNoticies{
	float:left;
	font-family:Verdana, Geneva, sans-serif;
	font-size:13px;	
	font-weight:bold;
	color:#fff;
	padding:10px;
	padding-left:30px;
	
}

.TancaCapcaDossierNoticies{
	float:right;
	padding:12px;

}

.BuscadorDossierNoticies{
	float:left;
	width:361px;
	margin:10px;
	background:#e7e7e7;
	border:1px solid #c7c7c7;
	padding:10px;
	text-align:justify;
}

.ListadoDossierNoticies{
	float:left;
	width:381px;
	height:294px;
	margin:10px;
	margin-top:0px;
	border:1px solid #c7c7c7;
	text-align:justify;
	overflow-x:hidden;
}

.NewsLlistat{
	width:321;
	border-bottom:1px solid #ddd;
	background:#fafafa;
	padding: 20px;	
	cursor:pointer;
}

.NewsLlistat:hover{
	background:#f4f4f4;
}

.NewsLlistat_SEL{
	width:321;
	border-bottom:1px solid #ddd;
	background:#e2e2e2;
	padding: 20px;	
	cursor:pointer;
	color:#FFF;
}
	
.NewsLlistatFecha{
	font-style:italic;
	font-size:12px;	
}

.ContenidoDossierNoticies{
	float:right;
	width:455px;
	margin-top:0px;
	padding:20px;
	text-align:justify;
	min-height:300px;
}

.TitolTextDossierNoticies{
	text-align:justify;
	font-family:Verdana, Geneva, sans-serif;
	font-size:13px;	
	font-weight:bold;
	color:<?php echo $color; ?>;
}

.TextDossierNoticies{
	text-align:justify;
	font-family:Verdana, Geneva, sans-serif;
	font-size:13px;	
	color:#666;
}

.TextDossierNoticies input{
	width:100%;	
}

.TitolCategoriaDirectori{
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;	
	color:<?php echo $color; ?>;
	text-decoration:none;
	cursor:pointer;
	border-bottom:1px solid <?php echo $color; ?>;
	padding-top:30px;
}

.ui-datepicker-trigger{
	vertical-align:bottom;	
	height:19px;
	width:18px;
	border-right: 1px #aaa solid;
}

#ResultatCerca{
	position: absolute; 
	width: 500px; 
	height: 90%; 
	overflow: auto; 
	z-index: 1000; 
	display: none; 
	margin-top:30px;
}

