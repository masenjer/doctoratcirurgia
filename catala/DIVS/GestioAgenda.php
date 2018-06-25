<?php
function MostraGestioAgenda()
{
?>
<div id="DIVGestioAgenda" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(/img/NegroTrans.png); display:none; z-index:1000;">
<input type="hidden" id="IdAgenda" />

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
                    <td width="822px" height="400px">
                    	<?php CarregaDIVAgenda(); ?>
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
function CarregaDIVAgenda()
{
?>
<table width="100%" height="100%"  cellpadding="0" cellspacing="0" border="0" align="center" >
	<tr valign="top">
    	<td background="/img/GrisTrans.png" width="220px" valign="top"><?php CarregaDIVAgendaEsq(); ?></td>
        <td width="2px" bgcolor="#7e7e7e"></td>
        <td background="/img/BlancoTrans2.png" width="600px"><?php CarregaDIVAgendaDret(); ?></td>
    </tr>
</table>
<?php
}
?>


<?php
function CarregaDIVAgendaEsq()
{
?>
<table width="100%"  cellpadding="0" cellspacing="6" border="0">
	<tr>
    	<td height="25px"></td>
    </tr>
    <tr>
    	<td><input type="button" id="ButtonAgendaGuarda" onclick="AnadirAgenda();" value="Afegir nou registre a l'agenda" class="btn btn-success"></td>
    </tr>    
    <tr>
    	<td><input type="button" id="ButtonAgendaElimina" onclick="MostraDIVAgendaElimina();" value="Eliminar registre d'agenda seleccionat" class="btn btn-danger"><?php ConfirmaEliminaAgenda(); ?></td>
    </tr>
    <tr valign="top">
    	<td height="20px" align="center"></td>
    </tr>
    <tr valign="top">
    	<td>
        	<table width="100%" cellpadding="0" cellspacing="0" border="0">
            	<tr valign="top">
                    <td align="center" style="background:#222; color: #FFF" width="100%" height="29px"><h3>Registres agenda</h3></td>
                </tr>
                <tr valign="top">
                    <td height="200px">
                        <div id="ContListAgenda"  style="height:300px; overflow-y:auto"></div>
                    </td>
                </tr>
                <tr>
                    <td>            
                        <input type="button" value="Sortir del Gestor d'Agenda" onClick="TancaGestorAgenda();" class="btn" >
</td>
                </tr>
            </table>
        </td>
    </tr>    
</table>
<?php
}
?>


<?php
function CarregaDIVAgendaDret()
{
?>
<table width="100%" class="table table-borderless" > 
	<tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td class="fuenteTituloGestionAgenda" colspan="2" align="center"> Gesti&oacute;n de Agenda</td>
    </tr>
    <tr>
    	<td height="20px"></td>
    </tr>
   
    <tr>
        <td width="160px" align="left">Fecha</td>
        <td width="600px" align="left"><input id="FechaAgenda" type="date"  style="width:98%"></td>
    </tr> 
    <tr>
        <td width="160px" align="left">Hora</td>
        <td width="600px" align="left"><input id="HoraAgenda" type="time"  style="width:98%"></td>
    </tr> 
    <tr>
        <td width="160px" align="left">Ubicació</td>
        <td width="600px" align="left"><input id="UbicacioAgenda" type="text"  style="width:98%"></td>
    </tr>    
    <tr>
        <td width="160px" align="left">Descripció</td>
        <td width="600px" align="left"><input id="DescripcioAgenda" type="text"  style="width:98%"></td>
    </tr>    
    <tr>
        <td width="160px" align="left">Enllaç</td>
        <td width="600px" align="left"><input id="EnllacAgenda" type="text"  style="width:98%"></td>
    </tr>    
  
    <tr>
    	<td colspan="2" align="right" style="padding-top: 20px"> 
            <input type="button" id="ButtonSaveAgenda" value="Guardar" class="btn btn-success" onclick="UpdateAgenda();">
        	
        </td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
</table>
<?php  
}
?>

<?php
function ConfirmaEliminaAgenda()
{
?>
<div id="DIVConfirmaEliminaAgenda" style="display:none;">
	<table cellspacing="4" cellpadding="0" border="0">    	
        <tr valign="middle">
        	<td align="left" width="160px">¿Est&aacute;s seguro?</td>
			<td align="left"><input type="button" id="ButtonAcceptElimina" onclick="EliminaAgenda();" /></td>
            <td align="right"><input type="button" id="ButtonCancelaElimina" onclick="$('#DIVConfirmaEliminaAgenda').slideUp();" /></td>
        </tr>

    </table>
</div>
<?php
}



function MostraEnllacInternAgenda()
{
?>
<div id="DIVEnllacDir1" style="display:none;">
<input type="hidden" id="CadenaEnllacInternMenuAgenda" />
<table>
	<tr>
    	<td>Men&uacute; superior:</td>
        <td><select id="EnllacCapMenuAgenda" onchange="CarregaSelectLinsMenuAgenda('','','');"></select></td>
    </tr>
    <tr>
    	<td>Men&uacute; izquierdo:</td>
        <td><select id="EnllacLinMenuAgenda0" onchange="CreaCadenaSelectsAgenda(0);"></select></td>
    </tr>
    <tr>
    	<td>Men&uacute; derecho:</td>
        <td><select id="EnllacLinMenuAgenda1" onchange="CreaCadenaSelectsAgenda(1);"></select></td>
    </tr>	
</table>
</div>
<?php
}

function MostraEnllacExternAgenda()
{
?>
<div id="DIVEnllacDir2" style="display:none;" align="left">
URL: 	<input type="text" id="EllacExternAgenda"  style="width:300px"/>
</div>
<?php
}

function MostraEnllacDocumentAgenda()
{
?>
<div id="DIVEnllacDir3" style="display:none;" align="left">
<table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
    <tr valign="top">
        <td></td>
        <td width="100px" align="right">
            <input type="hidden" id="NomDocumentAgenda" />
            <input type="hidden" id="NomDocumentAgendaAntic" />
              <form  ENCTYPE="multipart/form-data" id="FormPujaNomDocumentAgenda" name="FormPujaNomDocumentAgenda" method="post" action="PHP/UploadFiles.php?op=4"  target="IframePujaDocumentAgenda">
                  <label class="cabinet">
                        <input type="file" id="DocumentAgenda" name="Imatge" onchange="CopiaNomDocumentAgenda(this.value)" class="file" />
                  </label>
              </form>   
         </td>
    </tr>
    <tr>
         <td colspan="2" align="center"><div id="DIVDocumentAgenda" style="width:208; height:41px;"></div></td>                                                
   </tr>                                                
</table>  
<iframe name="IframePujaDocumentAgenda" style="display:none" /></iframe>
</div>
<?php
}
?>