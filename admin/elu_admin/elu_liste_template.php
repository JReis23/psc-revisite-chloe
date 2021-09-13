<?php
    if($listeEluArray['placement']>4)
    {
        $listeEluArray['placement']='aucun';
    }
echo '<div class="col-12  m-1   border">';
                echo '<div class="row d-flex justify-content-between">';

                    echo '<div class="col-2">';
                            echo '<p>'.$listeEluArray['nom'].'</p>';
                    echo '</div>';

                    echo '<div class="col-2">';
                        echo '<p>'.$listeEluArray['prenom'].'</p>';
                    echo '</div>';

                    echo '<div class="col-2">';
                        echo '<p>'.$listeEluArray['fonction'].'</p>';
                    echo '</div>';

                    echo '<div class="col-2">';
                        $mandat=$listeEluArray['mandat'];
                        echo '<p>'.$mandat.'</p>';
                    echo '</div>';

                   
                   
                   
                    echo '<div class="col-1">';
                        if (!empty($listeEluArray['photo']))
                        {echo '<img src="'.RACINE_SITE.$listeEluArray['photo'].'" class = "img-fluid">';}
                    echo '</div>';

                   /* if($listeEluArray['placement']!='aucun')
                    {
                        echo '<div class="col-1">';
                        echo '<p>'.$listeEluArray['placement'].'</p>';
                        echo '</div>';
                    }
                    */
                    echo '<div class="col-2">';
                    echo '<p class="text-end">';
                    echo '<a href="elu_form.php?id='.$listeEluArray['id_elu'].'&action=modifier">Modifier</a>';
                    echo ' / ';
                    echo '<a href="#" onclick="if(confirm(\'Êtes-vous sûr de vouloir SUPPRIMER cet élu ?\'))
                    document.location.href=\'elu_delete_DB.php?id='.$listeEluArray['id_elu'].'\'">
                    Supprimer</a>';
                    echo '</p>';
                    echo '</div>';

                    
                 

                echo '</div>';
echo '</div>';


                                                                                                            


    

