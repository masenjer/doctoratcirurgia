<?php
function MostraMenuCapcalera()
{
?>

    	       <div class="search-uab" role="search">
              
                




                <div id="custom-search-input">
                    
                  <div class="panel panel-default" id="ResultatCerca" style="" align="left"></div>
                        <div class="input-group">
                        <label class="sr-only" for="cercaweb">Cerca</label>
                            <input type="text" class="form-control input-lg" placeholder="Cerca" title="Introdueix el text de cerca"  alt="Introdueix el text de cerca" name="TextCerca" id="TextCerca" accesskey="i" onkeyup="Cercador();"/>
                            <span class="input-group-btn">
                                <button id="submit" class="btn btn-info btn-lg" alt="Prem el botó per iniciar la cerca" type="submit" aria-label="Prem el botó per iniciar la cerca" value="Search" onclick="Cercador();" >
                                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                </button>
                            </span>
                        </div>
                   
                 </div> 

        
    
                



                <div class="directori">
                
                    <span><a href="https://siastd.uab.es/pcde/" alt="Directori de la UAB" class="bullet">Directori<span class="ico arrow" aria-hidden="true"></span></a></span>
                    
                </div>

                <ul class="idiomes">
                    <li><a href='/castellano/' lang="es" name='Castellano'>Castellano</a></li>
                    <li class="last-child"><a href='/english/' lang="en" name='English'>English</a></li>
                </ul>
                
                
               <?php /* 
            
                <ul class="xarxes-socials">
                    <!-- Display results -->
                    <li>
                        <a href="https://www.facebook.com/INcuab" target="_BLANK" title="Facebook">
                            <span class="ico facebook" aria-hidden="true"></span>
                            <span class="sr-only">Facebook</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/INC_UAB" target="_BLANK" title="Twitter">
                            <span class="ico twitter" aria-hidden="true"></span>
                            <span class="sr-only">Twitter</span>
                        </a>
                    </li>                    
                    <li>
                        <a href="http://www.scopus.com/affil/profile.url?afid=60104667&offset=1&sid=171A41E8C797E54E2A2A8F174996C47A.WlW7NKKC52nnQNxjqAQrlA%3a120&origin=AffiliationNamesList&txGid=171A41E8C797E54E2A2A8F174996C47A.WlW7NKKC52nnQNxjqAQrlA%3a14 " target="_blank"><img src="/img/scopus.jpg" style="width:30px; border:none;" /></a>
                    </li>
                    <li>
                        <a href="https://ddd.uab.cat/collection/inc?ln=ca" target="_blank"><img src="/img/ddd_logo.jpg" style="height:30px; border:none;" /></a>
                    </li>                                        
                </ul>

                */
                ?>
                
                
            </div>




        
        
        
<?php
}
?>
