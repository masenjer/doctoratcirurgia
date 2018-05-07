<?php
function ComptadorResultatsPublicacions($cond, $tipus)
{
	include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php"); 
	
	switch ($tipus)
	{
		case "0":
		case "1":	$tipus = " AND Tipus = ".$tipus;
					break;
		
		default:	$tipus = "";
					break;						
	}	
		
	$SQL = "SELECT COUNT(*) AS Cuenta FROM Publicacions WHERE ".$cond.$tipus;	
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));

	
	 while ($row = $result->fetch_assoc())
	{
		echo '<span class="fuenteTitolContingut">'.$row["Cuenta"].'</span><span class="fuenteContingut"> Registres relacionats amb la cerca</span>';	
	}
	
}
?>