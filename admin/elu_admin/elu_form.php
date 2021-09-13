<?php

require_once("../../inc/init.php");
nestPasAdmin();   //  Si n'est pas Admin il est jété à l'accueil !
require_once("../../inc/head.php");
require_once("../../inc/nav_admin.php");
require_once("../../inc/nav.php");

if(isset($_GET['action']))
{
   if($_GET['action']=='ajouter')
   {
        $action='Ajouter';
        $id='';
        $nom='';
        $prenom='';
        $fonction='';
        $mandat='';
        $placement=9;
        $nomPlacement='aucun';
        $photo='';
        $labelPhoto='Ajouter une photo';
        $categorie='';
        $nomCategorie='Choisissez une catégorie';
      
   }
   elseif($_GET['action']=='modifier')
   {
       $action='Modifier';
       $id=htmlentities(trim(stripslashes($_GET['id'])),ENT_QUOTES);
       $eluAmodifier=$DB->prepare("SELECT * FROM elu WHERE id_elu=:id ");
       $eluAmodifier->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
       $eluAmodifier->execute();
       $eluAmodifierArray=$eluAmodifier->fetch(PDO::FETCH_ASSOC);
       $nom=$eluAmodifierArray['nom'];
       $prenom=$eluAmodifierArray['prenom'];
       $photo=$eluAmodifierArray['photo'];
       $fonction=$eluAmodifierArray['fonction'];
       $mandat=$eluAmodifierArray['mandat'];
       $categorie=$eluAmodifierArray['categorie'];
       switch($categorie)
       {
            case 1 :
                $nomCategorie='Les délégués du Pays Sud Charente';
                break;
            case 2 :
                $nomCategorie='Délégués CdC Sud Charente';
                break;
            case 3 :
                $nomCategorie='Les délégués CdC - Lavalette-Tude-Dronne';
                break;
            default :
                $nomCategorie='Choisissez une catégorie';
                break;                     
       }

       $placement=$eluAmodifierArray['placement'];
       switch($placement)
       {
            case 1 :
                $nomPlacement='premier';
                break;
            case 2 :
                $nomPlacement='deuxième';
                break;
            case 3 : 
                $nomPlacement='troisième';
                break;
            case 4 :
                $nomPlacement='quatrième';
                break;

            case 4 :
                $nomPlacement='cinquième';
                break;

                case 4 :
                $nomPlacement='sixième';
                break;

            default:
                $nomPlacement='aucun';
                break;
       }


       $labelPhoto='Remplacer par :';
   }
   else
   {
    $location='location:'.RACINE_SITE.'accueil.php';
    header($location);
    exit; 
   }
}
else
{
$location='location:'.RACINE_SITE.'accueil.php';
        header($location);
        exit;
}

?>

<div class="container d-flex justify-content-center mb-5">

    <div class="col-5">
        <h1 class="text-center  mt-3"><?php echo $action ?> un élu</h1>  
        <br>

    
        <form method="post" enctype="multipart/form-data"  action="elu_DB.php">

            <label  for="nom"    class="form-label  mt-3">Nom</label>
            <input  type="text"  name="nom"    id="nom" class="form-control" value="<?php echo $nom ?>">

            <label for="prenom"  class="form-label  mt-3">Prénom </label>
            <input type="text"   name="prenom"  id="prenom" class="form-control"  value="<?php echo $prenom ?>">

            <label for="fonction" class="form-label  mt-3">Fonction</label>
            <input type="text"    name="fonction"  id="fonction" class="form-control"  value="<?php echo $fonction ?>">

            <label for="categorie" class="form-label  mt-3">Catégorie</label>
                <select class="form-select"  name="categorie" id="categorie" >
                    <option value="<?php echo $categorie ?>"selected><?php echo $nomCategorie ?></option>
                    <option value="1">Les délégués du Pays Sud Charente</option>
                    <option value="2">Délégués CdC Sud Charente</option>
                    <option value="3">Les délégués CdC - Lavalette-Tude-Dronne</option>
                </select>


            <label for="mandat" class="form-label  mt-3">Mandat</label>
            <input type="text"    name="mandat"  id="mandat" class="form-control"  value="<?php echo $mandat ?>"> 
            
            <label for="placement" class="form-label mt-3">Placement</label>
            <select class="form-select"  name="placement" id="placement" >
                    <option value="<?php echo $placement ?>"selected><?php echo $nomPlacement ?></option>
                    <option value="9">aucun</option>
                    <option value="1">premier</option>
                    <option value="2">deuxième</option>
                    <option value="3">troisième</option>
                    <option value="4">quatrième</option>
                    <option value="5">cinqiuème</option>
                    <option value="6">sixième</option>

                    
                </select>

            <?php
            if(!empty($photo))
            {
                echo '<img class="img-fluid col-4" src="'.RACINE_SITE.$photo.'">';
                echo '<br/>';
                echo '<input class="form-check-input" type="checkbox" id="deletePhoto" name="deletePhoto">
                <label class="form-check-label" for="deletePhoto">
                 Supprimer la photo
                 </label>';
            }
            ?>
            <br/>
            <label for="photo" class="form-label mt-3"><?php echo $labelPhoto ?></label>
            <input type="file" name="photo"  id="photo"  class="form-control">

            <input type="hidden" name="action"  value="<?php echo $action ?>">
            <input type="hidden" name="id"  value="<?php echo $id ?>">




            <button type="submit" class="btn btn-primary  mt-5 "><?php echo $action ?></button>
            <br>

        </form>
        <br>

        <a href="elu_liste.php">Revenir à la liste</a>

    </div>
   
</div>










<?php
require_once("../../inc/fin.php");
?>