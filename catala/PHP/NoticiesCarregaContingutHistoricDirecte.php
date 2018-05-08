<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");

session_start();



$today = trim(date("Y-m-d"));

//$SQL = "SELECT * FROM Noticias WHERE FechaPub <= '$today' and FechaDesPub > '$today' ORDER BY IdNoticia DESC";

$SQL = "SELECT * FROM Noticias WHERE IdSite = ".$_SESSION["IdSite"]." AND Rang is NOT NULL ORDER BY Rang ASC";
if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


$primera = true;

 while ($row = $result->fetch_assoc())
{
//	if (CompruebaSiPublicado($row["FechaPub"],$row["FechaDesPub"]) == 1)
//	{
	if (!$primera)
	{
		
		
		if ($row["NOU"] == "1") $NOU = '<img src="/img/NOU.gif" style="padding-left:10px" />';
		else $NOU = "";
		
		
		
		
		
		$resultado = $resultado .  '
		<div class="col-sm-12 col-md-6">
		<article class="post">
			<h3>'.Quita($row["Titol"]).'</h3>
			'.Quita($row["Cos"]).'
		</article>	
		</div>';
				
	
	}

	
}

 



echo $resultado;
?>
