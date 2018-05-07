<?php
function MostraFormulariInscripcions()
{
?>
<div id="DIVFormulariInscripcions" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(/img/NegroTrans.png); display:none;" >
<table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0">
	<tr valign="middle">
    	<td align="center">
            <table cellpadding="0" cellspacing="0" border="0" align="center">
                <tr>
                    <td width="11px" background="/img/MarcSupEsq.png"></td>
                    <td height="11px" background="/img/MarcSupC.png"></td>
                    <td width="11px" background="/img/MarcSupDret.png"></td>
                </tr>
                <tr>
                    <td width="11px" background="/img/MarcCEsq.png"></td>
                    <td width="522px" height="400px" bgcolor="#FFFFFF" align="center">
                    	<?php CarregaDIVFormulariIncripcions(); ?>
                    </td>
                    <td width="11px" background="/img/MarcCDret.png"></td>
                </tr>
                <tr>
                    <td width="11px" background="/img/MarcInfEsq.png"></td>
                    <td height="10px" background="/img/MarcInfC.png"></td>
                    <td width="11px" background="/img/MarcInfDret.png"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</div>
<?php
}

function CarregaDIVFormulariIncripcions()
{
?>
<table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
    	<td height="40px" background="/img/CapcaFormInsc.png"></td>
    </tr>
    <tr>
    	<td height="20px"></td>
    </tr>
    <tr>
    	<td align="center"><?php TextForm(); ?></td>
    </tr>
    <tr>
    	<td height="20px"></td>
    </tr>
    <tr>
    	<td align="center"><?php MostraFormInsc(); ?></td>
    </tr>
    <tr>
    	<td height="20px"></td>
    </tr>
    <tr>
    	<td align="right"> 
        	<input type="button" value="Cancelar" onClick="TancaFormInsc();" class="fuenteGestionNoticia">&nbsp;&nbsp;&nbsp;
        </td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
</table>
<?php  
}

function MostraFormInsc()
{
?>
<table  cellspacing="2" cellpadding="0" border="0" background="/img/FormInscCuadre.png">
	<tr>
    	<td height="15px"></td>
    </tr>
    <tr>
    	<td width="15px"></td>
    	<td align="right">Nom i Cognoms:</td>
        <td><input type="text" id="FINiu"  class="fuenteGestionNoticia" style="width:210px"/></td>
    	<td width="15px"></td>
    </tr>
    <tr>
    	<td width="15px"></td>
    	<td align="right">NIF:</td>
        <td><input type="text" id="FINIF"  class="fuenteGestionNoticia" style="width:210px"/></td>
    	<td width="15px"></td>
    </tr>
    <tr>
    	<td width="15px"></td>
    	<td align="right">Adre&ccedil;a:</td>
        <td><input type="text" id="FINiu"  class="fuenteGestionNoticia" style="width:210px"/></td>
    	<td width="15px"></td>
    </tr>
    <tr>
    	<td width="15px"></td>
    	<td align="right">Tel&egrave;fon personal: </td>
        <td ><input type="text" id="FINiu"  class="fuenteGestionNoticia" style="width:210px"/></td>
    	<td width="15px"></td>
    </tr>
    <tr>
    	<td width="15px"></td>
    	<td align="right">Tel&egrave;fon lloc de treball:</td>
        <td><input type="text" id="FINiu"  class="fuenteGestionNoticia" style="width:210px"/></td>
    	<td width="15px"></td>
    </tr>
    <tr>
    	<td width="15px"></td>
    	<td align="right">Email lloc de treball:</td>
        <td ><input type="text" id="FINiu"  class="fuenteGestionNoticia" style="width:210px"/></td>
    	<td width="15px"></td>
    </tr>
    <tr>
    	<td width="15px"></td>
    	<td align="right">N&uacute;m. Inscripci&oacute; Seg. Social:</td>
        <td><input type="text" id="FINiu"  class="fuenteGestionNoticia" style="width:210px"/></td>
    	<td width="15px"></td>
    </tr>
    <tr>
    	<td width="15px"></td>
    	<td align="right">Data de naixement:</td>
        <td><input type="text" id="FINiu"  class="fuenteGestionNoticia" style="width:210px"/></td>
    	<td width="15px"></td>
    </tr>
    <tr>
    	<td width="15px"></td>
    	<td align="right">Lloc de treball:</td>
        <td><input type="text" id="FINiu"  class="fuenteGestionNoticia" style="width:210px"/></td>
    	<td width="15px"></td>
    </tr>
    <tr>
    	<td width="15px"></td>
    	<td align="right">&Agrave;rea/Centre/Servei:</td>
        <td><input type="text" id="FINiu"  class="fuenteGestionNoticia" style="width:210px"/></td>
    	<td width="15px"></td>
    </tr>
    <tr>
    	<td width="15px"></td>
    	<td align="right">Categoria laboral o professional:</td>
        <td><input type="text" id="FINiu"  class="fuenteGestionNoticia" style="width:210px"/></td>
    	<td width="15px"></td>
    </tr>
    <tr>
    	<td width="15px"></td>
    	<td align="right">Data d'incorporaci&oacute; (aprox.) a la UAB:</td>
        <td><input type="text" id="FINiu"  class="fuenteGestionNoticia" style="width:210px"/></td>
    	<td width="15px"></td>
    </tr>
    
	<tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td colspan="5" align="right"><input type="button" id="ULLoginButton" value="Donar-me d'alta"  class="fuenteGestionNoticia" onclick="CreaNewUser();"/></td> 
    	<td width="15px"></td>
    </tr>
	<tr>
    	<td height="15px"></td>
    </tr>
</table>
<?php    
}

function TextForm()
{
?>
<table width="493px"  cellspacing="2" cellpadding="0" border="0" background="/img/CapcaCuadre.png">
	<tr>
    	<td height="15px"></td>
    </tr>
    <tr>
    	<td width="15px"></td>    	
    	<td style="text-align:justify"> Si voleu sol•licitar que se us faci un reconeixement m&egrave;dic laboral, cal que empleneu aquest formulari. Ens posarem en contacte amb vosaltres al m&eacute;s aviat possible. </td>    
    	<td width="15px"></td>
    </tr>
	<tr>
    	<td height="15px"></td>
    </tr>
</table>
<?php    
}
?>
