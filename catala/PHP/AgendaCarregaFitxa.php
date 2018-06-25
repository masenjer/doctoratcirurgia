<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");

$id = mysqli_real_escape_string($mysqli,$_GET["id"]);

$SQL = "SELECT * FROM Agenda WHERE IdAgenda = ".$id;
if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


 while ($row = $result->fetch_assoc())
{
	$array = array(
		'id' => $row["IdAgenda"],
		'Fecha' => $row["Fecha"],
		'Hora' => $row["Hora"],
		'Ubicacio' => $row["Ubicacio"],
		'Descripcio' => $row["Descripcio"],
		'Enllac' => $row["Enllac"],
	);
}

 

echo json_encode($array);

?>