<?php
function MostraGU()
{
?>
<div id="DIVGU" style="display:none;">
<input type="hidden" id="IdUserGU" />
<table width="100%" height="600px" cellpadding="0" cellspacing="0" border="0">
	<tr valign="middle">
    	<td align="center" valign="middle">
            <table cellpadding="0" cellspacing="0" border="0" align="center">
                <tr>
                    <td width="11px" background="/img/MarcSupEsq.png"></td>
                    <td height="11px" background="/img/MarcSupC.png"></td>
                    <td width="11px" background="/img/MarcSupDret.png"></td>
                </tr>
                <tr valign="middle">
                    <td width="11px" background="/img/MarcCEsq.png"></td>
                    <td valign="middle" align="center" background="/img/BlancoTrans2.png">
                    	<?php MostraFitxaGU(); ?>
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
?>

<?php
function MostraFitxaGU()
{
?>
<table width="700px" cellpadding="0" cellspacing="8" border="0" class="fuenteContingut">
	<tr>
    	<td colspan="2" align="left"><b>Gestión de usuarios</b></td>
    </tr>
    <tr>
    	<td height="5px"></td>
    </tr>
    <tr>
    	<td colspan="2" align="right"><?php MostraMenuGridUsers(); ?></td>
    </tr>
    <tr>
        <td colspan="2" width="100%" align="right"><?php MostraDivEliminaUser(); ?></td>
    </tr>
    <tr>
    	<td colspan="2" align="center"><div id="DIVGridGU"></div></td>
    </tr>
    <tr>
    	<td height="20px"></td>
    </tr>
    <tr valign="top">
    	 <td width="50%" align="center"><?php MostraGUI(); ?></td>
    	 <td width="50%" align="center"><?php MostraGUD(); ?></td>
    </tr>
    <tr>
    	<td height="20px"></td>
    </tr>
    <tr>
    	<td colspan="2" align="center"><?php MostraPermisos(); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td align="right"><input type="button" onclick="TancaGestioUserGU();" value="Cancelar" /></td>
    	<td align="left"><input type="button" onclick="UpdateUserGU();" value="Guardar" /></td>
    </tr>    
    
</table>
<?php
}
?>

<?php
function MostraGUI()
{
?>
<table cellpadding="0" cellspacing="2" border="0">
	<tr>
    	<td>Nombre</td>
        <td><input type="text" id="Nombre"></td>
    </tr>
	<tr>
    	<td>Apellidos</td>
        <td><input type="text" id="Apellidos"></td>
    </tr>
   	<tr>
    	<td>Email</td>
        <td><input type="text" id="Email"></td>
    </tr>

</table>
<?php
}
?>

<?php
function MostraGUD()
{
?>
<table cellpadding="0" cellspacing="2" border="0">
	<tr>
    	<td>Usuario</td>
        <td><input type="text" id="UsuarioGU"></td>
    </tr>
	<tr>
    	<td>Password</td>
        <td><input type="password" id="PasswordGU"></td>
    </tr>
    <tr>
    	<td>Confirma Password</td>
        <td><input type="password" id="Password2GU"></td>
    </tr>
</table>
<?php
}
?>
<?php
function MostraMenuGridUsers()
{
?>
	<table cellpadding="0" cellspacing="2" border="0">
    	<tr>
        	<td></td>
        	<td width="19px"><img src="/img/accept.png" style="cursor:pointer;" onclick="InicialitzaUserGU();" /></td>
        	<td width="19px"><img src="/img/cancel.png" style="cursor:pointer;" onclick= "MostraDivEliminaUser()"; /></td> 
            <td width="18px"></td>           
        </tr>
    </table>
<?php
}
?>

<?php
function MostraPermisos()
{
?>
<table cellspacing="0" cellpadding="0" border="0">
	<tr valign="middle">
    	<td background="/img/RecuadreGrisRolsI.png" width="14px"></td>
    	<td background="/img/RecuadreGrisRolsC.png" height="45px"><input type="checkbox" id="CheckUsuario" /> Usuario</td>
        <td background="/img/RecuadreGrisRolsC.png" height="45px" width="20px"></td>
    	<td background="/img/RecuadreGrisRolsC.png" height="45px"><input type="checkbox" id="CheckCreacion" /> Creaci&oacute;n</td>
        <td background="/img/RecuadreGrisRolsC.png" height="45px" width="20px"></td>
    	<td background="/img/RecuadreGrisRolsC.png" height="45px"><input type="checkbox" id="CheckEdicion" /> Edici&oacute;n</td>
        <td background="/img/RecuadreGrisRolsC.png" height="45px" width="20px"></td>
    	<td background="/img/RecuadreGrisRolsC.png" height="45px"><input type="checkbox" id="CheckNoticias" /> Home</td>
    	<td background="/img/RecuadreGrisRolsD.png" width="15px"></td>
    </tr>
</table>
<?php
}

function MostraDivEliminaUser()
{
?>

<div id="DIVEliminaUser">
	<table>
    	<tr>
        	<td>Est&aacute;s seguro? </td>
            <td><input type="button" value="Si" onclick="EliminaUser();" /></td>
            <td><input type="button" value="No" onclick="$('#DIVEliminaUser').hide(500);" /></td>
            
        </tr>
    </table>
                
</div>
<?php
}
?>
