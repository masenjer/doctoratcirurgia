<?php

session_start();
session_unset();
//session_destroy();

ini_set("session.gc_maxlifetime","3");
ini_set("session.cache_expire","3");
ini_set("session.cookie_lifetime","3");
ini_set("session.cache_expire","3");
ini_set("session.cache_expire","3");
ini_set("session.cache_expire","3");
ini_set("session.cache_expire","3");
echo "max:" . ini_get("session.gc_maxlifetime");

//$_SESSION["nnn"] = "mola";

echo "<br>Session: ".$_SESSION["nnn"];
echo "<br><br>max:" . ini_get("session.gc_maxlifetime");

echo "<br><br><br>".get_cfg_var("session.gc_maxlifetime");
?>