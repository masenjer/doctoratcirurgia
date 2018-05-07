<?php
function Pon($a){ 
  return $a;  
/*
  if(get_magic_quotes_gpc()){ 
    return $a; 
  }else{ 
    return addslashes($a); 
  }
  */ 
} 

function Quita($a){ 
  if(get_magic_quotes_gpc()){ 
    return stripslashes($a); 
  }else{ 
    return $a;    
  } 
}
?>