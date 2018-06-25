<?php
function MostraHome()
{
    MostraHomeAmbNoticies();
    //MostraHomeSenseNoticies();

} 

function MostraHomeSenseNoticies(){
?>

<div id="DIVHome">
    <div class="row">
        <div class="col-md-4">
            <a href="#!/Calendario-Académico%202017-2018_256_1" class="b-access petit" title="Calendario Académico" >            
                <div class="img-bg" style="background-image: url(/imgDes/citaprevia,20.png);" alt="Calendario Académico"></div> 
                <span class="text">Calendario académico 2017 - 2018</span> 
            </a> 
        </div>
        <div class="col-md-4">
            <a href="#!/Planificación_255_1" class="b-access petit" title="Planificación" alt="Planificación">            
                <div class="img-bg" style="background-image: url(/imgDes/horaris,8.png);" alt="Planificación"></div> 
                <span class="text">Planificación</span> 
            </a> 
        </div>
        <div class="col-md-4">
            <a href="#!/Descripción-de%20Módulos_257_1" class="b-access petit" title="    Descripción Módulos" alt = "   Descripción Módulos">            
                <div class="img-bg" style="background-image: url(/imgDes/Pla_accio_tutorial,1.png);" alt = "    Descripción Módulos"></div> 
                <span class="text"> Descripción Módulos</span> 
            </a> 
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <a href="#!/Metodología-básica%20en%20investigación%20clínica_269_1" class="b-access petit" title=" Programas" alt="  Programas">            
                <div class="img-bg" style="background-image: url(/imgDes/guiarapida,1.png);" alt="   Programas"></div> 
                <span class="text"> Programas </span> 
            </a> 
        </div>
        <div class="col-md-4">
            <a href="#!/Trabajo-Fin-de-Máster_281_1" class="b-access petit" title="Prácticas y trabajo de investigación" alt="Prácticas y trabajo de investigación">            
                <div class="img-bg" style="background-image: url(/imgDes/Microscopi_icona.png);" alt="Prácticas y trabajo de investigación"></div> 
                <span class="text">Prácticas y trabajo de investigación </span> 
            </a> 
        </div>
        <div class="col-md-4">
            <a href="#!/Normativa_258_1" class="b-access petit" title="Normativa del treball d'investigació" alt="Normativa del treball d'investigació">            
                <div class="img-bg" style="background-image: url(/imgDes/treballfigrau_portada2,1.png);" alt="Normativa del treball d'investigació"></div> 
                <span class="text">Normativa del trabajo de investigación </span> 
            </a> 
        </div>
        
       <!-- <div class="col-md-4">
            <div class="avisos">        
                <div class="ContHomeContacte" >
                    <?php include("PHP/ContacteHomeCarregaDirecte.php"); ?>                
                </div>       
            </div>
        </div>

    -->
    </div> 


</div>
<?php
}

function MostraHomeAmbNoticies(){
?>

<div id="DIVHome" >

    <div class="row">
        <div class="col-md-6 "><?php include ("PHP/NoticiesCarregaContingutDirecte.php"); ?></div>
        <div class="col-md-3 "><?php include ("PHP/AgendaCarregaContingutDirecte.php"); ?></div>
        <div class="col-md-3 ">
                <div class="col-md-12">
                    <a href="http://cita.uab.cat/medicina/dept-cirurgia/doctorands/index.php?lang=ca" class="b-access petit" title="Cita prèvia" >            
                        <div class="img-bg" style="background-image: url(/imgDes/citaprevia,20.png);" alt="Cita prèvia"></div> 
                        <span class="text">Cita prèvia</span> 
                    </a> 
                </div>
                <div class="col-md-12">
                    <a href="#!/Calendari%20de%20tr%C3%A0mits%20administratius_6_2" class="b-access petit" title="Calendari tràmits administratius" alt="Calendari tràmits administratius">            
                        <div class="img-bg" style="background-image: url(/imgDes/Gestio_Acad.png);" alt="Calendari tràmits administratius"></div> 
                        <span class="text">Calendari tràmits administratius</span> 
                    </a> 
                </div>
                <div class="col-md-12">
                    <a href="#!/Calendari%20de%20reunions%20Comisi%C3%B3%20de%20Doctorat_5_2" class="b-access petit" title="Reunions comissió acadèmica" alt = "Reunions comissió acadèmica">            
                        <div class="img-bg" style="background-image: url(/imgDes/colegis-prof.png);" alt = "Reunions comissió acadèmica"></div> 
                        <span class="text">Reunions comissió acadèmica</span> 
                    </a> 
                </div>
                <div class="col-md-12">
                    <a href="directori.php" class="b-access petit" title="Directori de professorat" alt=" Directori de professorat">            
                        <div class="img-bg" style="background-image: url(/imgDes/Practicum,0.png);" alt="Directori de professorat"></div> 
                        <span class="text"> Directori de professorat </span> 
                    </a> 
                </div>
                <div class="col-md-12">
                    <a href="#!/Formulari%20de%20dubtes_20_2" class="b-access petit" title="Formulari de dubtes" alt="Formulari de dubtes">            
                        <div class="img-bg" style="background-image: url(/imgDes/icon-seu2.png);" alt="Formulari de dubtes"></div> 
                        <span class="text">Formulari de dubtes </span> 
                    </a> 
                </div>
                <div class="col-md-12">
                    <a href="#!/Bústia%20de%20documents_12_2" class="b-access petit" title="Bústia de documents" alt="Bústia de documents">            
                        <div class="img-bg" style="background-image: url(/imgDes/GuiaEstudiants,7.png);" alt="Bústia de documents"></div> 
                        <span class="text">Bústia de documents</span> 
                    </a> 
                </div>
                
               

                             
            
                    
                           
                

        </div>
        
    </div>

    

</div>

    
<?php
}
function MostraPartEsquerraHome()
{
?>


    

    <div class="row">         
        
    </div>      


<?php

}


function MostraPartCentralHome()
{
?>

    

<div class="ContHomeListEnDir" >
    <?php include("PHP/EndirMenuHomeCarregaDirecte.php"); ?>
</div>

<?php
}
?>
<?php
function MostraPartDretaHome()
{
?>

    
    <div class="avisos">
        
            <div class="ContHomeContacte" >
                <?php include("PHP/ContacteHomeCarregaDirecte.php"); ?>                
            </div>
       
    </div>


<?php
}?>
