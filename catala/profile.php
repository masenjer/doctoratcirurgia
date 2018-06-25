<?php session_start(); 
header('Content-Type: text/html; charset=utf-8');
$_SESSION["IdSite"] = 0;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 


<html xmlns="http://www.w3.org/1999/xhtml">
<?php include("Includes/IncludesPHPDirectori.php");?>
<head>

    	
	<?php //include("PHP/ColorsCanviaGlobal.php");?>
<?php include("Includes/IncludesCSS.php");?>
<?php include("Includes/IncludesJSDirectori.php");?> 

<?php
	//////Crea los metas title y description para el robot de google
	include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
	
	$SQL = "SELECT Nom, Cognoms, Email, Telefon FROM Directori WHERE  IdDirectori = ".$_GET["id"];
	
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));
			
	 while ($row = $result->fetch_assoc()){
		echo '<title>'.$row["Nom"].' '.$row["Cognoms"].'</title>';
		echo '<meta property="description" content="Email:'.$row["Email"].', Tel.:'.$row["Telefon"].', Perfil, Recerca, Publicacions." />';
	}

?>


</head>




<body onload="CarregaPagina()" class="FondoBody">
<?php include "AvisoCookies.php"; ?>
<?php include_once("../analyticstracking.php") ?>

<?php 
	//MostraMenuLateralDerecho();
	MostraMenuColor();
?>

<input type="hidden" id="primerDIV" value="0" />

<?php CarregaAplicacioDirectoriFitxa(); ?></td>
    	


<?php
	CompruebaPermisosEdicion();
	CompruebaPermisosEdicionIMGHome();
	if ($_SESSION["Usuarios"] == 1) MostraGU();
	if ($_SESSION["Creacio"] == 1) MostraEliminar();

	MostraFormulariEmail();
?>


</body>
</html>
