<?php
session_start();
//session_unregister();
//session_unset();
session_destroy(); 

$_SESSION["Creacio"] = "";
$_SESSION["Edicio"] = "";
$_SESSION["Noticias"] = "";
$_SESSION["Usuarios"] = "";


echo "1";
?>