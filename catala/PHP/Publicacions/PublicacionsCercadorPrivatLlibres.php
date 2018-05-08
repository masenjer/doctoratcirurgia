<?php

function MostraPublicacionsPrivatLlibres($txt,$tipus)
{
	include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php"); 
	
	if ($txt)
	{	
		foreach ($txt as $v)
		{
			if ($cond) $cond.=" AND ";
			
			$cond .= "(Nom LIKE '%".$v."%' OR Cognoms LIKE '%".$v."%' OR Despatx LIKE '%".$v."%' OR Ubicacio LIKE '%".$v."%' OR Telefon LIKE '%".$v."%' OR Email LIKE '%".$v."%')";
		}
		
			$SQL = "SELECT * FROM Publicacions WHERE ".$cond;
	}
	else 	$SQL = "SELECT * FROM Publicacions";
	
	echo '
		<table class="fuenteContingut">	';
	
	//echo $SQL;
	
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));

	
	 while ($row = $result->fetch_assoc())
	{
		if ($row["Imatge"]) $IMG = '<img src="imgPublicacions/'.$row["Imatge"].'" style="width:51px; height:64px;">';
		else $IMG = "";
		echo'
		<tr>
			<td rowspan="6" style="padding-right:20px;">'.$IMG.'</td>
			<td  style="padding-right:20px;">Nom i Cognoms:</td>
			<td>
				<input type="text" id="NomEditaPublicacions'.$row["IdPublicacions"].'" class="fuenteContingut"  value="'.$row["Nom"].'">
				<input type="text" id="CognomsEditaPublicacions'.$row["IdPublicacions"].'" class="fuenteContingut"  value="'.$row["Cognoms"].'"> </td>
		</tr>
		<tr>
			<td>Despatx:</td>
			<td><input type="text" id="DespatxEditaPublicacions'.$row["IdPublicacions"].'" class="fuenteContingut"  value="'.$row["Despatx"].'" style="width:100%;"></td>
		</tr>
		<tr>
			<td>Ubicacio:</td>
			<td><input type="text" id="UbicacioEditaPublicacions'.$row["IdPublicacions"].'" class="fuenteContingut"  value="'.$row["Ubicacio"].'" style="width:100%;"></td>
		</tr>
		<tr>
			<td>Tel&egrave;fon:</td>
			<td><input type="text" id="TelefonEditaPublicacions'.$row["IdPublicacions"].'" class="fuenteContingut"  value="'.$row["Telefon"].'" style="width:100%;"></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="text" id="EmailEditaPublicacions'.$row["IdPublicacions"].'" class="fuenteContingut"  value="'.$row["Email"].'" style="width:100%;"></a></td>
		</tr>
		<tr>
			<td style="padding-bottom:10px">Substituir imatge:</td>
			<td style="padding-bottom:10px">
	           	<form  ENCTYPE="multipart/form-data" id="FormPujaEditaIMGPublicacions'.$row["IdPublicacions"].'" name="FormPujaEditaIMGPublicacions'.$row["IdPublicacions"].'" method="post" action="PHP/UploadFiles.php?op=1" target="IframePujaEditaIMGPublicacions'.$row["IdPublicacions"].'">
		            <input type="file" id="ImatgeEditaPublicacions'.$row["IdPublicacions"].'" name="ImatgeEditaPublicacions'.$row["IdPublicacions"].'" class="fuenteContingut" />
               	</form>
                <iframe name="IframePujaEditaIMGPublicacions'.$row["IdPublicacions"].'" style="display:none"></iframe> 
			</td>
		</tr>
		<tr>
			<td colspan="3" align="right">
				<button class="fuenteContingut" onclick="PublicacionsUpdate('.$row["IdPublicacions"].')">Guardar els canvis al registre</button><button class="fuenteContingut" onclick="MostraPublicacionsDelete('.$row["IdPublicacions"].')">Elimina registre</button>
			</td>
		</tr>
		<tr>
			<td colspan="3" style="padding-bottom:20px; border-top:1px solid #ddd;">
		<tr>			
		';
	}
	
	echo'
		</table>
	';
}
?>