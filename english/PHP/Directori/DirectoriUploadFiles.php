<?php

error_reporting(E_ALL);

$destino = $_SERVER['DOCUMENT_ROOT']."/IMGDirectori"; 
$nom = $_GET["nom"];
$id = $_GET["id"];

if ($id != "no") move_uploaded_file ( $_FILES [ 'ImatgeEditaDirectori'.$id ][ 'tmp_name' ], $destino . '/' . $nom); 
else move_uploaded_file ( $_FILES [ 'ImatgeNewDirectori' ][ 'tmp_name' ], $destino . '/' . $nom); 

//echo $_FILES [ 'Imatge' ][ 'name' ];

echo  "Fichero subido correctamente";

echo $destino . '/' . $nom;
?> 




