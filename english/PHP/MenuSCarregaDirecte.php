<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");

ini_set("session.gc_maxlifetime",3);
ini_set('session.cache_expire',3);
session_start();

$cuenta = 1;

$SQL = "SELECT * FROM CapMenu WHERE IdSite = ".$_SESSION["IdSite"]." order by Orden";
if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));



 while ($row = $result->fetch_assoc())
{
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////   Busco si hay una cual es la primera página de LinMenu para direccionar en href,
////////////////   si está vacío pongo direccion al propio menú

$direccion = "";

$SQL2 = "SELECT * FROM LinMenu WHERE IdCapMenu = ".$row["IdCapMenu"]." and tipus = 1 order by Orden ASC LIMIT 1";
if (!$result2 = $mysqli->query($SQL2))printf("Errormessage: %s\n", mysqli_error($mysqli)); 

while ($row2 = $result2->fetch_assoc())
{
	$direccion = '#!/'.$row2["Titol"].'_'.$row2["IdLinMenu"].'_1';
}

if (!$direccion) $direccion = '#!/MS_'.$row["IdCapMenu"];
 


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	echo  '
	
		<li class="dropdown">
			<input type="hidden" id="tdMSAntic'.$row["IdCapMenu"].'" value="'.$row["Titol"].'">
		';
		
	echo  '  
		
		<div id="tdMS'.$row["IdCapMenu"].'">
			<a href="'.$direccion.'">
				<div id="DIVTitolMS'.$row["IdCapMenu"].'" class="DIVMenuS">'.$row["Titol"].'</div>
			</a>
		</div>	
			

		';	
	
	if ($_SESSION["Creacio"]=="1")
	{
		echo '

			<div class="row eines">
				
				<div class="col-md-4">	
					<h3><span class="glyphicon glyphicon-edit" aria-hidden="true" 	onClick="EditaTitolMS('.$row["IdCapMenu"].')"></span>
					</h3>		
				</div>
				<div class="col-md-4">	
					<h3><span class="glyphicon glyphicon-remove-sign" aria-hidden="true" 	onClick="MostraEliminaTOT(0,'.$row["IdCapMenu"].');"></span>
					</h3>		
				</div>
				
				<div class="col-md-4">	
					<input class="OrdenML" type="text"  id="OrdenMS'.$row["IdCapMenu"].'" value="'.$row["Orden"].'"  style="vertical-align:bottom" onKeyPress="submitenter(6,event,'.$row["IdCapMenu"].')">
				</div>
			</div>
	
			
		';

	}
	
	echo '		</li>';

/////////////////////////////////////////////////////////////////////////////////////////////////
/* 
	if ($_SESSION["Creacio"]=="1")
	{
		$DobleClic = 'ondblclick="EditaTitolMS('.$row["IdCapMenu"].')"';	
		
		$delete = '<td align="left" width="19px"><input type="text" style="height:21px;width:21px;vertical-align:middle;" id="OrdenMS'.$row["IdCapMenu"].'" value="'.$row["Orden"].'"  onKeyPress="submitenter(6,event,'.$row["IdCapMenu"].')"><img id="ImageMS" src="/img/delete.jpg" onClick="MostraEliminaTOT(0,'.$row["IdCapMenu"].');"  style="vertical-align:middle; height: 24px;"></td>';
		$stilo = 'style="background-image:URL(/img/CapcaRelleu2.png);"';
	}
	else
	{
		$stilo = 'style="background-image:URL(/img/CapcaRelleu2.png);"';	
	}

	echo  '
		<td bgcolor="#333333" class="ButtonMS" '.$stilo.'  height="28px" id="tdMS'.$row["IdCapMenu"].'"  align="left">
			<a href="#!/MS_'.$row["IdCapMenu"].'" '.$DobleClic.'>
			<input type="hidden" id="tdMSAntic'.$row["IdCapMenu"].'" value="'.$row["Titol"].'">
			<div id="DIVTitolMS'.$row["IdCapMenu"].'" class="DIVMenuS">'.$row["Titol"].'</div></a></td>
			
		
		'.$delete.'
		<td width="2px"></td>
';
*/
}

 



		
		




/*///Botó del publicacions	
		echo  '
		<td bgcolor="#333333" class="ButtonMS" '.$stilo.'  height="28px" id="tdMSPublicacions" onClick="MostraPublicacions();" align="left">
			<div id="DIVTitolMSPublicacions" class="DIVMenuS">Publicacions</div>
		</td>
		<td width="2px"></td>

';
*/

/////////////////////////////////////////////////////Boton nou MS i GU



		
if ($_SESSION["Creacio"]=="1")
{
	echo 	'
		<li><h3><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"  onclick="NovaMS();"></span></h3></li>';
}

if ($_SESSION["Usuarios"]=="1")
{
	//echo 	'<li><h3><span class="glyphicon glyphicon-user" aria-hidden="true"  onclick="MostraGestioGU();"></span></h3></li>';
}

echo '<input type="hidden" id="CuentaMS" value="'.$cuenta.'">';
	

/////////////////////////////////////////////////////Boton nou MS i GU	



?>