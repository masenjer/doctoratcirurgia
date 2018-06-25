<?php session_start(); 
include($_SERVER['DOCUMENT_ROOT']."/rao/ini.php");
header('Content-Type: text/html; charset=utf-8');
$_SESSION["IdSite"] = 0;
header('Content-type: text/html; charset=utf-8');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">
<?php include("Includes/IncludesPHPDirectori.php");?>
<head>

    	
	<?php //include("PHP/ColorsCanviaGlobal.php");?>
<?php include("Includes/IncludesCSS.php");?>
<title><?php echo $titol_APP; ?></title>
<meta name="description" content=" <?php echo "descripcio_APP"; ?>" />      
<?php include("Includes/IncludesJSDirectori.php");?> 

</head>

<body onLoad="CarregaPagina()" onClick="$('#ResultatCerca').hide('slow')">
<?php // include "AvisoCookies.php"; ?>
<?php include_once("../analyticstracking.php") ?>

<?php 
    //MostraMenuLateralDerecho();
    MostraMenuColor();
?>

<input type="hidden" id="primerDIV" value="0" />

<?php CarregaAplicacioDirectori(); ?>
    	





<?php
	CompruebaPermisosEdicion();
	CompruebaPermisosEdicionIMGHome();
	if ($_SESSION["Usuarios"] == 1) MostraGU();
	if ($_SESSION["Creacio"] == 1) MostraEliminar();

	MostraFormulariEmail();
?>


</body>
</html>
