<?php

require_once("../../inc/init.php");
nestPasAdmin();
require_once("../../inc/head.php");
require_once("../../inc/nav_admin.php");
require_once("../../inc/nav.php");

$galerieListePDOstat=$DB->query("SELECT * FROM galerie ");
$galerie='';
while($galerieListeArray=$galerieListePDOstat->fetch(PDO::FETCH_ASSOC))
{
    switch($galerieListeArray['rubrique'])
    {
        case 1 : $nomRubrique='Le Pays';break;
        case 2 : $nomRubrique='Financez votre projet';break;
        case 3 : $nomRubrique='Bois et Forêt';break;
        case 4 :$nomRubrique='Santé';break;             
        default : $nomRubrique='non spécifiée';break;
    }
    $galerie.=
    '<div class="col-2 m-2 p-3  border ">
    <h5 class="text-center">'.$galerieListeArray['nom'].'</h5>
    <a href="'.RACINE_SITE.$galerieListeArray['lien'].'"><img class="img-fluid border my-3" src="'.RACINE_SITE.$galerieListeArray['lien'].'"></a>
    <p>'.$galerieListeArray['description'].'</p>
    <span>'.$nomRubrique.'</span>
    <br/>
    



    <a href="galerie_form.php?id='.$galerieListeArray['id_galerie'].'&action=modifier">Modifier</a>
                     / 
                    
            <a href="#" onclick="if(confirm(\'Êtes-vous sûr de vouloir SUPPRIMER cette image ?\'))
            document.location.href=\'galerie_delete_DB.php?id='.$galerieListeArray['id_galerie'].'\'">
            Supprimer</a>

   
    </div>';

}

?>


<div class="container">
    <h1 class="text-center">Galerie d'images</h1>
    <a href="galerie_form.php?action=ajouter">Ajouter une image</a>
    <br>
    

    <div class="row  mt-5">
        <?php echo $galerie ?>
    </div>
</div>





<?php
require_once("../../inc/fin.php");
?>