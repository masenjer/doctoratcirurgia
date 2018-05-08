<?php
function CS()
{
	include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");	
	session_start();
	
	$c = explode("|",$_SESSION["dsalkdjfkaldjfkldasjfkadjfkjdasf"]);
	
	$SQL = "SELECT * FROM Users where IdUser = ".$c[0]. " AND P = '". $c[1]."'" ;
	//echo $SQL;
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli)); 
	while ($row = $result->fetch_assoc()){

		return true;	
	}
	
	$_SESSION["Creacio"] = "";
	$_SESSION["Edicio"] = "";
	$_SESSION["Noticias"] = "";
	$_SESSION["Usuarios"] = "";
	
	$_SESSION["dsalkdjfkaldjfkldasjfkadjfkjdasf"] = "";
	
	session_destroy();
	
	return false;
	
}
?>