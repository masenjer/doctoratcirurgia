<?php
function MostraDirectori()
{
?>
<div id="Directori">
    <table width="890px" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF" >
      <tr valign="top">
          <td width="13px"></td> 
          <td width="190px" height="100%" style="padding-top:27px;"><?php DirectoriDret()?></td>
          <td width="10px"></td> 
          <td align="left" style="padding-top:30px;"><?php MostraEstructuraDirectori(); ?></td> <!--espacio para la columna izquierda --> 
          <td width="10px"></td>
      </tr>
  </table>
</div>
<?php
}

function MostraEstructuraDirectori(){
?>

<?php
    $Conn = "rao/sas_con.php";
    
    if ($_SESSION["Edicio"]=="1") $res = MostraDirectoriPrivat('',$Conn,mysqli_real_escape_string($mysqli,$_GET["Categoria"]));
    else $res = MostraDirectoriPublic('',$Conn,mysqli_real_escape_string($mysqli,$_GET["Categoria"]));
	
	$res = explode("|",$res);
?>

<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
    	<td colspan="2"><?php MostraCercadorDirectori(); ?></td>
    </tr>
    <tr>
    	<td align="right"><div id="ComptadorResultatsDirectori"><?php echo $res[1];?></div></td>
        <td align="right" width="10px">
        	<div id="ButtonAddDirectori" style="padding-top:11px; display:none;">
        		<input type="button" id="NewDirectoriButton" class="ButtonPlus" onclick="MostraNouDirectori();" />
            </div>
        </td>
    </tr>
    <tr>
    	<td colspan="2" style="padding-top:10px; padding-bottom:30px;"><?php NewDirectori(); ?></td>
    </tr>
    <tr>
    	<td colspan="2" align="center">
        	<div id="ResultatsDirectori"><?php echo $res[0];?>      


        	</div>
    	</td>
    </tr>
</table>
<?php
}

function MostraCercadorDirectori()
{
?>	
<div class="RecuadreCercadorAuxiliar">
<table width="100%" cellpadding="0" cellspacing="0" class="">
	<tr>
    	<td class="fuenteTitolContingut">Cerca per paraules clau:</td>
        <td class="fuenteContingut"></td>
    </tr>
    <tr>
    	<td colspan="2" style="padding-top:5px;"><input type="text" id="CercadorDirectori" class="TextBoxCercadorCpC" onkeyup="DirectoriCercador();" /></td>
    </tr>
</table>
</div>
<?php
}

function NewDirectori()
{
?>
<div id="DIVNewDirectori" style="display:none;">
	<table width="100%" cellpadding="4" cellspacing="0" style="border:1px solid #ddd; padding:10px;" class="fuenteContingut">
    	<tr>
        	<td>Nom</td>
            <td><input type="text" id="NomNewDirectori" class="fuenteContingut" /></td>
        	<td>Cognoms</td>
            <td><input type="text" id="CognomsNewDirectori" class="fuenteContingut" /></td>
        </tr>
    	<tr>
        	<td>E-mail</td>
            <td><input type="text" id="EmailNewDirectori" class="fuenteContingut" /></td>
        	<td>Tel&egrave;fon</td>
            <td><input type="text" id="TelefonNewDirectori" class="fuenteContingut" /></td>
        </tr>
        <tr>
        	<td>Ubicaci&oacute;</td>
            <td><input type="text" id="UbicacioNewDirectori" class="fuenteContingut" /></td>
            <td>Despatx</td>
            <td><input type="text" id="DespatxNewDirectori" class="fuenteContingut" /></td>
        </tr>
        <tr>
        	<td>Categoria1</td>
            <td>
            	<select id="Categoria1NewDirectori" class="fuenteContingut" >
            		<?php 
						$Conn = "rao/sas_con.php";
						
						$array = CategoriaDirectoriCargaSelect('', $Conn);
						echo $array[1];
					?>
            	</select>
            </td>
        	<td>Categoria2</td>
            <td>
            	<select id="Categoria2NewDirectori" class="fuenteContingut" >
            		<?php 
						$Conn = "rao/sas_con.php";
						
						$array = CategoriaDirectoriCargaSelect('', $Conn);
						echo $array[1];
					?>
            	</select>
            </td>
        </tr>
        <tr>
        	<td>Imatge</td>
            <td colspan="3">
	           	<form  ENCTYPE="multipart/form-data" id="FormPujaNewIMGDirectori" name="FormPujaNewIMGDirectori" method="post" action="PHP/UploadFiles.php?op=1" target="IframePujaNewIMGDirectori">
		            <input type="file" id="ImatgeNewDirectori" name="ImatgeNewDirectori" class="fuenteContingut" />
               	</form>
                <iframe name="IframePujaNewIMGDirectori" style="display:none"></iframe> 
            </td>
        </tr>
        <tr>
        	<td colspan="4" align="right">
            	<input type="button" value="Cancelar" onclick="TancaNouDirectori();" />
                <input type="button" value="Aceptar" onclick="AddNewDirectori();" />
            </td>
        </tr>
    </table>
</div>
<?php
}


function DirectoriDret(){
?>
	<table>
<!--    	<tr>
        	<td><?php //include("PHP/DestacatMenuCarregaDirecte.php"); ?></td>
        </tr>
-->        <tr>
        	<td><div id="DIVCategoriesDirectori"><?php include("PHP/Directori/CategoriaDirectoriMenuCarregaDirecte.php"); ?></div></td>
        </tr>
    </table>
<?php		
}
?>