<?php
session_start();
include("h.php");
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php"); 

//echo "p:".$_POST["data"];
$c = explode("|",$_POST["data"]);

$u = $c[0];
$DH = DH($c[1]);

//echo "DH:".$DH."<br>";

$a = explode("|",$DH);

//echo "p1:".$a[0].'<br>';
//echo "p2:".sha1($a[0]).'<br>';
//echo "p3:".sha1(sha1($a[0]));

sleep(3);

if (verifyTimedHash($a[1],$_SESSION["dsalkdjfkaldjfkldasjfkadjfkjdasf"],$a[0],5))
{
	$p = sha1($a[0]); 
	
	//echo $p;
	$aux = 0;
	
	$SQL = "SELECT * FROM Users where User = '".$u. "' AND Password = '". $p."'"; 
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));
	
	//echo $SQL;
	
	session_set_cookie_params(0, "/", $_SERVER["HTTP_HOST"], 0); 
	
	while ($row = $result->fetch_assoc())
	{
		$aux = 1;
		
		$_SESSION["Creacio"] = $row["Creacio"];
		$_SESSION["Edicio"] = $row["Edicio"];
		$_SESSION["Noticias"] = $row["Noticias"];
		$_SESSION["Usuarios"] = $row["Usuarios"];
		
		$SQL2 = "UPDATE Users SET P='".$_SESSION["dsalkdjfkaldjfkldasjfkadjfkjdasf"]."' WHERE IdUser = ".$row["IdUser"];
		if (!$result2 = $mysqli->query($SQL2))printf("Errormessage: %s\n", mysqli_error($mysqli));
		
		//echo $SQL2;
		
		$_SESSION["dsalkdjfkaldjfkldasjfkadjfkjdasf"] = $row["IdUser"]."|".$_SESSION["dsalkdjfkaldjfkldasjfkadjfkjdasf"];
	}
	
	// 
	
}

//	$_SESSION["Creacio"] = 1;
//	$_SESSION["Edicio"] = 1;
//	$_SESSION["Noticias"] = 1;
//	$_SESSION["Usuarios"] = 1;

echo $aux;

?>