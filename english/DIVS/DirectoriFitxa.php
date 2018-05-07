<?php
function MostraDirectoriFitxa()
{
?>
<div id="DirectoriFitxa">
	<table width="890px" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF" >
    	<tr valign="top">
        	<td width="13px"></td> 
          	<td align="left" style="padding-top:30px;"><?php   
		  	
			if ($_SESSION["Edicio"]=="1") MostraEstructuraDirectoriFitxaPrivat();
    		else MostraEstructuraDirectoriFitxaPublic(); 
			
		?>	</td> <!--espacio para la columna izquierda --> 
          	<td width="10px"></td>
          	<td width="190px" height="100%" style="padding-top:27px;"><?php include("PHP/DestacatMenuCarregaDirecte.php"); ?></td>
          	<td width="10px"></td> 
      	</tr>
      	<tr>
          	<td width="13px"></td> 
    	  	<td colspan="3" style="padding-top:20px;">
        	<?php
				//MostraCosDirectoriFitxa();
			?>
                <table cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td id="PestanyasDirectoriFitxa0" class="PestanyaSeleccionada" onclick="MuestraPerfilDirectoriFitxa();">Perfil</td>
                        <td id="PestanyasDirectoriFitxa1" class="Pestanya" onclick="MuestraInvesDirectoriFitxa();">Recerca</td>
                        <td id="PestanyasDirectoriFitxa2" class="Pestanya" onclick="MuestraPubliDirectoriFitxa();">Publicacions</td>
                    </tr>
                </table>
          	</td>
          	<td width="13px"></td> 
      	</tr>
        <tr>
        	<td width="13px"></td> 
            <td colspan="3">
            <div id="CuerpoPestanyaDirectoriFitxa" class="CuerpoPestanya fuenteContingut">
				<?php 
					
					include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
					
					$SQL = "SELECT Perfil, Inves, Publi FROM Directori WHERE  IdDirectori = ".mysqli_real_escape_string($mysqli,$_GET["id"]);
				
					if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli)); 
					while ($row = $result->fetch_assoc()){

						if ($_SESSION["Edicio"]=="1"){
							CargaCuerpoAdminPestanyaDirectoriFitxa('Perfil', $row["Perfil"]); 
							CargaCuerpoAdminPestanyaDirectoriFitxa('Inves', $row["Inves"]);
							CargaCuerpoAdminPestanyaDirectoriFitxa('Publi', $row["Publi"]);
						}
						else{
							CargaCuerpoPestanyaDirectoriFitxa('Perfil', $row["Perfil"]); 
							CargaCuerpoPestanyaDirectoriFitxa('Inves', $row["Inves"]);
							CargaCuerpoPestanyaDirectoriFitxa('Publi', $row["Publi"]);
						}
					}
				?>
            </div>
            <script>
            	InicializaPestanyas();
            </script>
            </td>
        	<td width="13px"></td> 
        </tr>
  	</table>
</div>
<?php
}

function CargaCuerpoAdminPestanyaDirectoriFitxa($form, $txt){
?>
<div id="DIVCuerpo<?php echo $form; ?>Directori" class="DadesFitxaDirectori" style="display:none;">
	<textarea id="TACuerpo<?php echo $form; ?>Directori" class="fuenteContingut" rows="30" style="width:100%"><?php echo $txt ?></textarea>
    <button class="fuenteContingut" onClick="GuardaSubFitxaDirectori('<?php echo $form ?>',<?php echo mysqli_real_escape_string($mysqli,$_GET["id"]) ?>)" style=" margin-top:10px;">Guardar Informació de la pestanya</button>
</div>    
<?php
}

function CargaCuerpoPestanyaDirectoriFitxa($form, $txt){
?>
<div id="DIVCuerpo<?php echo $form; ?>Directori" class="DadesFitxaDirectori" style="display:none;">
	<?php echo $txt ?>
</div>    
<?php
}

function MostraEstructuraDirectoriFitxaPrivat(){

    $Conn = "rao/sas_con.php";
	include $Conn;
	
	
	$row = json_decode(CarregaDadesProfile_JSON(mysqli_real_escape_string($mysqli,$_GET["id"]), $Conn),true);

		$arrayCategoria1 = CategoriaDirectoriCargaSelect($row["IdDirectoriCategoria1"], $Conn);
		$arrayCategoria2 = CategoriaDirectoriCargaSelect($row["IdDirectoriCategoria2"], $Conn);

		if ($row["Imatge"]) $IMG = '<img src="../IMGDirectori/'.$row["Imatge"].'" style="width:150px; padding:20px;">';
		else $IMG = "";
		
		echo '
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="fuenteContingut">
		<tr valign="top">
			<td rowspan="9" style="padding-right:20px;">'.$IMG.'
			</td>
			<td  style="padding-right:20px;">Nom i Cognoms:</td>
			<td>
				<input type="text" id="NomEditaDirectori'.$row["IdDirectori"].'" class="fuenteContingut"  value="'.$row["Nom"].'">
				<input type="text" id="CognomsEditaDirectori'.$row["IdDirectori"].'" class="fuenteContingut"  value="'.$row["Cognoms"].'"> </td>
		</tr>
		<tr>
			<td>C&agrave;rrec:</td>
			<td style="padding-right:5px;"><input type="text" id="CarrecEditaDirectori'.$row["IdDirectori"].'" class="fuenteContingut"  value="'.$row["Carrec"].'" style="width:100%;"></a></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td style="padding-right:5px;"><input type="text" id="EmailEditaDirectori'.$row["IdDirectori"].'" class="fuenteContingut"  value="'.$row["Email"].'" style="width:100%;"></a></td>
		</tr>
		<tr>
			<td>Tel&egrave;fon:</td>
			<td style="padding-right:5px;"><input type="text" id="TelefonEditaDirectori'.$row["IdDirectori"].'" class="fuenteContingut"  value="'.$row["Telefon"].'" style="width:100%;"></td>
		</tr>
		<tr>
			<td>Adre&ccedil;a:</td>
			<td style="padding-right:5px;"><textarea id="AdrecaEditaDirectori'.$row["IdDirectori"].'" class="fuenteContingut" style="width:100%;" rows="5">'.$row["Adreca"].'</textarea></td>
		</tr>
		<tr>
			<td style=" padding-Bottom:5px;">Substituir imatge:</td>
			<td style="padding-right:5px; padding-Bottom:5px;">
	           	<form  ENCTYPE="multipart/form-data" id="FormPujaEditaIMGDirectori'.$row["IdDirectori"].'" name="FormPujaEditaIMGDirectori'.$row["IdDirectori"].'" method="post" action="PHP/UploadFiles.php?op=1" target="IframePujaEditaIMGDirectori'.$row["IdDirectori"].'">
		            <input type="file" id="ImatgeEditaDirectori'.$row["IdDirectori"].'" name="ImatgeEditaDirectori'.$row["IdDirectori"].'" class="fuenteContingut" />
               	</form>
                <iframe name="IframePujaEditaIMGDirectori'.$row["IdDirectori"].'" style="display:none"></iframe> 
			</td>
		</tr>

		<tr>
			<td>Categoria1:</td>
			<td><select id="Categoria1EditaDirectori'.$row["IdDirectori"].'" class="fuenteContingut" style="width:100%;">'.$arrayCategoria1[1].'</select></td>
		</tr>
		<tr>
			<td>Categoria2:</td>
			<td><select id="Categoria2EditaDirectori'.$row["IdDirectori"].'" class="fuenteContingut" style="width:100%;">'.$arrayCategoria2[1].'</select></td>
		</tr>
		<tr>
			<td>Xarxes socials:</td>
			<td style="padding-right:5px;"><textarea id="XarxesEditaDirectori'.$row["IdDirectori"].'" class="fuenteContingut" style="width:100%;" rows="5">'.$row["Xarxes"].'</textarea></td>
		</tr>
		<tr>
			<td colspan="3" align="right">
				<button class="fuenteContingut" onclick="DirectoriUpdate('.$row["IdDirectori"].')" style="margin-top:10px;">Guardar els canvis al registre</button>
			</td>
		</tr>
</table>
<script>

	var config2 = {
		toolbar: [
			[\'Source\'],[\'-\'],[\'Bold\',\'Italic\'],[\'-\'],[\'Image\',\'Link\']
		],
		height:\'50px\',
		filebrowserBrowseUrl : \'ckfinder/ckfinder.html\',
		filebrowserImageBrowseUrl : \'ckfinder/ckfinder.html?Type=Images\',
		filebrowserFlashBrowseUrl : \'ckfinder/ckfinder.html?Type=Flash\',
		filebrowserUploadUrl : \'PHP/UploadFiles.php?op=1\'
	};


	$(\'#AdrecaEditaDirectori'.$row["IdDirectori"].'\').ckeditor(config2);
	$(\'#XarxesEditaDirectori'.$row["IdDirectori"].'\').ckeditor(config2);
</script>
';


}

function MostraEstructuraDirectoriFitxaPublic(){

    $Conn = "rao/sas_con.php";
	include $Conn;
	
	$row = json_decode(CarregaDadesProfile_JSON(mysqli_real_escape_string($mysqli,$_GET["id"]), $Conn),true);

		if ($row["Imatge"]) $IMG = '<img class="IMGFitxaDirectori" src="../IMGDirectori/'.$row["Imatge"].'"  alt="'.$row["Nom"].' '.$row["Cognoms"].'" title="'.$row["Nom"].' '.$row["Cognoms"].'">';
		else $IMG = "";
		
		echo '
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="fuenteContingut">
		<tr>
			<td rowspan="8" style="padding-right:10px;">'.$IMG.'
				<div id="DIVXarxesDirectori"  class="fuenteContingut">'.$row["Xarxes"].'</div>
			</td>
			<td><span class="NomFitxaDirectori">'.$row["Nom"].' '.$row["Cognoms"].'</span> </td>
		</tr>
		<tr>
			<td><span class="CarrecFitxaDirectori">'.$row["Carrec"].'</span> </td>
		</tr>
		<tr>
			<td style="padding-top:10px;"><span class="DadesFitxaDirectori"><b>E-Mail</b></br>'.$row["Email"].'</span> </td>
		</tr>
		<tr>
			<td style="padding-top:10px;"><span class="DadesFitxaDirectori"><b>Telèfon</b></br>'.$row["Telefon"].'</span> </td>
		</tr>
		<tr>
			<td style="padding-top:10px;"><span class="DadesFitxaDirectori"><b>Adre&ccedil;a</b></br>'.$row["Adreca"].'</span> </td>
		</tr>
</table>';


}
?>