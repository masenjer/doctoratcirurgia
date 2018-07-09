<?php
function MostraDirectoriFitxa()
{
?>
<div id="DirectoriFitxa" class="container">
	<div class="row" style="padding-top: 30px;">
		
			<?php   
		  	
				if ($_SESSION["Edicio"]=="1") MostraEstructuraDirectoriFitxaPrivat();
    			else MostraEstructuraDirectoriFitxaPublic(); 
			
			?>
		</div>
		
	</div>

	
</div>
<?php
}

function CargaCuerpoAdminPestanyaDirectoriFitxa($form, $txt){
?>
<div id="DIVCuerpo<?php echo $form; ?>Directori" class="DadesFitxaDirectori" style="display:none;">
	<textarea id="TACuerpo<?php echo $form; ?>Directori" class="form-control" rows="30" style="width:100%"><?php echo $txt ?></textarea>
    <div align="right"><button class="btn btn-success" onClick="GuardaSubFitxaDirectori('<?php echo $form ?>',<?php echo $_GET["id"] ?>)" style=" margin-top:10px;">Guardar Informació de la pestanya</button></div>
</div>    
<?php
}

function CargaCuerpoPestanyaDirectoriFitxa($form, $txt){
?>
<div id="DIVCuerpo<?php echo $form; ?>Directori" class="DadesFitxaDirectori" style="display:none;">
	<?php echo $txt ?>
</div>    
<link rel="stylesheet" type="text/css" href="CSS/rss.scopus.css">
<?php
}

function MostraEstructuraDirectoriFitxaPrivat(){

    $Conn = "rao/sas_con.php";
	include $Conn;
		
	$row = json_decode(CarregaDadesProfile_JSON($_GET["id"]),true);

		$arrayCategoria1 = CategoriaDirectoriCargaSelect($row["IdDirectoriCategoria1"], $Conn);
		$arrayCategoria2 = CategoriaDirectoriCargaSelect($row["IdDirectoriCategoria2"], $Conn);
		$arrayUnitatDocent1 = UDDirectoriCargaSelect($row["IdUnitatDocent1"], $Conn);
		$arrayUnitatDocent2 = UDDirectoriCargaSelect($row["IdUnitatDocent2"], $Conn);
		
		if ($row["Imatge"]) $IMG = '<img src="../IMGDirectori/'.$row["Imatge"].'" style="width:150px; padding:20px;">';
		else $IMG = "";

		$checked = ($row["Tutor"])?"checked":"";
		
		echo '
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="fuenteContingut>
		<tr valign="top">
			<td></td><td >'.$IMG.'</td>
		</tr>
		<tr>
			</td>
			<td  style="padding-right:20px;">Nom i Cognoms:</td>
			<td>
				<input type="text" id="NomEditaDirectori'.$row["IdDirectori"].'" class="form-control"  value="'.$row["Nom"].'"></td>
		</tr>
		<tr>
			<td>Cognoms:</td>
			<td>
				<input type="text" id="CognomsEditaDirectori'.$row["IdDirectori"].'" class="form-control"  value="'.$row["Cognoms"].'"> </td>
		</tr>
					<tr>
				<td>Especialitat (Català):</td>
				<td style="padding-right:5px;"><input type="text" id="Especialitat_caEditaDirectori'.$row["IdDirectori"].'" class="form-control"  value="'.$row["Especialitat_ca"].'" style="width:100%;"></td>
			</tr>
			<tr>
				<td>Especialitat (Castellano):</td>
				<td style="padding-right:5px;"><input type="text" id="Especialitat_esEditaDirectori'.$row["IdDirectori"].'" class="form-control"  value="'.$row["Especialitat_es"].'" style="width:100%;"></td>
			</tr>
			<tr>
				<td>Especialitat (English):</td>
				<td style="padding-right:5px;"><input type="text" id="Especialitat_enEditaDirectori'.$row["IdDirectori"].'" class="form-control"  value="'.$row["Especialitat_en"].'" style="width:100%;"></td>
			</tr>

		<tr>
			<td>Categoria (Català):</td>
			<td style="padding-right:5px;"><input type="text" id="Carrec_caEditaDirectori'.$row["IdDirectori"].'" class="form-control"  value="'.$row["Carrec_ca"].'" style="width:100%;"></td>
		</tr>
		<tr>
			<td>Categoria(Castellano):</td>
			<td style="padding-right:5px;"><input type="text" id="Carrec_esEditaDirectori'.$row["IdDirectori"].'" class="form-control"  value="'.$row["Carrec_es"].'" style="width:100%;"></td>
		</tr>
		<tr>
			<td>Categoria(English):</td>
			<td style="padding-right:5px;"><input type="text" id="Carrec_enEditaDirectori'.$row["IdDirectori"].'" class="form-control"  value="'.$row["Carrec_en"].'" style="width:100%;"></td>
		</tr>
		<tr>
			<td>És tutor:</td>
			<td style="padding-right:5px;"><input type="checkbox" class="custom-control-input" id="tutor'.$row["IdDirectori"].'" '.$checked.'></td>
		</tr>
		<tr>
			<td>Nombre de tesis en direcció:</td>
			<td style="padding-right:5px;"><input type="text" id="TesisEditaDirectori'.$row["IdDirectori"].'" class="form-control"  value="'.$row["Tesis"].'" style="width:100%;"></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td style="padding-right:5px;"><input type="text" id="EmailEditaDirectori'.$row["IdDirectori"].'" class="form-control"  value="'.$row["Email"].'" style="width:100%;"></td>
		</tr>
		<tr>
			<td>Tel&egrave;fon:</td>
			<td style="padding-right:5px;"><input type="text" id="TelefonEditaDirectori'.$row["IdDirectori"].'" class="form-control"  value="'.$row["Telefon"].'" style="width:100%;"></td>
		</tr>
		<tr>
			<td>Ubicaci&oacute;:</td>
			<td style="padding-right:5px;"><textarea id="UbicacioEditaDirectori'.$row["IdDirectori"].'" class="form-control" style="width:100%;" rows="5">'.$row["Ubicacio"].'</textarea></td>
		</tr>
		<tr>
			<td>Horari:</td>
			<td style="padding-right:5px;"><textarea id="HorariEditaDirectori'.$row["IdDirectori"].'" class="form-control" style="width:100%;" rows="5">'.$row["Horari"].'</textarea></td>
		</tr>
		<tr>
			<td style=" padding-Bottom:5px;">Substituir imatge:</td>
			<td style="padding-right:5px; padding-Bottom:5px;">
	           	<form  ENCTYPE="multipart/form-data" id="FormPujaEditaIMGDirectori'.$row["IdDirectori"].'" name="FormPujaEditaIMGDirectori'.$row["IdDirectori"].'" method="post" action="PHP/UploadFiles.php?op=1" target="IframePujaEditaIMGDirectori'.$row["IdDirectori"].'">
		            <input type="file" id="ImatgeEditaDirectori'.$row["IdDirectori"].'" name="ImatgeEditaDirectori'.$row["IdDirectori"].'" class="form-control" />
               	</form>
                <iframe name="IframePujaEditaIMGDirectori'.$row["IdDirectori"].'" style="display:none"></iframe> 
			</td>
		</tr>

		<tr>
			<td>Categoria1:</td>
			<td><select id="Categoria1EditaDirectori'.$row["IdDirectori"].'" class="form-control" style="width:100%;">'.$arrayCategoria1[1].'</select></td>
		</tr>
		<tr>
			<td>Categoria2:</td>
			<td><select id="Categoria2EditaDirectori'.$row["IdDirectori"].'" class="form-control" style="width:100%;">'.$arrayCategoria2[1].'</select></td>
		</tr>
		<tr>
			<td>Unitat Docent 1:</td>
			<td><select id="UD1EditaDirectori'.$row["IdDirectori"].'" class="form-control" style="width:100%;">'.$arrayUnitatDocent1[1].'</select></td>
		</tr>
		<tr>
			<td>Unitat Docent 2:</td>
			<td><select id="UD2EditaDirectori'.$row["IdDirectori"].'" class="form-control" style="width:100%;">'.$arrayUnitatDocent2[1].'</select></td>
		</tr>
		<tr>
			<td>Xarxes socials:</td>
			<td style="padding-right:5px;"><textarea id="XarxesEditaDirectori'.$row["IdDirectori"].'" class="form-control" style="width:100%;" rows="5">'.$row["Xarxes"].'</textarea></td>
		</tr>

		<tr>
			<td colspan="3" align="right">
				<button class="btn btn-success" onclick="DirectoriUpdate('.$row["IdDirectori"].')" style="margin-top:10px;">Guardar els canvis al registre</button>
			</td>
		</tr>
</table>


<script>

	var config2 = {
		toolbar: [
			[\'Source\'],[\'-\'],[\'Bold\',\'Italic\'],[\'-\'],[\'Table\',\'Image\',\'Link\']
		],
		height:\'50px\',
		filebrowserBrowseUrl : \'ckfinder/ckfinder.html\',
		filebrowserImageBrowseUrl : \'ckfinder/ckfinder.html?Type=Images\',
		filebrowserFlashBrowseUrl : \'ckfinder/ckfinder.html?Type=Flash\',
		filebrowserUploadUrl : \'PHP/UploadFiles.php?op=1\'
	};


	$(\'#UbicacioEditaDirectori'.$row["IdDirectori"].'\').ckeditor(config2);
	$(\'#HorariEditaDirectori'.$row["IdDirectori"].'\').ckeditor(config2);
	$(\'#XarxesEditaDirectori'.$row["IdDirectori"].'\').ckeditor(config2);
</script>
';
?>

		<ul class="nav nav-tabs">
		  <li><a onclick="MuestraPerfilDirectoriFitxa();">Perfil</a></li>
		  <li><a onclick="MuestraInvesDirectoriFitxa();">Recerca</a></li>
		  <li><a onclick="MuestraPubliDirectoriFitxa();">Publicacions</a></li>
		</ul>

                
            <div id="CuerpoPestanyaDirectoriFitxa" >
				<?php 
					
					include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
					
					$SQL = "SELECT Perfil, Inves, Publi FROM Directori WHERE  IdDirectori = ".$_GET["id"];
				
					if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli)); 
	
					while ($row = $result->fetch_assoc()){
							CargaCuerpoAdminPestanyaDirectoriFitxa('Perfil', $row["Perfil"]); 
							CargaCuerpoAdminPestanyaDirectoriFitxa('Inves', $row["Inves"]);
							CargaCuerpoAdminPestanyaDirectoriFitxa('Publi', $row["Publi"]);
						
					}
				?>
				            <script>
            	InicializaPestanyas();
            </script>
            </div>  

<?php
}

function MostraEstructuraDirectoriFitxaPublic(){

    $Conn = "rao/sas_con.php";
	include $Conn;
	session_start();
	
		switch ($_SESSION["IdSite"]){
		case 0: $idioma = "_ca";
				break;
		case 1: $idioma = "_es";
				break;
		case 2: $idioma = "_en";
				break;	
		}

	
	$row = json_decode(CarregaDadesProfile_JSON($_GET["id"]),true);



		if ($row["Imatge"]) $IMG = '<img class="IMGFitxaDirectori" src="../IMGDirectori/'.$row["Imatge"].'"  alt="'.$row["Nom"].' '.$row["Cognoms"].'" title="'.$row["Nom"].' '.$row["Cognoms"].'">';
		else $IMG = "";
		
		echo '

	<div class="col-md-2">
		<p>'.$IMG.'</p>
			
		<p>
			<span class="DadesFitxaDirectori"><b>Telèfon</b></br>'.$row["Telefon"].'</span> 
		</p>
		<p>
			<span class="DadesFitxaDirectori"><b>Horari d\'atenció:</b></br>'.$row["Horari"].'</span>
		</p>
		<p>
			<span class="DadesFitxaDirectori"><b>Ubicaci&oacute;</b></br>'.$row["Ubicacio"].'</span>
		</p>
		<div id="DIVXarxesDirectori" >'.$row["Xarxes"].'</div>
	</div>
		

		';
?>
	<div class="col-md-10">
		<p >
			<span class="h1" colspan="2"><?php echo $row["Nom"].' '.$row["Cognoms"];?></span> 
		</p>
		<p>
			<span class="h3" colspan="2"><?php echo $row["Carrec".$idioma];?></span>
		</p>
		<p>
			<span class="h4" colspan="2"><?php echo $row["TitolDC1"]; ?></span> 
		</p>

		<?php if ($row["TitolDC2"]){?>
			
		<p>
			<span class="h4" colspan="2"><?php echo $row["TitolDC2"]; ?></span> 
		</p>
	<?php } ?>

		<p style="padding-top: 20px;">
			<span class="DadesFitxaDirectori"><b>Especialitat</b></br><?php echo $row["Especialitat".$idioma]; ?></span> 
		</p>
		
		
		<p>
			<span class="DadesFitxaDirectori"><b>Nombre de tesis en direcció</b></br><?php echo $row["Tesis"]; ?></span> 
		</p>
		


		<ul class="nav nav-tabs">
		  <li><a href="#" onclick="MuestraPerfilDirectoriFitxa();">Perfil</a></li>
		  <li><a href="#" onclick="MuestraInvesDirectoriFitxa();">Recerca</a></li>
		  <li><a href="#" onclick="MuestraPubliDirectoriFitxa();">Publicacions</a></li>
		</ul>

                
            <div id="CuerpoPestanyaDirectoriFitxa" >
				<?php 
					
					include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
					
					$SQL = "SELECT Perfil, Inves, Publi FROM Directori WHERE  IdDirectori = ".$_GET["id"];
				
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

	</div>
<?php

}
?>