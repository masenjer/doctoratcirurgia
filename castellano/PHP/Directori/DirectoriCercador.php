<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php"); 
include("DirectoriCercadorPrivat.php"); 
include("DirectoriCercadorPublic.php"); 
include("DirectoriComptadorResultats.php"); 
include("CategoriaDirectoriCargaSelect.php"); 

session_start();

$Conn = "/rao/rao_con.php";

$text = Pon(mysqli_real_escape_string($mysqli,$_POST["txt"]));

$idC = Pon(mysqli_real_escape_string($mysqli,$_POST["idC"]));
//if (!$idC) $idC = '';

$txt = explode(" ",$text);

if ($_SESSION["Edicio"]=="1") echo MostraDirectoriPrivat($txt,$Conn, $idC);
else if ($text)echo MostraDirectoriPublic($txt,$Conn, $idC);

//if ($text)MostraDirectoriPublic($txt);

?>