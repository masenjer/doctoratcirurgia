<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php"); 
include("Fechas.php");

session_start();

$resultado = '
<table  cellpadding="0" cellspacing="2" border="0">
	<tr valign="top">
		
	';
	if ($_SESSION["Noticias"]=="1")
	{	
		$resultado = $resultado.'<td align="right" height="25px"><button class="EditButton" onClick="AbreGestorNoticias();"></td>';
	}
	$resultado = $resultado.'</tr>
	
</table>
<table  cellpadding="0" cellspacing="3" border="0">';

$today = trim(date("Y-m-d"));

//$SQL = "SELECT * FROM Noticias WHERE FechaPub <= '$today' and FechaDesPub > '$today' ORDER BY IdNoticia DESC";

$SQL = "SELECT * FROM Noticias WHERE Rang is not NULL AND IdSite = ".$_SESSION["IdSite"]." ORDER BY Rang ASC LIMIT 1";
if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


 while ($row = $result->fetch_assoc())
{
//	if (CompruebaSiPublicado($row["FechaPub"],$row["FechaDesPub"]) == 1)
//	{
	if ($row["NOU"] == "1") $NOU = '<img src="/img/NOU.gif" style="padding-left:10px" />';
	else $NOU = "";
	
	$resultado = $resultado . '
		<tr valign="top">
			<td>
				<table  cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td class="fuenteTitolContingut"><b>'.Quita($row["Titol"]).'</b>'.$NOU.'</td>
					</tr>
					<tr>
						<td class="LinNoticia"><em>['.SelectFecha($row["FechaNot"]).']</em></td>
					</tr>
					<tr>
						<td class="LinNoticia">'.Quita($row["Cos"]).'</td>
					</tr>
					
					
				</table>
			</td>
		</tr>
		<tr><td height="10px"></td></tr>
		';	
//	}
}

 

$resultado = $resultado . '</table>';

echo $resultado;
?>

<?php
function CompruebaSiPublicado($P,$D)
{
	$dia = date("d");
	$mes = date("m");
	$ano = date("Y");
	
	$dp = substr($P,0,2);
	$dd = substr($D,0,2);
	
	$mp = substr($P,3,2);
	$md = substr($D,3,2);
	
	$ap = substr($P,6,4);
	$ad = substr($D,6,4);
	
	if(($ano >= $ap )&&($ano <= $ad))
	{
		if(($mes >= $mp )&&($mes <= $md))
		{
			if(($dia >= $dp )&&($dia <= $dd))
			{
				return 1;
			}
		}
	}
	
	return 0;
}
?>