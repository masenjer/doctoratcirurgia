<?php
function CarregaAplicacio()
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
           
            
            
           
              
                  
                    <span class="header-title"><a href="#!/home"><?php echo $cabecera_superior; ?></a></span>
                  
               
          
          
        </div>
      </div>
   </div>
 </nav>

<nav id="navbar" class="navbar-collapse collapse" role="navigation">
    <div class="header-top2">
      <div class="container" style="margin:none;">
        <div class="row access">

          
            
            
            
                 
                    
                    
                        <div class="col-md-6 hidden-xs hidden-sm">
                          <h1 class="page-title" role="heading" aria-level="1"><a href="#!/home"><?php echo $cabecera_superior; ?></a></h1>
                    
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
    <?php 
                MostraHome();
                MostraContingutPages();         
                //MostraDirectori();            
                MostraPublicacions();    

            ?>
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
?>