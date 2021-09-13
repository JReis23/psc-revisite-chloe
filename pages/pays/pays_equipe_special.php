
            </div>
            <div>
            <div class="row mt-5 d-flex justify-content-center">
            <div class=" col-7"> <!-- COLONNE_de_GAUCHE-->
                 
                  <div class="row   border border-success  py-5">
  
                    <?php

                  $ensembleEquipe=$DB->query("SELECT * FROM equipe");
                
                  while($equipier=$ensembleEquipe->fetch(PDO::FETCH_ASSOC))
                  {echo '<div class=" mb-4  ">';            
                  echo '<p>'.$equipier['fonction'].' - '.$equipier['prenom'].' '.$equipier['nom'].'<br/>';
                  echo 'Tél : '.$equipier['tel'].'<br/>';
                  echo 'Courriel : <a href="mailto:'.$equipier['email'].'">'.$equipier['email'].'</a></p>';
                  echo '</div>';  
                  }
                                 

                        ?>

                  </div>
                </div>
              </div>
            


  