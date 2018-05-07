<?php
function MostraIMGHome()
{
      include ($_SERVER['DOCUMENT_ROOT']."/rao/ini.php");

?>
<script src="/rao/JS/IMGHome.js" type="text/javascript"></script>
	
    <?php
    session_start();

    if ($_SESSION["Creacio"]){
    ?>    

    
    
 
	
    <div id="DIVEditIMGHome" style="vertical-align:top; height:250px; width:444px;">
    	<table width="100%" cellspacing="0" cellpadding="0" border="0">
        	<tr>
            	<td align="left">
                	<form  ENCTYPE="multipart/form-data" id="FormPujaNewIMGHome" name="FormPujaNewIMGHome" method="post" action="PHP/UploadFiles.php?op=1" target="IframePujaNewIMGHome">
            		   	<input type="file" id="NewIMGHomeName" name="NewIMGHomeName" onChange="AddNewIMGHome(this.value)" style="display:none">
	                	
                    <h3><span class="glyphicon glyphicon-plus-sign " aria-hidden="true" onClick="NewIMGHomeName.click();"></span></h3>
                        
                    </form>
                    <iframe name="IframePujaNewIMGHome" style="display:none"></iframe>  
                </td>
            </tr>
            <tr>
            	<td>
                	<div id="DIVIdGestioIMGHome" style="height:250px; overflow-x:auto; overflow-y:hidden; max-width:100%;	"></div>
                </td>
            </tr>
        </table>
    </div>
    <?php
    }

    else{
    ?>



                        <div class="">
                          <div id="slide-home" class="carousel slide" data-ride="carousel">                            <h2 id="titoldestacats" class="sr-only" aria-level="2" role="heading">Destacats</h2>
                            <!-- Indicators -->


                                <ol class="carousel-indicators">

                                <?php     
                                    include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");

                                    $SQL = "Select * FROM IMGHome ORDER BY Orden ASC ";
                                    if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


                                    $first = "active";
                                    $i = 0;
                                     while ($row = $result->fetch_assoc())
                                    {

                                ?>                                   
                                
                                    
                                            <li role="button" class="<?php echo $first; ?>" data-slide-to="<?php echo $i; ?>" data-target="#slide-home"></li>
                                <?php
                                    $i++;
                                    $first = "";
                                }
                                ?>
                                        
                                           
                                        
                                
        
                            </ol>
                            <!-- /Indicators -->
                            
                            <div class="carousel-inner" role="listbox">
                            
                                
                                
                                <?php     
                                    

                                    $SQL = "Select * FROM IMGHome ORDER BY Orden ASC ";
                                    if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


                                    $first = "active";

                                     while ($row = $result->fetch_assoc())
                                    {

                                ?>                        
                                                                                                                                                                    
                                             <!-- Item -->
                                             
                                                <div class="item <?php echo $first; ?>" role="option">
                                             
                                               
                                                    <figure class="img" style="background-image: url(../IMGHomeDin/<?php echo $row["IdIMGHome"].$row["Ruta"];?>);"></figure>
                                                
                                                <div class="container">
                                               
                                                  <div class="carousel-caption">
                                                      <div>
                                                        <h3 class="text" aria-level="3" role="heading">
                                                            
                                                                <?php echo $titol_carousel ; ?>
                                                            
                                                        </h3>
                                                            
                                                                  <p class="banner-lema"><?php echo $desc_carousel ; ?></p>
                                                                  <span class="ico arrow" aria-hidden="true"></span>
                                                                                                        
                                                      </div>
                                                  </div>
                                               
                                                </div>
                                             </div>
                                    <?php
                                    $first = "";
                                }
                                ?>
                                        
                                        
                                
                                    
                                                                                                                                                                    
                                             
                                             
                                        
                                        
                                
                            
                            </div>
                            
                                
<div class="slide-nav visible-md visible-lg">
                                    <a class="left carousel-control" href="#slide-home" role="button" data-slide="prev">
                                      <span class="ico left" aria-hidden="true"></span>
                                      <span class="sr-only">Prev</span>
                                    </a>
                                    <a class="right carousel-control" href="#slide-home" role="button" data-slide="next">
                                      <span class="ico right" aria-hidden="true"></span>
                                      <span class="sr-only">Next</span>
                                    </a>
                                </div>                            
                            
                        </div>
                    </div>

    <?php

    }
    
}
?>