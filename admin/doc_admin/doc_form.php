<?php
require_once("../../inc/init.php");
nestPasAdmin();
require_once("../../inc/head.php");
require_once("../../inc/nav_admin.php");
require_once("../../inc/nav.php");


$nom='';

$rubrique=0;
$nomRubrique='non spécifiée';
$description='';
$action='Ajouter';
$id='';
$lien='';


if($_GET['action']=='modifier')
{
    $docAmodifier=$DB->prepare("SELECT * FROM document WHERE id_document=:id");
    $docAmodifier->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    $docAmodifier->execute();
    $docAmodifierArray=$docAmodifier->fetch(PDO::FETCH_ASSOC);


    $nom=$docAmodifierArray['nom'];
    $nomFichier=$docAmodifierArray['nom_fichier'];
    $lien=$docAmodifierArray['lien'];
    $rubrique=$docAmodifierArray['rubrique'];

    switch($docAmodifierArray['rubrique'])
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

    
    $description=$docAmodifierArray['description'];
    $action='Modifier';
    $id=$docAmodifierArray['id_document'];
}

?>

<div class="container">
    <h3 class="text-center mt-4"><?php echo $action ?> un document</h3>
    <div class="row d-flex justify-content-center">
        <div class="col-6">
            <form method="post"    enctype="multipart/form-data"  action="doc_DB.php">
                <label class="form-label" for="nom" >Nom</label>
                <input type="text" class="form-control"  id="nom" name="nom"  value="<?php echo $nom ?>">
                
                <label class="form-label"  for="fichier"><?php echo $action ?> le fichier</label>
                <input type="file"  class="form-control"  id="fichier"  name="fichier"> 

            
                <label class="form-label" for="rubrique" >Rubrique</label>
                <select class="form-select" name="rubrique"  id="rubrique">
                    
                    <?php
                    if($action=='Modifier')
                    {echo'<option value="'.$rubrique.'">'.$nomRubrique.'</option>';}
                    ?>
                    <option value="0">Non spécifiée</option>
                    <option value="1">Le Pays</option>
                    <option value="2">Financez votre projet</option>
                    <option value="3">Bois et Forêt</option>
                    <option value="4">Santé</option>

                </select>

                <label class="form-label" for="description" >Description</label>
                <input type="text" class="form-control"  id="description" name="description"  value="<?php echo $description ?>">
                
               
                <input type="hidden" name="lien" value="<?php echo $lien?>">
                <input type="hidden"  name="id"  value="<?php echo $id ?>">
                <input type="hidden"  name="action"  value="<?php echo $action ?>">

                <button class="btn btn-primary"  type="submit"><?php echo $action ?></button>
            </form>

        </div>
    </div>
</div>





<?php
require_once("../../inc/fin.php");
?>