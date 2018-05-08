<?php
function MostraColumnaCentral()
{
?>
<div id="main" class="content">
    
    <div class="contingut width-adjust">
        <h2>
        <h2  class="section-title margin-top " aria-level="2" role="heading">
            
            <span id="ButtonEditContingut" style="float:right; display:none;" class="glyphicon glyphicon-edit" aria-hidden="true" onClick="ButtonEditContingut()"></span>
            
            
            <section id="DIVTitolPage"></section>
            
        </h2>  
        </h2>       
        <DIV id="DIVContingutPage"></DIV>
        <DIV id="DIVEditaContingutPage" style="display:none;">
                <input id="IdLinMenuActual" type="hidden" name="IdLinMenuActual"/>
                <textarea id="TAContingut" name="TAContingut"></textarea>
              
                <?php //MostraPujaImatge(); ?>
                <div align="center">
                    <input type="button" id="ButtonCancelaContingut" value="Cancelar" onclick="CancelaEditCont();">
                    <input type="button" id="ButtonTAContingut" value="Guardar" />
                 </div>
        </DIV>
        
    </div>
</div>


<?php 
}
?>