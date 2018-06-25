<?php
function CarregaAplicacioDirectori()
{

  include ($_SERVER['DOCUMENT_ROOT']."/rao/ini.php");
?>


<header class="header" role="banner"> 

<!-- #access -->




<!-- Language  -->







 <nav class="hidden-md  hidden-lg">
   <div class="header-nav">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="ico hamburguer" aria-hidden="true"></span>
            <span class="sr-only">Prem per desplegar el menú de  Facultat de Medicina</span>
          </button>
          
           
           
            
        
           
                <a href="htt://uab.cat">
                  <span class="ico logo" aria-hidden="true"></span>
                  <span class="sr-only">U A B</span>

                </a>
           
            
            
           
              
                  
                    <span class="header-title"><a href="index.php#!/home"><?php echo $cabecera_superior; ?></a></span>
                  
               
          
          
        </div>
      </div>
   </div>
 </nav>

<nav id="navbar" class="navbar-collapse collapse" role="navigation">
    <div class="header-top2">
      <div class="container" style="margin:none;">
        <div class="row access">

          
            
            
            
                 
                    
                    
                        <div class="col-md-6 hidden-xs hidden-sm">
                          <h1 class="page-title" role="heading" aria-level="1"><a href="index.php#!/home"><?php echo $cabecera_superior; ?></a></h1>
                    
                    </div>
                
            
<?php MostraMenuCapcalera();

?>          



        </div>
      </div>
    </div>






<!-- /#access -->

<!-- #Cabecera -->


<!-- #container capÃÂ§alera -->
<div class="container">
    <?php MostraMenuLateralDerecho(); ?>

    <div class="col-md-3">
        <a href="http://www.uab.cat/">
            <span class="ico logo hidden-xs hidden-sm" aria-hidden="true"></span>
            <span class="sr-only">U A B</span>
        </a>

    </div>
            
            
        
    <div class="col-md-9">

        <nav id="navegacio" aria-label="Vés a la navegació de Facultat de Medicina" role="navigation">
            <ul class="nav navbar-nav navbar-right"><?php include ("PHP/MenuSCarregaDirecte.php"); ?> </ul>
        </nav>
    </div>
    <div class="clear"></div>
</div>

</nav>
</header> 






    

    <div id="slide" class="container slide" >
        <div class="carousel-inner">
            <?php MostraIMGHome();?>
        </div>        
    </div>
    

    
    <section role="main" class="container margin-top" id="main">
        <div class="sidebar"><?php DirectoriEsquerre()?></div>

        <div id="main" class="content-full">    
            <div >
                <?php $resultats = MostraEstructuraDirectori(); ?>
            </div>
        </div>
</section>

 <section id="mapa" class="hidden-sm hidden-xs"> 
<h2 class="sr-only" aria-level="2" role="heading">Mapa web</h2>
<div class="container">
    <div class="row">
        <?php include ("PHP/MapaWebMostra.php"); ?>
    </div>

    </div>
    
</section>

<footer class="footer" role="contentinfo"> 
<div class="container">
    <div class="row">
    
    
         <div class="col-md-4">
          <h2 class="negreta small">Reconeixement internacional de l'excel·lència</h2>
                <a href="http://www.uab.cat/cei" class="logo col-sm-6">
                 <span class="ico logo-cei" aria-hidden="true"></span>
                 <span class="sr-only">Campus d'Excel·lència Internacional</span>
                </a>
                <a href="http://www.uab.cat/web/research/itineraries/uab-research/euraxess-uab-1345673587088.html" class="logo col-sm-6">
                 <span class="ico hrexcellence" aria-hidden="true"></span>
                 <span class="sr-only">HR Excellence in Research - Euraxess</span>
                </a>
            </div>     
      
  
    <div class="col-md-8">
    
      <div class="credits">
        <ul class="legal">   
          <li><a href="" title="">Inici </a></li>
          <li><a href="http://www.uab.cat/web/coneix-la-uab-cei/itineraris/avis-legal-1345668257191.htm" title="">Avís legal </a></li>
          <li><a href="http://www.uab.cat/web/coneix-la-uab-cei/itineraris/proteccio-de-dades-1345668257177.html" title=" ">Protecció de dades</a></li>
          <li><a href="http://crd.uab.cat" title="">Sobre el web</a></li>  
        </ul>
        
          
          
          
                    
          
          
          
          
        <p class="drets">
          2018 Universitat Autònoma de Barcelona 
        </p>
      </div>
    </div>
  </div>

    
    
    
    
</div> 
</footer>




<?php
}

function MostraEstructuraDirectori(){
?>

<?php
    
    if ($_SESSION["Edicio"]=="1") $res = MostraDirectoriPrivat('',$_GET["Categoria"],$_GET["UD"]);
    else $res = MostraDirectoriPublic('',$_GET["Categoria"],$_GET["UD"]);
    
    $res = explode("|",$res);
?>
       
            <div id="ButtonAddDirectori" style="padding-top:11px; display:none;">
                <input type="button" id="NewDirectoriButton" class="ButtonPlus" onclick="MostraNouDirectori();" />
            </div>
        
<div class="col-md-12"><?php NewDirectori(); ?></div>
<div class="col-md-12"><div id="ResultatsDirectori"><?php echo $res[0];?> </div></div>

<script>
    $("#ComptadorResultatsDirectori").html('<?php echo $res[1]; ?>');
</script>


   
<?php

return $res[1];


}

function NewDirectori()
{
?>
<div id="DIVNewDirectori" style="display:none;" class="panel panel-default">
    <div class="panel-heading">Nou registre</div>
    <div class="panel-body">
    <table width="100%" cellpadding="4" cellspacing="0" >
        <tr>
            <td>Nom</td>
            <td><input type="text" id="NomNewDirectori" class="form-control" /></td>
            <td>Cognoms</td>
            <td><input type="text" id="CognomsNewDirectori" class="form-control" /></td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td><input type="text" id="EmailNewDirectori" class="form-control" /></td>
        </tr>
        <tr>
            <td>Àrea de Coneixement 1</td>
            <td>
                <select id="Categoria1NewDirectori" class="form-control" >
                    <?php 
                        $Conn = "rao/sas_con.php";
                        
                        $array = CategoriaDirectoriCargaSelect('', $Conn);
                        echo $array[1];
                    ?>
                 </select>
            </td>
            <td> Àrea de Coneixement 2</td>
            <td>
                <select id="Categoria2NewDirectori" class="form-control" >
                    <?php 
                        $Conn = "rao/sas_con.php";
                        
                        $array = CategoriaDirectoriCargaSelect('', $Conn);
                        echo $array[1];
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Especialitat (Catala)</td>
            <td><input type="text" id="Especialitat_caNewDirectori" class="form-control" /></td>
        </tr>
        <tr>
            <td>Especialitat (Castellano)</td>
            <td><input type="text" id="Especialitat_esNewDirectori" class="form-control" /></td>
        </tr>
        <tr>
            <td>Unitat Docent 1</td>
            <td><select id="UD1NewDirectori" class="form-control" >
                    <?php 
                        $Conn = "rao/sas_con.php";
                        
                        $arrayUD = UDDirectoriCargaSelect('', $Conn);
                        echo $arrayUD[1];
                    ?>
                </select></td>
            <td>Unitat Docent 2</td>
            <td><select id="UD2NewDirectori" class="form-control" >
                    <?php 
                        $Conn = "rao/sas_con.php";
                        
                        $arrayUD = UDDirectoriCargaSelect('', $Conn);
                        echo $arrayUD[1];
                    ?>
                </select></td>
        </tr>
        <tr>
            <td>Imatge</td>
            <td colspan="3">
                <form  ENCTYPE="multipart/form-data" id="FormPujaNewIMGDirectori" name="FormPujaNewIMGDirectori" method="post" action="PHP/UploadFiles.php?op=1" target="IframePujaNewIMGDirectori">
                    <input type="file" id="ImatgeNewDirectori" name="ImatgeNewDirectori" class="form-control" />
                </form>
                <iframe name="IframePujaNewIMGDirectori" style="display:none"></iframe> 
            </td>
        </tr>
        <tr>
            <td colspan="4" align="right">
                <input type="button" value="Cancelar" class="btn btn-danger" onclick="TancaNouDirectori();" />
                <input type="button" value="Aceptar" class="btn btn-success" onclick="AddNewDirectori();" /> 
            </td>
        </tr>
    </table>
    </div>
</div>
<?php
}


function DirectoriEsquerre(){
?>
    <div class="row">
        <?php echo DirectoriDret(); ?>
    </div>
    <div class="row">
        <div class="panel panel-default panel-body">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="checktutor" onchange="mostraTutor();">
              <label class="custom-control-label" for="checktutor">Mostrar només els tutors</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div id="DIVCategoriesDirectori"><?php include("PHP/Directori/CategoriaDirectoriMenuCarregaDirecte.php"); ?></div>
    </div>
    <div class="row">
        <div id="DIVCategoriesDirectori"><?php include("PHP/Directori/CategoriaUnitatDocentMenuCarregaDirecte.php"); ?></div>
    </div>
    
    
<?php       
}


function DirectoriDret(){
?>
<div class=" menu-right">

    <aside class="panel panel-default">
        <div class="panel-heading">
            <strong>Cerca al directori</strong>
        </div>
        <div class="panel-body">
            <p>
                <input type="search" class="form-control" id="CercadorDirectori"  onkeyup="DirectoriCercador();">
            </p>
            <div id="ComptadorResultatsDirectori"></div>
        </div>
        
    </aside>
</div>
<?php       
}
?>