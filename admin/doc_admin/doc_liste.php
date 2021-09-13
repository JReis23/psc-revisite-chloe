<?php
require_once("../../inc/init.php");
nestPasAdmin();
require_once("../../inc/head.php");
require_once("../../inc/nav_admin.php");
require_once("../../inc/nav.php");





?>


<div class="container">
<h2 class="text-center">Liste des documents</h2>
<p><a href="../../administration.php">Revenir à la page administration</a></a></p>
<p><a href="doc_form.php?action=ajouter">Ajouter un document</a></a></p>
    <div class="row ">
        <div class="col-12  pb-5 "> <!--Ligne qui indique le contenu des colonnes-->
            <div class="row border text-light   colorPSC_gradiant">

                <div class="col">
                    <p class="text-center">Nom</p>                   
                </div>

                <div class="col">
                    <p class="text-center">Lien</p>                   
                </div>

                <div class="col">
                    <p class="text-center">Rubrique </p>                   
                </div>

                <div class="col">
                    <p class="text-center">Description</p>                   
                </div>

                <div class="col">
                    <p class="text-center"></p>                   
                </div>
                
            </div>
        </div>


        <?php

        $docListe=$DB->query("SELECT * FROM document ORDER BY nom");
        while($docListeArray=$docListe->fetch(PDO::FETCH_ASSOC))
        {
            $lienComplet=RACINE_SITE.$docListeArray['lien'];


            switch($docListeArray['rubrique'])
            {
                case 1 :
                    $nomRubrique='Le Pays';
                    break;
                case 2 :
                    $nomRubrique='Financez votre projet';
                    break;
                case 3 :
                    $nomRubrique='Bois et Forêt';
                    break;
                case 4 :
                    $nomRubrique='Santé';
                    break;  
                    
                default :
                    $nomRubrique='non spécifiée';
                    break;
            }




            echo ' <div class="col-12  border">';
                echo '<div class="row ">';

                   echo ' <div class="col-3">';
                        echo '<p class="text-center">'.$docListeArray['nom'].'</p> ';                  
                    echo '</div>';

                    echo ' <div class="col-5">';
                        echo '<p class="text-center"><a download="'.$docListeArray['nom_fichier'].'" href="'.$lienComplet.'" target="blank">'.$lienComplet.'</a></p> ';                  
                    echo '</div>';

                    echo ' <div class="col-2">';
                        echo '<p class="text-center">'.$nomRubrique.'</p> ';                  
                    echo '</div>';

                    echo ' <div class="col">';
                        echo '<p class="text-center">'.$docListeArray['description'].'</p> ';                  
                    echo '</div>';

                    echo ' <div class="col">';
                        echo '<p class="text-center">';
                        echo '<a href="doc_form.php?action=modifier&id='.$docListeArray['id_document'].'">Modifier</a>';
                        echo ' / ';
                        
                        echo '<a href="#" onclick="if(confirm(\'Êtes-vous sûr de vouloir SUPPRIMER ce document ?\'))
                        document.location.href=\'doc_delete_DB.php?id='.$docListeArray['id_document'].'\'">
                        Supprimer</a>';

                        echo '</p>';

                    echo '</div>';




                echo '</div>';

            echo '</div>';
        }

        ?>

       
        
    </div>
</div>


<?php
require_once("../../inc/fin.php");
?>