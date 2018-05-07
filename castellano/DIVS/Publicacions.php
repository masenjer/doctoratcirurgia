<?php
function MostraPublicacions()
{
?>
<div id="Publicacions" style="display:none;">
    <table width="890px" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF" >
      <tr valign="top">
          <td width="13px"></td>
          <td align="left" style="padding-top:30px;"><?php MostraEstructuraPublicacions(); ?></td> <!--espacio para la columna izquierda --> 
          <td width="10px"></td>
          <td width="190px" height="100%"><?php MostraColumnaDreta(); ?> </td><!--espacio para la columna derecha -->
          <td width="10px"></td> 
      </tr>
  </table>
</div>
<?php
}

function MostraEstructuraPublicacions()
{
?>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
    	<td colspan="2" class="fuenteTitolContingut" style="padding-bottom:20px;">
        	En construcci&oacute;, disculpeu les mol&egrave;sties!
        </td>
    </tr>    
    <tr>
    	<td colspan="2"><?php MostraCercadorPublicacions(); ?></td>
    </tr>
    <tr>
    	<td><div id="ComptadorResultatsPublicacions"></div></td>
        <td align="right" width="10px">
        	<div id="ButtonAddPublicacions" style="padding-top:11px; display:none;">
        		<input type="button" id="NewPublicacionsButton" class="ButtonPlus" onclick="MostraNouPublicacions();" />
            </div>
        </td>
    </tr>
    <tr>
    	<td colspan="2" style="padding-top:10px; padding-bottom:30px;"><?php NewPublicacions(); ?></td>
    </tr>
    <tr>
    	<td colspan="2" align="center"><div id="ResultatsPublicacions"></div></td>
    </tr>
</table>
<?php
}

function MostraCercadorPublicacions()
{
?>
<table width="100%" cellpadding="0" cellspacing="0" class="RecuadreCercadorAuxiliar">
	<tr>
    	<td class="fuenteTitolContingut">Publicacions:</td>
        <td class="fuenteContingut">Introdueix l'autor, t&iacute;tol, any i/o l&iacute;nies de recerca per realitzar la cerca</td>
    </tr>
    <tr>
    	<td colspan="2" style="padding-top:5px;"><input type="text" id="CercadorPublicacions" class="TextBoxCercadorCpC" onkeyup="PublicacionsCercador();" /></td>
    </tr>
    <tr>
    	<td colspan="2" class="fuenteContingut">
        	<input type="radio" id="RadioCercaPublicacions" name="RadioCercaPublicacions" class="fuenteContingut" value="" onchange="PublicacionsCercador()" checked="checked" />Tots
        	<input type="radio" id="RadioCercaPublicacions0" name="RadioCercaPublicacions" class="fuenteContingut" value="0" onchange="PublicacionsCercador()" />Articles
        	<input type="radio" id="RadioCercaPublicacions1" name="RadioCercaPublicacions" class="fuenteContingut" value="1" onchange="PublicacionsCercador()" />Llibres
        </td>
    </tr>
</table>
<?php
}

function NewPublicacions()
{
?>
<div id="DIVNewPublicacions" style="display:none;">
	<table width="100%" cellpadding="4" cellspacing="0" style="border:1px solid #ddd; padding:10px;" class="fuenteContingut">
    	<tr>
            <td width="50px">Tipus</td>
            <td>
                <select type="text" id="TipusNewPublicacions" class="fuenteContingut"  style="width:100px;">					
                    <option value="0">Article</option>
                    <option value="1">Llibre</option>
                </select>                            
            </td>            <td width="50px">Autor</td>
            <td style="padding-right:20px;"><input type="text" id="AutorNewPublicacions" class="fuenteContingut" style="width:100%;" /></td>
        	<td width="50px">T&iacute;tol</td>
            <td><input type="text" id="TitolNewPublicacions" class="fuenteContingut" style="width:100%;" /></td>
        </tr>
    	<tr>
            <td width="50px">Any</td>
            <td style="padding-right:20px;"><input type="text" id="AnyNewPublicacions" class="fuenteContingut" style="width:80px;" /></td>
        	<td>L&iacute;nies</td>
            <td style="padding-right:20px;"><input type="text" id="LiniesNewPublicacions" class="fuenteContingut" style="width:100%;" /></td>
            <td>Revista</td>
            <td><input type="text" id="RevistaNewPublicacions" class="fuenteContingut" style="width:100%;" /></td>
       </tr>     
       <tr>
            <td colspan="6" align="right">
            	<input type="button" value="Cancelar" onclick="TancaNouPublicacions();" />
                <input type="button" value="Aceptar" onclick="AddNewPublicacions();" />
            </td>
        </tr>
    </table>
</div>
<?php
}

?>