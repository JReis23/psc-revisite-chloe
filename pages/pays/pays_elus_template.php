<?php
    echo '<div class="col-12 col-sm-6 col-md-4   col-xl p-2">';
                  
    echo '<div class="trombi">';
        
              echo '<img src="'.RACINE_SITE.$listeEluArray['photo'].' " class="img-fluid" alt="">';
          
              echo '<h5>'.$listeEluArray['mandat'].'</h5>';
              echo '<h4>'.$listeEluArray['prenom'].' '.$listeEluArray['nom'].'</h4>';
              echo '<p>'.$listeEluArray['fonction'].'</p>';
        
    echo '</div>';
  echo '</div>';


?>