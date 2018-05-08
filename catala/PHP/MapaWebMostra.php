<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php"); 

session_start();

$SQL = "SELECT IdCapMenu, Titol FROM CapMenu WHERE IdSite = ".$_SESSION["IdSite"];
if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


$primer = true;
$border_left = "";

$numRows = $result->num_rows;

$num_cols = 12/$numRows;

echo '
	<ul>';

 while ($row = $result->fetch_assoc())
{

	$direccion = "";

	$SQL2 = "SELECT * FROM LinMenu WHERE IdCapMenu = ".$row["IdCapMenu"]." and tipus = 1 order by Orden ASC LIMIT 1";
	if (!$result2 = $mysqli->query($SQL2))printf("Errormessage: %s\n", mysqli_error($mysqli)); 

	while ($row2 = $result2->fetch_assoc())
	{
		$direccion = '#!/'.$row2["Titol"].'_'.$row2["IdLinMenu"].'_1';
	}

	if (!$direccion) $direccion = '#!/MS_'.$row["IdCapMenu"];

	

	if(!$primer) $border_left = 'border-left'; 

	echo '
		<li class="col-md-15 '.$border_left.'">
			<a class="negreta" href="'.$direccion.'">'.$row["Titol"].'</a>

			<ul>';
				
				

	$SQL2 = "SELECT * FROM LinMenu WHERE IdCapMenu = ".$row["IdCapMenu"]." AND LinMenu.Tipus <>2 order by orden";
	if (!$result2 = $mysqli->query($SQL2))printf("Errormessage: %s\n", mysqli_error($mysqli)); 
	
	while ($row2 = $result2->fetch_assoc())
	{
		echo '
				<li>
					<a href="#!/'.$row2["Titol"].'_'.$row2["IdLinMenu"].'_1">'.$row2["Titol"].'</a>
					
				</li>
		';
	}


	echo '
			</ul>
		</li>
	';		
				
	$primer = false;
}

echo '</ul>';

 

?>
