<?php

error_reporting (5); 
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php"); 

ini_set('session.cache_expire',3);
ini_set("session.gc_maxlifetime",3);
session_start();

switch ($_SESSION["IdSite"]){
	case 0: $idioma = "_ca";
			break;
	case 1: $idioma = "_es";
			break;
	case 2: $idioma = "_en";
			break;					
}

$SQL = "SELECT * FROM DirectoriCategoria order by Orden";
if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


$resultado = '
<table width="100%" cellspacing="0" cellpadding="0" border="0"  style="border-style:solid;border-width:1px;border-color:#dddddd">
	<tr>
		<td>
			<table width="100%" cellpadding="0" cellspacing="0" border="0">
				<tr valign="top">
					<td id="fuenteTitolML" width="5px" class="fuenteTitolML"></td>
					<td id="fuenteTitolML" align="left" valign="middle" height="35px" class="fuenteTitolML"> Categories </td>
					<td id="fuenteTitolML" width="5px" class="fuenteTitolML" ></td>
				</tr>
				
			</table>
			<table width="100%"  cellpadding="0" cellspacing="0" border="0" class="fuenteML" id="fuenteML">
	
	<tr valign="middle">
		<td width="5px"></td>
		<td class="fuenteML" style="padding-top:10px; text-align:left;" height="25px">
			<a href = "Directori.php" style="text-decoration:none;" class="fuenteML"><div style="text-decoration:none;">Tots els registres</div></a>
		</td>
		<td width="5px"></td>
	</tr>';
			


 while ($row = $result->fetch_assoc())
{
	
	$resultado = $resultado . '
	<tr valign="middle">
		<td width="5px"><input type="hidden" id="tdMenuCategoriaDirectoriAntic'.$row["IdDirectoriCategoria"].'" value="'.$row["Titol"].$idioma.'"></td>';
		
	
	$resultado = $resultado . '
		<td id="tdMenuCategoriaDirectori'.$row["IdDirectoriCategoria"].'" align="left" height="25px" class="fuenteML" style="padding-top:10px;">
			<a href = "Directori.php?Categoria='.$row["IdDirectoriCategoria"].'" style="text-decoration:none;" class="fuenteML"><div id="DIVTitolCategoriaDirectori'.$row["IdDirectoriCategoria"].'"style="text-decoration:none;">'.$row["Titol".$idioma].'</div></a>
		</td>';
	
	
	$resultado = $resultado . '
		<td width="5px"></td>';
		
	if ($_SESSION["Creacio"]=="1")
	{
		$resultado = $resultado . '<td align="right" width="42px">
			<table cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td><button class="EditButton" onClick="EditaTitolCategoriaDirectori('.$row["IdDirectoriCategoria"].')"/></td>
					<td rowspan="2">
						<input class="OrdenML" type="text" id="OrdenCategoriaDirectori'.$row["IdDirectoriCategoria"].'" value="'.$row["Orden"].'"  onKeyPress="submitenter(13,event,'.$row["IdDirectoriCategoria"].')"></td>						
				</tr>
				<tr>
					<td><button class="LinMenuDeleteButton" onClick="MostraEliminaTOT(12,0,'.$row["IdDirectoriCategoria"].');"/></td>
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
				<img id="ImageML" src="/img/TitolButton.jpg" onClick="NovaCategoriaDirectoriTitol()" title="Nou T&iacute;tol"><img id="ImageML" src="/img/plus.jpg" onClick="NovaCategoriaDirectori()" title="Nova Categoria">
			</td>
		</tr>';
		
}

$resultado = $resultado . 
		'	
		<tr>
			<td height="20px"></td>
		</tr>

	</table>
		</td>
	</tr>
</table>
';
echo $resultado;
?>

