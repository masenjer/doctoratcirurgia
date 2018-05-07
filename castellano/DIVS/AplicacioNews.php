<?php
function CarregaAplicacioNews()
{
	session_start();
	$noticias = new News();
	$noticias->Conexion = "rao/sas_con.php";
?>
<table width="898px" cellpadding="0" cellspacing="0" border="0" style="background:#FFF; border-spacing:0px;">
	<tr>
    	<td height="33px" id="CapcaSuperiorPage" class="CapcaSuperiorPage" align="left">
        	<?php MostraMenuCapcalera(); ?>           
        </td> 
    </tr>
    <tr>
    	 <!--espacio para la columna izquierda --> 
    	<td height="110px"><?php MostraImatgesCapcalera();?></td> <!--espacio para la columna derecha -->
    </tr>
    <tr>
    	<td height="28px"><div id="DIVMenuSuperior"><?php include ("PHP/MenuSCarregaDirecte.php"); ?></div></td>
    </tr>
    <tr valign="top">
    	<td>
            <div class="BuscadorDossierNoticies"><?php MostraBuscadorDossierNoticies(); ?></div>
			<div class="ContenidoDossierNoticies">
            	<?php
					if (mysqli_real_escape_string($mysqli,$_GET["Noticia"])){
						echo $noticias->Carga(mysqli_real_escape_string($mysqli,$_GET["Noticia"]));	
					}
				?>
            </div>
            <div class="ListadoDossierNoticies">
            	<?php 
					echo $noticias->CargaListadoNews($_SESSION["SearchText"],$_SESSION["SearchDesde"],$_SESSION["SearchHasta"], mysqli_real_escape_string($mysqli,$_GET["Noticia"]));	
				?>
            </div>
            <?php
				if (mysqli_real_escape_string($mysqli,$_GET["Noticia"])){
			?>
            	<script>
					$('.ListadoDossierNoticies').scrollTop($('#DIVLlistatNoticies<?php echo mysqli_real_escape_string($mysqli,$_GET["Noticia"]); ?>').offset().top - $('.ListadoDossierNoticies').offset().top);
                </script>
            <?php			
				}
			?>
            <div id="MapaWeb" style="display:none" align="center"></div>
        </td>
    </tr>
    <tr>
    	<td id="PeuPagina" class="PeuPagina" colspan="2" height="145px"><div style="width:100%"></div>
<!--        	<img src="/img/PeuPagina.jpg" width="100%" height="175px" />
-->        </td>
    </tr>

</table>
<?php
}

function MostraBuscadorDossierNoticies(){
?>
	<table width="100%" cellspacing="5" cellpadding="0" border="0" class="TextDossierNoticies">
    	<tr>
        	<td colspan="4"><span class="TitolTextDossierNoticies">Cerca per text</span></td>
        </tr>
        <tr>
        	<td width="90px">Paraules clau</td>
            <td colspan="3"><input id="SearchText" value="<?php echo $_SESSION["SearchText"]; ?>" type="text"></td>
        </tr>
    	<tr>
        	<td colspan="4" style="padding-top:10px;"><span class="TitolTextDossierNoticies">Cerca entre dates</span></td>
        </tr>
        <tr valign="bottom">
        	<td>Des del dia</td>
            <td><input id="SearchDesde" type="text" style="width:70px; " value="<?php echo ($_SESSION["SearchDesde"])?SelectFecha($_SESSION["SearchDesde"]):""; ?>" readonly></td>
        	<td width="60px" align="right">Fins el</td>
            <td><input id="SearchHasta" type="text" style="width:70px;" value="<?php echo ($_SESSION["SearchHasta"])?SelectFecha($_SESSION["SearchHasta"]):""; ?>" readonly></td>
        </tr>
        <tr>
        	<td height="10px"></td>
        </tr>
        <tr>
        	<td colspan="2" align="left"><button class="TextDossierNoticies" onClick="SearchAllNews(<?php echo mysqli_real_escape_string($mysqli,$_GET["Noticia"]); ?>);">Mostrar tots els resultats </button></td>
        	<td colspan="2" align="right"><button class="TextDossierNoticies" onClick="SearchNews(<?php echo mysqli_real_escape_string($mysqli,$_GET["Noticia"]); ?>);">Cercar resultats</button></td>
        </tr>
    </table>
<?php
}
?>