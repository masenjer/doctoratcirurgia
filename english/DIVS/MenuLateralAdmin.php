<?php
function MostraMenuLateralDerecho()
{
    if (($_SESSION["Usuarios"] == 1)||($_SESSION["Noticias"] == 1)||($_SESSION["Creacio"] == 1)){
?>

<div class="row align-right">
    <div class="col-xs-12 text-right">
        <h3>
<?php 
        if ($_SESSION["Usuarios"]=="1"){
?>
            <span class="glyphicon glyphicon-user" aria-hidden="true"  onclick="MostraGestioGU();"></span>
<?php
}
?>
            <span class="glyphicon glyphicon-eye-open" aria-hidden="true" onClick="MostraMenuColor();"></span>
            <span class="glyphicon glyphicon-off" aria-hidden="true" onClick="TancaSessio();"></span>

        </h3>
    </div>
</div>

<!--
<div id="MenuLateralAdmin" style="position:fixed; display:none; ">
<table width="73px" cellpadding="0" cellspacing="0" border="0">
	<tr>
    	<td background="/img/MenuAdmin/TaulaSup.jpg" height="7px" width="73px"></td>
    </tr>
    <tr>
    	<td background="/img/MenuAdmin/TaulaC.jpg" align="center"><input type="button" id="ButtonExit" onClick="TancaSessio();" title="Cerrar sesi&oacute;n administrador" /></td>
    </tr>
    <tr>
    	<td background="/img/MenuAdmin/TaulaC.jpg" align="center"><input type="button" id="ButtonColor" onClick="MostraMenuColor();" title="Modificar el color base de la web" /></td>
    </tr>
    <tr>
    	<td background="/img/MenuAdmin/TaulaC.jpg" align="center"><input type="button" id="ButtonAbstracts" onClick="document.location='/jornadadoctorat/admin '" title="Recollida i edici&oacute; d'abstracts" /></td>
    </tr>
    <tr>
    	<td background="/img/MenuAdmin/TaulaInf.jpg" height="9px" width="73px"></td>
    </tr>
</table>
</div>
<script>
var pos = $(window).width() - 92;
$("#MenuLateralAdmin").css("left",pos);
$("#MenuLateralAdmin").css("top","25px");

</script>

-->
<?php
    }
}
?>