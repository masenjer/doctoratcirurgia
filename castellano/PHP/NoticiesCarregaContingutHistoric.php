<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php"); 
include("Fechas.php");

session_start();

$resultado = '<table width="100%" cellpadding="0" cellspacing="0" border="0">';

$today = trim(date("Y-m-d"));

//$SQL = "SELECT * FROM Noticias WHERE FechaPub <= '$today' and FechaDesPub > '$today' ORDER BY IdNoticia DESC";

$SQL = "SELECT * FROM Noticias WHERE IdSite = ".$_SESSION["IdSite"]." AND Rang is NOT NULL ORDER BY Rang ASC";
if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


$i=0;

$primera = true;

 while ($row = $result->fetch_assoc())
{
//	if (CompruebaSiPublicado($row["FechaPub"],$row["FechaDesPub"]) == 1)
//	{
	if (!$primera)
	{
		$i%=2;
		
		if ($row["NOU"] == "1") $NOU = '<img src="/img/NOU.gif" style="padding-left:10px" />';
		else $NOU = "";
		
		$obre = "";
		$tanca = "";
		$padding = "";
		
		if ($i==0) $obre = '<tr valign="top">';
		else
		{
			$tanca = '</tr>';
			$padding = ' padding-left:20px; ';
		}
		
		$resultado = $resultado . $obre . '
				<td style="padding-top:30px; padding-bottom:20px; border-top:1px #ddd solid; '.$padding.'" width="50%">
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
				</td>'.$tanca;	
		
		$i++;	
	
	}
	else $primera = false;
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