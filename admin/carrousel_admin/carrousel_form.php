<?php  // Page seulement pour les administrateurs //
require_once("../../inc/init.php");
/*if(!adminConnecte())
    {
        $location='location:'.RACINE_SITE.'accueil.php';
        header($location);
        exit;
    }
*/

nestPasAdmin();  //Cette Function ça empeche un non ADMIN à acceder à la page  //

require_once("../../inc/head.php");
require_once("../../inc/nav.php");
$id=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);

$modifCarrousel=$DB->prepare("SELECT * FROM carrousel  WHERE id_carrousel=:id ORDER BY id_carrousel");
$modifCarrousel->bindValue(':id', $id, PDO::PARAM_INT);
$modifCarrousel->execute();
$infoCarrousel=$modifCarrousel->fetch(PDO::FETCH_ASSOC);

$titre=$infoCarrousel['titre'];
$accroche=$infoCarrousel['accroche'];
$lien=$infoCarrousel['lien'];
$image=$infoCarrousel['image'];
$alt=$infoCarrousel['alt'];
$affichage=$infoCarrousel['affichage'];
$ordre=$infoCarrousel['ordre'];


$affichageChecked='';
if ($affichage==1)
{$affichageChecked='checked';}



?>

<div class="container">
<h3 class="text-center pt-5">modifier une image du carrousel</h3>
    <div class="row d-flex justify-content-center">
        <div class="col-6">
            <form method="post" enctype="multipart/form-data" action="carrousel_DB.php">

                <div class="my-5 form-check">
                <input class="form-check-input" type="checkbox" value="1" id="affichage" 
                 name="affichage" <?php echo $affichageChecked ?>>
                <label class="form-check-label" for="affichage">IMAGE ACTIVE</label>
                </div>


                <img class="img-fluid" src="<?php echo RACINE_SITE.$image ?>">

                <label for="image" class="form-label  pt-3">Changer l'image :</label> 
                <input type="file" name="image" id="image" class="form-control">
                
                
                

              

      
                <label for="titre" class="form-label  pt-3">Titre</label>
                <input type="text"  name="titre" id="titre" class="form-control" value="<?php echo $titre ?>">

                <label for="accroche" class="form-label pt-3">Accroche</label>
                <textarea  name="accroche"  id="accroche"  class="form-control"><?php echo $accroche ?></textarea>

                <label for="lien" class="form-label pt-3">Lien</label>
                <input type="text" name="lien" id="lien"  class="form-control" value="<?php echo $lien ?>">

                <label for="lien" class="form-label pt-3">Texte descriptif de l'image pour les non-voyant</label>
                <input type="text" name="alt" id="alt"  class="form-control" value="<?php echo $alt ?>">

                <?php
                echo '
                <label class="form-label" for="ordre" >Placement</label>
                <select class="form-select" name="ordre"  id="ordre">';
                    
                    
                    echo'<option value="'.$ordre.'">'.$ordre.'</option>';
                    for($var=1;$var<7;$var++)
                    {echo'<option value="'.$var.'">'.$var.'</option>';}
                    
                echo' </select>';

                ?>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <button type="submit" class="btn btn-primary mt-4 mb-4">Modifier</button>


                
            </form>
        </div>
        
    </div>

</div>











<?php
require_once("../../inc/fin.php");

?>