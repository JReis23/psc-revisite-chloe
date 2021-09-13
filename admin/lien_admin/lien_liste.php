<?php
require_once("../../inc/init.php");
nestPasAdmin();
require_once("../../inc/head.php");
require_once("../../inc/nav_admin.php");
require_once("../../inc/nav.php");



?>


<div class="container">
<h2 class="text-center  mt-3">Liste des liens</h2>
<p><a href="../../administration.php">Revenir à la page administration</a></a></p>
<p><a href="lien_form.php?action=ajouter">Ajouter un lien</a></a></p>
    <div class="row">
        <div class="col-12  border text-light   colorPSC_gradiant"> <!--Ligne qui indique le contenu des colonnes-->
            <div class="row">

                <div class="col">
                    <p class="text-center">Nom</p>                   
                </div>

                <div class="col">
                    <p class="text-center">Adresse</p>                   
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

        $lienListe=$DB->query("SELECT * FROM lien ORDER BY nom");
        while($lienListeArray=$lienListe->fetch(PDO::FETCH_ASSOC))
        {
            switch($lienListeArray['rubrique'])
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




            echo ' <div class="col-12">';
                echo '<div class="row">';

                   echo ' <div class="col">';
                        echo '<p class="text-center">'.$lienListeArray['nom'].'</p> ';                  
                    echo '</div>';

                    echo ' <div class="col">';
                        echo '<p class="text-center"><a href="'.$lienListeArray['adresse'].'" target="blank">'.$lienListeArray['adresse'].'</a></p> ';                  
                    echo '</div>';

                    echo ' <div class="col">';
                        echo '<p class="text-center">'.$nomRubrique.'</p> ';                  
                    echo '</div>';

                    echo ' <div class="col">';
                        echo '<p class="text-center">'.$lienListeArray['description'].'</p> ';                  
                    echo '</div>';

                    echo ' <div class="col">';
                        echo '<p class="text-center">';
                        echo '<a href="lien_form.php?action=modifier&id='.$lienListeArray['id_lien'].'">Modifier</a>';
                        echo ' / ';
                        
                        echo '<a href="#" onclick="if(confirm(\'Êtes-vous sûr de vouloir SUPPRIMER ce lien ?\'))
                        document.location.href=\'lien_delete_DB.php?id='.$lienListeArray['id_lien'].'\'">
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