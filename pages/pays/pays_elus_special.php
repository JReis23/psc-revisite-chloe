
<?php

$dates=$DB->query("SELECT mandat_debut ,mandat_fin FROM categorie_delegue WHERE id_categorie=1");
$datesArray=$dates->fetch(PDO::FETCH_ASSOC);
$mandatDebut=$datesArray['mandat_debut'];
$mandatFin=$datesArray['mandat_fin'];

  $listeElu1=$DB->query("SELECT * FROM elu WHERE categorie=1  ORDER BY placement ");  
  $listeElu2=$DB->query("SELECT * FROM elu WHERE categorie=2  ORDER BY nom ");  
  $listeElu3=$DB->query("SELECT * FROM elu WHERE categorie=3  ORDER BY nom ");  

?>


        <?php echo $contenu ?>
        <a href="<?php echo RACINE_SITE.PAGE.'pays_menu' ?>">Revenir au menu</a> 
</div>
<div>

<!-- -->

            <div class="col-12 mt-5"> <!-- COLONNE_de_GAUCHE-->
                <nav class=" navbar-expand-md navbar-light bg-light">
                    <div class="container text-center">
    
                        <h2 class="pt-4">LES DÉLÉGUÉS DU PAYS SUD CHARENTE</h2>
                        <h3>Mandat <?php echo $mandatDebut.'-'.$mandatFin ?></h3>
                     
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#elus1" aria-controls="elus1" aria-expanded="false" aria-label="Toggle navigation">
                        <span >voir la liste</span>
                      </button>
                  
                      <hr>                                  
                  
                      <div class="collapse navbar-collapse" id="elus1">
                         
                          <div class="row col-12 d-flex justify-content-center">

                              <?php
                                while($listeEluArray=$listeElu1->fetch(PDO::FETCH_ASSOC))
                                {                                           
                                  include('pays_elus_template.php');
                                }
                              ?>                                         
                          </div>                                      
                       
                      </div>
                    </div>
                  </nav>
    
    
                  <nav class=" navbar-expand-md navbar-light bg-light">
                    <div class="container text-center">
    
                        <h2 class="mt-5  pt-4"> DÉLÉGUÉS CdC SUD CHARENTE</h2>
                        <h3></h3>
                     
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#elus2" aria-controls="elus2" aria-expanded="false" aria-label="Toggle navigation">
                        <span >voir la liste</span>
                      </button>
                  
                      <hr>
                  
                  
                  
                      <div class="collapse navbar-collapse" id="elus2">
                         
                          <div class="row col-12 d-flex justify-content-center">
                  
                          <?php
                            while($listeEluArray=$listeElu2->fetch(PDO::FETCH_ASSOC))
                            {                                           
                            include('pays_elus_template.php');
                            }

                              ?>
    
    
                             
    
                            
                  
                            
                                                                   
                                          
                             
                             
                      </div>
                  
                       
                       
                      </div>
                    </div>
                  </nav>
    
                  <nav class=" navbar-expand-md navbar-light bg-light">
                    <div class="container text-center">
    
                        <h2 class="mt-5  pt-4">LES DELEGUES CdC</h2><br><h3>Lavalette-Tude-Dronne</h3>
                        <h2></h2>
                     
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#elus3" aria-controls="elus3" aria-expanded="false" aria-label="Toggle navigation">
                        <span >voir la liste</span>
                      </button>
                  
                      <hr>
                  
                  
                  
                      <div class="collapse navbar-collapse" id="elus3">
                         
                          <div class="row col-12 d-flex justify-content-center">
                            <!-- essaye Jean-Michel ARVOIR-->

                            <?php
                            while($listeEluArray=$listeElu3->fetch(PDO::FETCH_ASSOC))
                            {                                           
                            include('pays_elus_template.php');
                            }

                              ?>
                             <!--fin page élus-->
                              
                             
                  
                             
                  
                             
                  
                  
                  
                             
                      </div>
                  
                       
                       
                      </div>
                    </div>
                  </nav>
                </div>
    
<div class="col bg-light mt-5 py-3">
  <a href="">Téléchargez les Statuts du Pays</a> 
  
</div>    