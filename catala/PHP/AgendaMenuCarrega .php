<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php"); 
session_start();

$SQL = "SELECT IdAgenda, Titol, Orden FROM Agenda WHERE IdSite =".$_SESSION["IdSite"]."  order by Orden ASC";
if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


$resultado = '
<table width="100%"  cellpadding="0" cellspacing="0" border="0" class="fuenteLinNoticia">';

 while ($row = $result->fetch_assoc())
{
	$resultado = $resultado . '
	<tr valign="middle">
		<td width="15px"><input type="text" id="OrdreEnDir'.$row["IdAgenda"].'"  style="width:15px; height:34px; vertical-align:middle;" value="'.$row["Orden"].'"  onKeyPress="submitenter(10,event,'.$row["IdAgenda"].')"></td>
		<td height="40px" id="MenuEnDir'.$row["IdAgenda"].'" onClick="CargaEnDirFitxa('.$row["IdAgenda"].')" background="/img/LinHistoricoNoticias.png" align="center">						
			'.$row["Titol"].'
		</td>		
	</tr>';
}

 

$resultado = $resultado . '	
</table>';

echo $resultado;
?>
