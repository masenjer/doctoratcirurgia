<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php"); 
session_start();

$SQL = "SELECT IdAgenda, Fecha, DATE_FORMAT(Hora, '%k:%i') as Hora, Descripcio FROM Agenda WHERE IdSite =".$_SESSION["IdSite"]."  order by Fecha desc , Hora desc";
if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


$hoy = date("Y-m-d");


while ($row = $result->fetch_assoc())
{
	$clase = (strtotime($hoy) <= strtotime($row["Fecha"]))? "LightGreen ":"LightCoral ";
	

	$resultado = $resultado . '

	<tr valign="middle">	
		<td height="40px" id="MenuAgenda'.$row["IdAgenda"].'"  align="center" style="background:'.$clase.'; cursor:pointer;border-bottom:1px solid #555; padding:5px;"  onClick="CargaAgendaFitxa('.$row["IdAgenda"].')">						
			<b>'.$row["Fecha"].' '.$row["Hora"].':</b> '.$row["Descripcio"].'
		</td>		 
	</tr>

	';
}

 


echo $resultado;
?>
