<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php"); 

session_start();

if ($_SESSION["Usuarios"]){


////id:id,N:N,A:A,E:E,U:U,P:P,R1:R1,R2:R2,R3:R3,R4:R4

$N = mysqli_real_escape_string($mysqli,$_POST["N"]);
$N = Pon($N);
$A = mysqli_real_escape_string($mysqli,$_POST["A"]);
$A = Pon($A);
$E = mysqli_real_escape_string($mysqli,$_POST["E"]);
$U = mysqli_real_escape_string($mysqli,$_POST["U"]);
if ($_POST["P"]) $P = sha1(sha1(mysqli_real_escape_string($mysqli,$_POST["P"])));
$R1 = mysqli_real_escape_string($mysqli,$_POST["R1"]);
$R2 = mysqli_real_escape_string($mysqli,$_POST["R2"]);
$R3 = mysqli_real_escape_string($mysqli,$_POST["R3"]);
$R4 = mysqli_real_escape_string($mysqli,$_POST["R4"]);

$id = mysqli_real_escape_string($mysqli,$_POST["id"]);

if ($id == "")
{	
	$SQL = "INSERT INTO Users(Nom, Cognoms, Email, User, Password, Usuarios, Creacio, Edicio, Noticias) VALUES ('$N','$A','$E','$U','$P',$R1,$R2,$R3,$R4)";
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));

	
	$SQL2 = "SELECT IdUser FROM Users ORDER BY IdUser DESC LIMIT 1";
	if (!$result2 = $mysqli->query($SQL2))printf("Errormessage: %s\n", mysqli_error($mysqli)); 
	
	while ($row = $result2->fetch_assoc())
	{
		$id = $row["IdUser"]; 	
	}

}
else
{

	if ($P){
		$P = "Password = '".$P."',";
	}

	$SQL = "UPDATE Users SET 
				Nom = '$N',
				Cognoms = '$A', 
				Email = '$E', 
				User = '$U', 
				".$P."
				Usuarios = $R1,
				Creacio = $R2,
				Edicio = $R3,
				Noticias = $R4
				WHERE IdUser = $id";
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));

}

//echo $SQL;
}
?>