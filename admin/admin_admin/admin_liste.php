<?php
require_once("../../inc/init.php");
nestPasAdmin();
require_once("../../inc/head.php");
require_once("../../inc/nav_admin.php");
require_once("../../inc/nav.php");

?>


<div class="container">
<h2 class="text-center  mt-3">Liste des administrateurs</h2>
<p><a href="../../administration.php">Revenir à la page administration</a></a></p>
<p><a href="admin_form.php?action=ajouter">Ajouter un administrateur</a></a></p>
    <div class="row">
        <div class="col-12  border text-light   colorPSC_gradiant"> <!--Ligne qui indique le contenu des colonnes-->
            <div class="row">

                <div class="col">
                    <p class="text-center">Nom</p>                   
                </div>

                <div class="col">
                    <p class="text-center">Prénom</p>                   
                </div>

                <div class="col">
                    <p class="text-center">Email </p>                   
                </div>

                <div class="col">
                    <p class="text-center">Statut</p>                   
                </div>

                <div class="col">
                    <p class="text-center"></p>                   
                </div>
                
            </div>
        </div>


        <?php

        $adminListe=$DB->query("SELECT * FROM administrateur");
        while($adminListeArray=$adminListe->fetch(PDO::FETCH_ASSOC))
        {
            switch($adminListeArray['statut'])
            {
                case 1 :
                    $nomStatut='Administrateur';
                    break;
                case 2 :
                    $nomStatut='Redacteur';
                    break;
                case 3 :
                    $nomStatut='Stagiaire';
                    break;
                
            }




            echo ' <div class="col-12">';
                echo '<div class="row">';

                   echo ' <div class="col">';
                        echo '<p class="text-center">'.$adminListeArray['nom'].'</p> ';                  
                    echo '</div>';

                    echo ' <div class="col">';
                        echo '<p class="text-center">'.$adminListeArray['prenom'].'</p> ';                  
                    echo '</div>';

                    echo ' <div class="col">';
                        echo '<p class="text-center">'.$adminListeArray['email'].'</p> ';                  
                    echo '</div>';

                    echo ' <div class="col">';
                        echo '<p class="text-center">'.$nomStatut.'</p> ';                  
                    echo '</div>';

                    echo ' <div class="col">';
                        echo '<p class="text-center">';
                        echo '<a href="admin_form.php?action=modifier&id='.$adminListeArray['id_administrateur'].'">Modifier</a>';
                        echo '  /  ';
                      
                     echo '<a href="#" onclick="if(confirm(\'Êtes-vous sûr de vouloir SUPPRIMER cet administrateur ?\'))
                      document.location.href=\'admin_delete_DB.php?id='.$adminListeArray['id_administrateur'].'\'">

                      
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