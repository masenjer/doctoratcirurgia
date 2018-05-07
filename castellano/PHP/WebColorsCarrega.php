<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
 


$SQL = "SELECT * FROM Web ";
if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));

 
 while ($row = $result->fetch_assoc()){
	echo $row["WebColor"]."|".$row["ButtonsColor"];
}

 

?>
