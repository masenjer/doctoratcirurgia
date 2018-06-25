<?php
session_start();

$op = $_GET["op"];


switch ($op)
{
	case 1: $destino = $_SERVER['DOCUMENT_ROOT']."/Images/"; 
			break;	
					
	case 2: $destino = $_SERVER['DOCUMENT_ROOT']."/imgNot/".$_SESSION["IdSite"]."/"; 
			break;	
					
	case 3: $destino = $_SERVER['DOCUMENT_ROOT']."/ImgDes/"; 
			break;	
					
	case 4: $destino = $_SERVER['DOCUMENT_ROOT']."/Documents/"; 
			break;	
					
	case 5: $destino = "../DocsDROW/"; 
			break;	
					
}

if ($op == 1) move_uploaded_file ( $_FILES [ 'upload' ][ 'tmp_name' ], $destino . '/' . $_FILES [ 'upload' ][ 'name' ]); 
else move_uploaded_file ( $_FILES [ 'Imatge' ][ 'tmp_name' ], $destino . '/' . $_FILES [ 'Imatge' ][ 'name' ]); 

//echo $_FILES [ 'Imatge' ][ 'name' ];

echo  "Fichero subido correctamente";

?> 




