<?php
require_once("../../inc/init.php");
nestPasAdmin();

require_once("../../inc/head.php");
require_once("../../inc/nav_admin.php");
require_once("../../inc/nav.php");



$nom="";
$description="";
$lien="";
$rubrique="";
$date_ajout="";
$action='Ajouter';
$id="";
$labelImage='Selectionez l\'image depuis l\'ordinateur';


if($_GET['action']=='modifier')
{
    $action='Modifier';
    $id=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    $galerieAmodifier=$DB->prepare("SELECT * FROM galerie WHERE id_galerie=:id");
    $galerieAmodifier->bindValue(':id',$id, PDO::PARAM_INT);
    $galerieAmodifier->execute();
    $galerieAmodifierArray=$galerieAmodifier->fetch(PDO::FETCH_ASSOC);

    $nom=stripslashes($galerieAmodifierArray['nom']);
    $description=stripslashes($galerieAmodifierArray['description']);
    $lien=$galerieAmodifierArray['lien'];
    $rubrique=$galerieAmodifierArray['rubrique'];
    $labelImage='Remplacez l\'image en en selectionnant une nouvelle depuis l\'ordinateur';  

    switch($rubrique)
    {
        case 1 : $nomRubrique='Le Pays';break;
        case 2 : $nomRubrique='Financez votre projet';break;
        case 3 : $nomRubrique='Bois et Forêt';break;
        case 4 :$nomRubrique='Santé';break;             
        default : $nomRubrique='non spécifiée';break;
    }

    


  
}




?>


<div class="container">
    <h3  class="text-center"><?php echo $action ?> une image</h3>
    <p><a href="galerie_liste.php">Revenir à la liste</a></p>
    
    <div class="row  d-flex justify-content-center">
        <div class="col-6">

            <form method="post"  enctype="multipart/form-data"  action="galerie_DB.php">

                <label for="nom"  class="form-label">Nom</label>
                <input type="text" id="nom" name="nom" class="form-control" value="<?php echo $nom ?>">

                <label for="description" class="form-label">Descripton</label>
                <input type="text" id="description" name="description" class="form-control"   value="<?php echo $description ?>">

                <?php
                if($action=='Modifier' AND !empty($lien))
                {
                    echo '<img class="img-fluid" src="'.RACINE_SITE.$lien.'">';
                }
                ?>



                <label for="image"  class="form-label" ><?php echo $labelImage ?></label>
                <input type="file"  class="form-control"  id="image"  name="image">

                <?php
               
                 echo '
                <label class="form-label" for="rubrique" >Rubrique</label>
                <select class="form-select" name="rubrique"  id="rubrique">';
                    if($action=='Modifier')
                        {echo'<option value="'.$rubrique.'">'.$nomRubrique.'</option>';}
                    echo '<option value="1">Le Pays</option>
                    <option value="2">Financez votre projet</option>
                    <option value="3">Bois et Forêt</option>
                    <option value="4">Santé</option>';
                echo '</select>';
                
                ?>

                <input type="hidden" name= "action"  value="<?php echo $action ?>" >
                <input type="hidden" name= "id" value="<?php echo $id ?>" >


                <button class="btn btn-primary"  type="submit"><?php echo $action ?> l'image</button>


             </form>
        </div>
    </div>
</div>