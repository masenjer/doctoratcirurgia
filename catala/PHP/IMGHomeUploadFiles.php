<?php

error_reporting(E_ALL);

$destino = $_SERVER['DOCUMENT_ROOT']."/IMGHomeDin";  
$nom = $_GET["nom"];

if (is_dir($destino) && is_writable($destino)) {
	move_uploaded_file ( $_FILES [ 'NewIMGHomeName' ][ 'tmp_name' ], $destino . '/' . $nom); 
} else {
    echo 'Upload directory is not writable, or does not exist.';
}


//echo $_FILES [ 'Imatge' ][ 'name' ];

echo  "Fichero subido correctamente";

echo $destino . '/' . $nom;
?> 




