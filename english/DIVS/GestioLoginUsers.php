<?php
function MostraGestioLoginUsers()
{
?>
<div id="DIVGestioLoginUsers" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(/img/NegroTrans.png); display:none;" >
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
                    <td width="522px" height="400px" bgcolor="#FFFFFF">
                    	<?php CarregaDIVLoginUsers(); ?>
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

function CarregaDIVLoginUsers()
{
?>
<table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
    	<td height="40px" background="/img/CapcaFinestreta.png"></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr valign="top">
    	<td align="center"><?php MostraFitxaLoginUser(); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>

    <tr>
    	<td align="center"><?php MostraNewUser(); ?></td>
    </tr>
    <tr>
    	<td height="20px"></td>
    </tr>
    <tr>
    	<td align="right"> 
        	<input type="button" value="Cancelar" onClick="TancaLoginUsers();" class="fuenteGestionNoticia">&nbsp;&nbsp;&nbsp;
        </td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
</table>
<?php  
}

function MostraFitxaLoginUser()
{
?>
<table width="472px" cellspacing="0" cellpadding="0" border="0" background="/img/URCuadre.png">
	<tr>
    	<td height="15px"></td>
    </tr>
    <tr>
    	<td width="15px"></td>
    	<td colspan="5" align="left"><b> Acc&eacute;s Usuaris Registrats</b></td>
    </tr>
	<tr>
    	<td height="15px"></td>
    </tr>
    <tr>
    	<td width="15px"></td>
    	<td align="left" width="60px">Usuari:</td>
        <td width="180px"><input type="text" id="URUsuari" class="fuenteGestionNoticia" /></td>
    	<td align="left" width="70px">Pasword:</td>
        <td><input type="password" id="URPassword"  class="fuenteGestionNoticia"/></td>
    	<td width="15px"></td>
    </tr>
	<tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td colspan="5" align="right"><input type="button" id="URLoginButton" value="Accedir"  class="fuenteGestionNoticia"/></td>
    	<td width="15px"></td>
    </tr>
	<tr>
    	<td height="15px"></td>
    </tr>
</table>

<?php	
}

function MostraNewUser()
{
?>
<table width="472px" cellspacing="2" cellpadding="0" border="0" background="/img/UNCuadre.png">
	<tr>
    	<td height="15px"></td>
    </tr>
    <tr>
    	<td width="15px"></td>
    	<td colspan="5" align="left"><b> Donar-me d'alta com a Nou Usuari </b></td>
    </tr>
	<tr>
    	<td height="15px"></td>
    </tr>
    <tr>
    	<td width="15px"></td>
    	<td align="left" width="60px">Niu:</td>
        <td width="180px"><input type="text" id="UNNiu"  class="fuenteGestionNoticia"/></td>
    	<td align="left" width="70px">Usuari:</td>
        <td><input type="text" id="UNUsuari"  class="fuenteGestionNoticia"/></td>
    	<td width="15px"></td>
    </tr>
    <tr>
    	<td width="15px"></td>
    	<td align="left" width="60px">Password:</td>
        <td width="180px"><input type="password" id="UNPass1" class="fuenteGestionNoticia" /></td>
    	<td align="left" width="70px">Repeteix Password:</td>
        <td><input type="password" id="UNPass2" class="fuenteGestionNoticia" /></td>
    	<td width="15px"></td>
    </tr>
    <tr>
    	<td width="15px"></td>
    	<td align="left" width="60px">Nom:</td>
        <td width="180px"><input type="text" id="UNNom" class="fuenteGestionNoticia" /></td>
    	<td align="left" width="70px">Cognoms:</td>
        <td><input type="text" id="UNCognoms"  class="fuenteGestionNoticia"/></td>
    	<td width="15px"></td>
    </tr>
    <tr>
    	<td height="1px"></td>
    </tr>
    <tr>
    	<td width="15px"></td>
    	<td align="left" colspan="4">Adre&ccedil;a Electr&ograve;nica:  <input type="text" id="UNEmail" style="width:322px;"  class="fuenteGestionNoticia"/></td>
    	<td width="15px"></td>
    </tr>
    <tr>
    	<td height="1px"></td>
    </tr>

    <tr>
    	<td width="15px"></td>
    	<td align="left" colspan="4">Investigador / Responsable:  <input type="text" id="UNInvesResp" style="width:271px;"  class="fuenteGestionNoticia"/></td>
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
?>
