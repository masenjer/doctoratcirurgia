<?php
include("../rao/graal_con.php"); 

$SQL = "SELECT * FROM CapMenu";
if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


 while ($row = $result->fetch_assoc())
{
		echo $row["Titol"];
}

 

echo "joder";
?>