<?php
require_once("../../inc/init.php");
nestPasAdmin();
require_once("../../inc/head.php");
require_once("../../inc/nav_admin.php");
require_once("../../inc/nav.php");


$nom='';
$titre='';
$rubrique=0;
$nomRubrique='';
$description='';
$action='Ajouter';
$id='';

if($_GET['action']=='modifier')
{
    $pageAmodifier=$DB->prepare("SELECT * FROM page WHERE id_page=:id");
    $pageAmodifier->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    $pageAmodifier->execute();
    $pageAmodifierArray=$pageAmodifier->fetch(PDO::FETCH_ASSOC);


    $nom=$pageAmodifierArray['nom'];
    $nom = strstr($nom,'_');//enlève caracteres avant le '_'
    $nom=substr($nom,1);//supprime le premier caractere, logiquement c'est le '_'.
    $nom = str_replace('_', ' ', $nom);//remplaces les '_' restants par espace
    
    $titre=$pageAmodifierArray['titre'];
    $placement=$pageAmodifierArray['placement'];
    $rubrique=$pageAmodifierArray['rubrique'];

    switch($pageAmodifierArray['rubrique'])
    {
        case 1 : $nomRubrique='Le Pays';break;
        case 2 : $nomRubrique='Financez votre projet';break;
        case 3 : $nomRubrique='Bois et Forêt';break;
        case 4 :$nomRubrique='Santé';break;             
        default : $nomRubrique='non spécifiée';break;
    }

    
    $description=$pageAmodifierArray['description'];
    $action='Modifier';
    $id=$pageAmodifierArray['id_page'];
}

?>

<div class="container">
    <h3 class="text-center mt-4"><?php echo $action ?> une page 
    <?php if ($action=='Modifier'){echo ' : '.$titre;} ?>
     </h3>
     <a href="page_liste.php">Revenir à la liste</a>
    <div class="row d-flex justify-content-center">
        <div class="col-6">
            <form method="post" action="page_DB.php">
              
                
                <input type="hidden" class="form-control"  id="nom" name="nom"  value="<?php echo $nom ?>">
               
               
                <label class="form-label" for="titre" >Titre</label>
                <input type="text" class="form-control"  id="titre" name="titre"  value="<?php echo $titre ?>">

                <?php
                if ($nom!='menu')
                { echo '
                <label class="form-label" for="rubrique" >Rubrique</label>
                <select class="form-select" name="rubrique"  id="rubrique">';
                    if($action=='Modifier')
                        {echo'<option value="'.$rubrique.'">'.$nomRubrique.'</option>';}
                    echo '<option value="1">Le Pays</option>
                    <option value="2">Financez votre projet</option>
                    <option value="3">Bois et Forêt</option>
                    <option value="4">Santé</option>';
                echo '</select>';
                }
                ?>

                <?php
                if ($nom!='menu')
                { echo '
                <label class="form-label" for="placement" >Placement</label>
                <select class="form-select" name="placement"  id="placement">';
                    
                    if($action=='Modifier')
                    {echo'<option value="'.$placement.'">'.$placement.'</option>';}
                    for($var=1;$var<20;$var++)
                    {echo'<option value="'.$var.'">'.$var.'</option>';}
                    
                echo' </select>';
                }
                ?>

<!--
                <label class="form-label" for="description" >Description</label>
                <input type="text" class="form-control"  id="description" name="description"  value="<?php //echo $description ?>">
                -->
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