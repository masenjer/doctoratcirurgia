<?php
$name = $_GET["name"];
$destino = "../DocsDROW/";

move_uploaded_file ( $_FILES [ 'Imatge' ][ 'tmp_name' ], $destino . '/' . $name); 

//echo $_FILES [ 'Imatge' ][ 'name' ];

echo  "Fichero subido correctamente";

?> 




