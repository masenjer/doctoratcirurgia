<?php

error_reporting (5); 
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php"); 

ini_set('session.cache_expire',3);
ini_set("session.gc_maxlifetime",3);
session_start();
	
if ($_SESSION["Creacio"]=="1")
{
	
	$idCap = mysqli_real_escape_string($mysqli,$_GET["n"]);
	
	
	$SQL = "SELECT * FROM LinMenu WHERE IdSite =".$_SESSION["IdSite"]." AND Tipus = 2  order by orden";
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));

	
	$resultado = '
	<table width="100%" cellpadding="0" cellspacing="0" border="0">
		<tr valign="top">
			<td id="fuenteTitolML" width="5px" class="fuenteTitolML" style="background-color:#aaa;"></td>
			<td id="fuenteTitolML" align="left" valign="middle" height="35px" class="fuenteTitolML" style="background-color:#aaa;">P&agrave;gines ocultes</td>
			<td id="fuenteTitolML" width="5px" class="fuenteTitolML" style="background-color:#aaa;" ></td>
		</tr>
		
	</table>
	<table width="100%"  cellpadding="0" cellspacing="0" border="0" class="fuenteMenuPageOculta" id="fuenteMenuPageOculta">';
	
	 while ($row = $result->fetch_assoc())
	{
		if ($_SESSION["Creacio"]=="1")
		{
			$DobleClic = 'ondblclick="EditaTitolLPage('.$row["IdLinMenu"].')"';	
		}
		
	$resultado = $resultado . '
	<tr valign="middle">
		<td width="5px">
			<input type="hidden" id="tdMEAntic'.$row["IdLinMenu"].'" value="'.$row["Titol"].'">
			<input type="hidden" id="tdMEhrefAntic'.$row["IdLinMenu"].'" value="'.$row["Titol"].'_'.$row["IdLinMenu"].'_1">
		</td>
		  
		<td id="tdME'.$row["IdLinMenu"].'" align="left"  height="25px" class="fuenteMenuPageOculta" style="padding-top:10px;">
			<a href = "#!/'.$row["Titol"].'_'.$row["IdLinMenu"].'_1" style="text-decoration:none;" class="fuenteML">
				<div id="DIVTitolLPage'.$row["IdLinMenu"].'">'.$row["Titol"].'</div>
			</a>
		</td>';
		
		
		$resultado = $resultado . '
			<td width="5px"></td>';
			
		if ($_SESSION["Creacio"]=="1")
		{
			$resultado = $resultado . '<td align="right" width="42px">

				<table cellpadding="0" cellspacing="0" border="0" style="margin-top:10px;">
					<tr>
						<td><button class="EditButton" onClick="EditaTitolLPage('.$row["IdLinMenu"].')"/></td>
						<td>
							<input class="OrdenML" type="text"  id="OrdenME'.$row["IdLinMenu"].'" value="'.$row["Orden"].'"  onKeyPress="submitenter(5,event,'.$row["IdLinMenu"].')"></td>						
					</tr>
					<tr>
						<td><button class="LinMenuDeleteButton" onClick="MostraEliminaTOT(1,'.$idCap.','.$row["IdLinMenu"].');"/></td>
						<td><button class="LinMenuHyperlinksButton" onClick="MostraVinclePaginaOculta('.$row["IdLinMenu"].');"/></td>
					</tr>
					<tr>
						<td>
							<div id="DIVVinclePaginaOculta'.$row["IdLinMenu"].'" style="position:absolute; display:none; padding:30px; background:#666;" onmouseout="AmagaVinclePaginaOculta('.$row["IdLinMenu"].');">
								#!/'.$row["Titol"].'_'.$row["IdLinMenu"].'_1
							</div>
						</td>
					</tr>					
				</table>

			</td>
		</tr>';
		}
	
	}
	
	 
	
	
			
	if ($_SESSION["Creacio"]=="1")
	{
		$resultado = $resultado . 
		'	<tr>
				<td height="8px"></td>
			</tr>
			<tr valign="bottom">
				<td colspan="5" align="right">
					<img id="ImageML" src="/img/plus.jpg" onClick="NovaPageOculta('.$idCap.',0)" title="Nova P&agrave;gina">
				</td>
			</tr>';
			
	}
	
	$resultado = $resultado . 
			'	
			<tr>
				<td height="20px"></td>
			</tr>
	
		</table>';
	echo $resultado;
}
?>

