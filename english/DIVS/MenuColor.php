<?php
function MostraMenuColor()
{
?>

<div id="MenuColor" style="position:fixed; display:none; border-style:solid; border-color:#222222;border-width:1px; z-index:10000; background: #FFF">
<table width="105px" height="145px"  cellpadding="0" cellspacing="0" border="0" bgcolor="#666666">
	<tr>
    	<td class="TitolHome"  style="width:105px;height:25px;" colspan="3" align="left" >
        	<div style="width:105px;height:20px; vertical-align:middle; background-image:url(/img/CapcaRelleu.png); padding-top:5px;padding-left:5px;">
            	Color web
            </div>
        </td>
    </tr>
    <tr valign="middle">
    	<td width="32px" style="padding-left:5px;">
        	<div id="colorWeb" class="colorSelector"><div id="FondoSelectorColorWeb" style="background-color: #ff9900"></div></div>
        </td>
        <td width="32px"><input type="button" class="ButtonSave32" onclick="SaveColorWeb();" /></td>
        <td align="left"><input type="button" class="ButtonDelete" onclick="EliminaColorWeb();" title="Tornar a configuraci&oacute; inicial" /></td>
    </tr>
    <tr>
    	<td colspan="3"><div id="InfoColorWeb" class="InfoColor"></div></td>
    </tr>
	<tr>
    	<td class="TitolHome" colspan="3" align="left"  style="width:105px;height:25px;">
        	<div style="width:105px;height:20px; vertical-align:middle; background-image:url(/img/CapcaRelleu.png); padding-top:5px; padding-left:5px;">
            	Color botons
            </div>
        </td>
    </tr>
    <tr valign="middle">
    	<td width="32px" style="padding-left:5px;">
        	<div id="ColorButtons" class="colorSelector"><div id="FondoSelectorColorButtons" style="background-color: #ff9900"></div></div>
        </td>
        <td width="32px"><input type="button" class="ButtonSave32" onclick="SaveColorButtons();"/></td>
        <td align="left"><input type="button" class="ButtonDelete" onclick="EliminaColorButtons();" title="Tornar a configuraci&oacute; inicial" /></td>
    </tr>
    <tr>
    	<td colspan="3"><div id="InfoColorButtons" class="InfoColor"></div></td>
    </tr>
    <tr>
    	<td colspan="3" align="left"  style="width:100px;height:25px; background-color:#222222;" >
        	<div  class="fuenteMS" style="width:100px;height:20px; vertical-align:middle; background-image:url(/img/CapcaRelleu.png); padding-top:5px; padding-left:5px; cursor:pointer;" onclick="$('#MenuColor').fadeOut('slow');">
            	Tanca Men&uacute;
            </div>
        </td>
    </tr>

</table>
</div>
<script>
var pos = $(window).width() - 131;
$("#MenuColor").css("left",pos);
$("#MenuColor").css("top","25px");
</script>
<?php
}
?>