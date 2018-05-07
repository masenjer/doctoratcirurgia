<?php session_start(); 
include($_SERVER['DOCUMENT_ROOT']."/rao/ini.php");
header('Content-Type: text/html; charset=utf-8');
$_SESSION["IdSite"] = 0;
?>
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




<body onload="CarregaPagina()" class="FondoBody">
<?php include "AvisoCookies.php"; ?>
<?php include_once("../analyticstracking.php") ?>

<?php 
	MostraMenuLateralDerecho();
	MostraMenuColor();
?>

<input type="hidden" id="primerDIV" value="0" />



<table width="928px" id="TableOmbres" cellpadding="0" cellspacing="0" border="0" align="center">
	<tr>
    	<td class="TOTALOmbraSupEsq"></td>
    	<td class="TOTALOmbraSupCentral"></td> 
    	<td class="TOTALOmbraSupDreta"></td>
    </tr>
	<tr>
    	<td class="TOTALOmbraEsquerra"></td>
    	<td style="border:1px solid #666;"><?php CarregaAplicacioDirectoriFitxa(); ?></td>
    	<td class="TOTALOmbraDreta"></td>
    </tr>
	<tr>
    	<td class="TOTALOmbraInfEsq"></td>
    	<td class="TOTALOmbraInfCentral"></td>
    	<td class="TOTALOmbraInfDreta"></td>
    </tr>
    <tr>
    	<td colspan="6" align="center" valign="middle" class="fontPeuPagina">
        	<table>
            	<tr>
                	<td align="center" class="fontPeuPagina">
                    	<table>
                        	<tr>
                            	<td style="cursor:pointer" onClick="HomeCarrega();" class="fontPeuPagina"> 
                                	Inici
                                </td>
                                <td class="fontPeuPagina">|</td>
                            	<td style="cursor:pointer" onClick="MostraMapaWeb();" class="fontPeuPagina"> 
                                	Mapa del web
                                </td>
                                <td class="fontPeuPagina">|</td>
                                <td>
                                	<a href="http://crd.uab.cat" class="fontPeuPagina" target="_blank">Sobre el web</a>
                                </td>
                            </tr>
                        </table>                    	
                    </td>
                </tr>
            	<tr>
                	<td center="right" valign="middle" class="fontPeuPagina" > 2013 <b>Centre de Recursos Docents - UAB</b></td>                	
                </tr>
                <tr>
                	<td height="15px"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>





<?php
	CompruebaPermisosEdicion();
	//CompruebaPermisosEdicionIMGHome();
	if ($_SESSION["Usuarios"] == 1) MostraGU();
	if ($_SESSION["Creacio"] == 1) MostraEliminar();

	MostraFormulariEmail();
?>


</body>
</html>
