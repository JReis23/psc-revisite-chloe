<?php
require_once("../../inc/init.php");
nestPasAdmin();
require_once("../../inc/head.php");
require_once("../../inc/nav_admin.php");
require_once("../../inc/nav.php");

//récuperer les pages
//requete préparée pour récuperer en fonction de la rubrique
$listePage=$DB->prepare("SELECT * FROM page WHERE rubrique=:rubrique ORDER BY placement");
$listePage->bindParam(':rubrique',$rubrique);

function listePage($var,$titre, $couleur)
{   
    echo '<div class="col-5 border m-4 actualiteListe '.$couleur.'">';
    echo '<h5 class="text-center border border-3 bg-light border-secondary p-2">'.$titre.'</h5>';
    
    global $rubrique;
    $rubrique=$var;
    global $listePage;
    $listePage->execute();
    while($listePageArray=$listePage->fetch(PDO::FETCH_ASSOC))
    {
       
        echo '<h5><a href="'.RACINE_SITE.'admin/page_admin/page_template?nom='.$listePageArray['nom'].'">';
        echo '<h5>';
        if ($listePageArray['placement']!=0)
        {echo $listePageArray['placement'].' . ';}
        echo $listePageArray['titre'].'</h5>';


       echo '</a></h5>';
        //echo '<p  class="fst-italic">'.$listePageArray['description'].'</p>';
        
        echo '<a href="page_form.php?action=modifier&id='.$listePageArray['id_page'].'">Modifier</a>';
        $idPage=$listePageArray['id_page'];
        
        if ($idPage!=1 && $idPage!=2 && $idPage!=3 && $idPage!=4)
        {
            echo ' / ';
                        
            echo '<a href="#" onclick="if(confirm(\'Êtes-vous sûr de vouloir SUPPRIMER cette page ?\'))
                document.location.href=\'page_delete_DB.php?id='.$listePageArray['id_page'].'\'">
                Supprimer</a>';
        }
        echo '<br/>';
        echo '<br/>';
     
    }
    echo '</div>';

}


?>


<div class="container">
    <div class="row">
        <div class="col-4">
            <h2 class="text-center  mt-3">Liste des pages</h2>
            <p><a href="../../administration.php">Revenir à la page administration</a></a></p>
            <p><a href="page_form.php?action=ajouter">Ajouter une page</a></a></p>
        </div>
        <div class="col">
            <div class="row d-flex justify-content-center">
                    
                <?php


                listePage(1,'Le Pays', 'pays');

                listePage(2,'Financez vos projets','finance');

                listePage(3,'Bois et forêt','foret');

                listePage(4,'Santé','sante');
                

                
                ?>  
            </div>
        </div>

    </div>
</div>


<?php
require_once("../../inc/fin.php");
?>