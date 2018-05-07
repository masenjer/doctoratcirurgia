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
            <a href="#!/Schedule_320_1" class="b-access petit" title="Calendario Académico" >            
                <div class="img-bg" style="background-image: url(/imgDes/citaprevia,20.png);" alt="Calendario Académico"></div> 
                <span class="text">2017 - 2018 Academic Calendar</span> 
            </a> 
        </div>
        <div class="col-md-4">
            <a href="#!/Schedule_316_1" class="b-access petit" title="Planificación" alt="Planificación">            
                <div class="img-bg" style="background-image: url(/imgDes/horaris,8.png);" alt="Planificación"></div> 
                <span class="text">Schedule</span> 
            </a> 
        </div>
        <div class="col-md-4">
            <a href="#!/Description-of-modules_317_1" class="b-access petit" title="    Descripción Módulos" alt = "   Descripción Módulos">            
                <div class="img-bg" style="background-image: url(/imgDes/Pla_accio_tutorial,1.png);" alt = "    Descripción Módulos"></div> 
                <span class="text"> Description of modules</span> 
            </a> 
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <a href="#!/Basic%20Methodology%20in%20Clinical%20Research_329_1" class="b-access petit" title=" Programas" alt="  Programas">            
                <div class="img-bg" style="background-image: url(/imgDes/guiarapida,1.png);" alt="   Programas"></div> 
                <span class="text"> Curriculum </span> 
            </a> 
        </div>
        <div class="col-md-4">
            <a href="#!/Master´s-Degree-Final-Project_319_1" class="b-access petit" title="Prácticas y trabajo de investigación" alt="Prácticas y trabajo de investigación">            
                <div class="img-bg" style="background-image: url(/imgDes/Microscopi_icona.png);" alt="Prácticas y trabajo de investigación"></div> 
                <span class="text">Master´s Degree Final Project </span> 
            </a> 
        </div>
        <div class="col-md-4">
            <a href="#!/Regulation%20of%20the%20module_321_1" class="b-access petit" title="Normativa del treball d'investigació" alt="Normativa del treball d'investigació">            
                <div class="img-bg" style="background-image: url(/imgDes/treballfigrau_portada2,1.png);" alt="Normativa del treball d'investigació"></div> 
                <span class="text">Regulation of the module </span> 
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
        <div class="col-md-6 ">
            <div class="row">
                <div class="col-md-6">
                    <a href="#!/Schedule_320_1" class="b-access petit" title="Calendario Académico" >            
                        <div class="img-bg" style="background-image: url(/imgDes/citaprevia,20.png);" alt="Calendario Académico"></div> 
                        <span class="text">2017 - 2018 Academic Calendar</span> 
                    </a> 
                </div>
                <div class="col-md-6">
                    <a href="#!/Schedule_316_1" class="b-access petit" title="Planificación" alt="Planificación">            
                        <div class="img-bg" style="background-image: url(/imgDes/horaris,8.png);" alt="Planificación"></div> 
                        <span class="text">Schedule</span> 
                    </a> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <a href="#!/Description-of-modules_317_1" class="b-access petit" title="    Descripción Módulos" alt = "   Descripción Módulos">            
                        <div class="img-bg" style="background-image: url(/imgDes/Pla_accio_tutorial,1.png);" alt = "    Descripción Módulos"></div> 
                        <span class="text"> Description of modules</span> 
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="#!/Basic%20Methodology%20in%20Clinical%20Research_329_1" class="b-access petit" title=" Programas" alt="  Programas">            
                        <div class="img-bg" style="background-image: url(/imgDes/guiarapida,1.png);" alt="   Programas"></div> 
                        <span class="text"> Curriculum </span> 
                    </a>  
                </div>
            </div>
            <div class="row">                
                <div class="col-md-6">
                    <a href="#!/Master´s-Degree-Final-Project_319_1" class="b-access petit" title="Prácticas y trabajo de investigación" alt="Prácticas y trabajo de investigación">            
                        <div class="img-bg" style="background-image: url(/imgDes/Microscopi_icona.png);" alt="Prácticas y trabajo de investigación"></div> 
                        <span class="text">Master´s Degree Final Project </span> 
                    </a> 
                </div>
                <div class="col-md-6">
                    <a href="#!/Regulation%20of%20the%20module_321_1" class="b-access petit" title="Normativa del treball d'investigació" alt="Normativa del treball d'investigació">            
                        <div class="img-bg" style="background-image: url(/imgDes/treballfigrau_portada2,1.png);" alt="Normativa del treball d'investigació"></div> 
                        <span class="text">Regulation of the module </span> 
                    </a> 
                </div>
                
               
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
        <?php include ("PHP/NoticiesCarregaContingutDirecte.php"); ?>
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
