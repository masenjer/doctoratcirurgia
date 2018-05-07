<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");


$SQL = "Select * FROM IMGHome ORDER BY Orden ASC ";
if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


$mida = 0;

 while ($row = $result->fetch_assoc())
{
	$mida ++;
	
	$fila=getimagesize("../../IMGHomeDin/".$row["IdIMGHome"].$row["Ruta"]); 

	$anchura=$fila[0]; 
	$altura=$fila[1]; 

	if ($anchura<$altura) 
	{ 
		$AoA= 'height';
	} 
	else 
	{ 
		$AoA= 'width';
	} 
	
	echo $row["IdIMGHome"].$row["Ruta"]."?#?".$AoA."*#*";	 
}

echo '|'.$mida; 
?>