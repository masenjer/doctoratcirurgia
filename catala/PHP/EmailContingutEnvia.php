<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php"); 

//////:id, :op, :nom, :origen, :desti

$id = mysqli_real_escape_string($mysqli,$_POST["id"]);
$op = mysqli_real_escape_string($mysqli,$_POST["op"]);

switch($op)
{
	case 1: 	$SQL = "SELECT Titol,Contingut, IdCapMenu FROM LinMenu WHERE IdLinMenu = " . $id;
				break;
	case 2: 	$SQL = "SELECT Titol,Contingut, IdCapMenu FROM LinMD WHERE  IdLinMD = " . $id;
				break;

}

/////Primero compruebo que no se trate de un nodo padre

if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


 while ($row = $result->fetch_assoc())
{
	$Titol = $row["Titol"];
	$Titol = Quita($Titol);
	
	$Contingut = $row["Contingut"];
	$Contingut = str_replace('src="../Images', 'src="http://inc.uab.cat/Images', $Contingut);
}

$nom = mysqli_real_escape_string($mysqli,$_POST["nom"]);
$origen = mysqli_real_escape_string($mysqli,$_POST["origen"]);
$desti = mysqli_real_escape_string($mysqli,$_POST["desti"]);
$TA = mysqli_real_escape_string($mysqli,$_POST["TA"]);

$mensaje = '
<html>
<body>
<p><font face="verdana" size="1">Mail enviat per '.$nom.'</font></p>
<p>'.$TA.'</p>
<table border="0">
  <tr>
    <td><font face="verdana" size="1"><strong>'.$Titol.'</strong></font></td>
  </tr>
  <tr>
    <td><font face="verdana" size="1">'.$Contingut.'</font></td>
  </tr>
  <tr>
  	<td height="20px"></td>
  <tr>
  <tr>
  	<td align="left"><a href="http://inc.uab.cat/#'.$id.'_'.$op.'">Per a m&eacute;s informaci&oacute; feu clic aquí</a></td>
  </tr>
</table>
</body>
</html>';



$asunto = 'En '.$nom.' vol compartir amb tu una informació sobre l\'Intitut de Neurociències';

$sheader="From:".$origen ."\nReply-To:".$desti."\n";
$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n";
$sheader=$sheader."Mime-Version: 1.0\n";
$sheader=$sheader."Content-Type: text/html;  charset=utf-8";

mail($desti,$asunto,$mensaje,$sheader);

echo $mensaje;//"Email enviat correctament";

?>