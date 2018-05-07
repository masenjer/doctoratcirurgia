<?php
function CarregaAplicacioDirectoriFitxa()
{
?>
<table width="898px" cellpadding="0" cellspacing="0" border="0" style="background:#FFF; border-spacing:0px;">
	<tr>
    	<td height="33px" id="CapcaSuperiorPage" class="CapcaSuperiorPage" align="left">
        	<?php MostraMenuCapcalera(); ?>           
        </td> 
    </tr>
    <tr>
    	 <!--espacio para la columna izquierda --> 
    	<td height="110px"><?php MostraImatgesCapcalera();?></td> <!--espacio para la columna derecha -->
    </tr>
    <tr>
    	<td height="28px"><div id="DIVMenuSuperior"><?php include ("PHP/MenuSCarregaDirecte.php"); ?></div></td>
    </tr>
    <tr valign="top">
    	<td>
        	<?php 
				MostraDirectoriFitxa();			
			?>
            <div id="MapaWeb" style="display:none" align="center"></div>
        </td>
    </tr>
    <tr>
    	<td id="PeuPagina" class="PeuPagina" colspan="2" height="145px"><div style="width:100%"></div>
<!--        	<img src="/img/PeuPagina.jpg" width="100%" height="175px" />
-->        </td>
    </tr>

</table>
<?php
}
?>