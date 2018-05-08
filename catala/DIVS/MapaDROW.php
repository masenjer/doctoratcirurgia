<?php
function MostraMapaDROW()
{
?>
<div id="DIVMapaDROW" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(/img/NegroTrans.png); display:none; padding-top:0;">
<div  style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(/img/NegroTrans.png); ">
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
                    <td><?php CarregaDIViCapcaDROW();?></td>
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
</div>

<script>
var navegador = navigator.appName 
if (navegador == "Microsoft Internet Explorer") 
{
	$("#DIVMapaDROW").css("position","absolute");
	var dif = -11;
	var dif2 = 1;
}
else 
{
	var is_chrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;
	if (is_chrome) 
	{
		var dif = -1;
		var dif2 = -1;
	}	
	else
	{
		var dif = 0;
		var dif2 = 0;
	}
}
</script>
<?php
}

function CarregaDIViCapcaDROW()
{
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td height="40px" background="/img/CapcaFinestretaGran.jpg" class="fuenteFormCapca">Feu clic sobre un edifici per a descarregar el pla d'autoprotecci&oacute;</td> 
        <td class="TancaFormButton" onClick="TancaFitxaDROW();"></td>   
	</tr>
	<tr>
    	<td colspan="2">
	       	<div id="ImatgeDrow"  onmouseover="MarcaDROW();" onmouseout="DesmarcaDROW();" onMouseMove="$(window).scrollTop(0);"></div>
			<div id="coordenadas" style="position:absolute; width:250px; height:100px;">
            	<table width="100%" cellpadding="0" cellspacing="0" border="0" >
                	<tr>
                    	<td height="20px"></td>
                    </tr>
                    <tr>
                    	<td id="DIVTitolDROW" align="right" class="fuenteInfoDROW"></td>
                    </tr>
                    <tr>
                    	<td height="10px"></td>
                    </tr>
                    <tr>                    	
                    	<td align="right" valign="middle"><div id="PertanyUAB"></div></td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
</table>
<?php
}
?>