<?php
require_once("../../inc/init.php");
nestPasAdmin();


require_once("../../inc/head.php");
require_once("../../inc/nav_admin.php");
require_once("../../inc/nav.php");
 
$ensembleCarrousel=$DB->query("SELECT * FROM carrousel ORDER BY affichage DESC, ordre, id_carrousel ");    // requete SQL

?>


<div class="container-fluid">
    <h3 class="text-center pt-4 pb-3">Liste des images du carrousel</h3>
   
    <div class="row d-flex justify-content-around">

        <?php 

        while($carrouselArray=$ensembleCarrousel->fetch())   
        {

            $accroche=$carrouselArray['accroche'];
            $image=$carrouselArray['image'];
            $alt=$carrouselArray['alt'];
            $lien=$carrouselArray['lien'];
            $rubrique=$carrouselArray['rubrique'];
            $titre=$carrouselArray['titre'];
            $id=$carrouselArray['id_carrousel'];
            $affichage=$carrouselArray['affichage'];
            $ordre=$carrouselArray['ordre'];
            $opacity='';
            if ($affichage==0)
            {$opacity='style="opacity: 0.2"';}


        

            echo '<div class="col-3 m-4">';
            echo '<img '.$opacity.' class="img-fluid" src="'.RACINE_SITE.$image.'">';
            if ($affichage==0)
            {echo '<p class="text-center"><b>DESACTIVÉE</b></p>';}
            echo '<p class="mt-5"><i>Ordre d\'affichage</i> : '.$ordre.'</p>';
            echo '<h4 class="mt-5"><b>Titre</b> : '.$titre.'</h4>';
            echo "<p><b>Accroche</b> : $accroche</p>";
            echo "<p><b>description de l'image</b> : $alt</p>";   //sans concatenation
            echo '<p><b>Lien</b> : '.$lien.'</p>';  // avec concatenation
            //echo '<p><b>Rubrique</b> : '.$rubrique.'</p>';
           
            
            
            echo '<br>';
            echo '<a href="carrousel_form.php?id='.$id.'">modifier</a>';
            
            echo '</div>';
        }

        ?>       
    </div>
</div>

<?php
require_once("../../inc/fin.php");
?>